<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins calendar</title>
 
</head>






<body>



<?php 


require '../src/bootstrap.php';

require '../src/calendar/Month.php';
require '../src/calendar/events.php';


try{
  $pdo=get_pdo();
  $events= new calendar\Events($pdo);
$month = new calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null ); 
}catch (\Exception $e){
  $month= new App\Date\Month();
}

$start= $month->getStartingDay();
$start= $start->format('N')==='1'? $start: $month->getStartingDay()->modify('last monday');

$weeks=$month->getWeeks();
$end=(clone $start)->modify('+' .(6+7*$weeks-1). ' days');


$events=$events->getEventsBetweenByDay($start,$end);

/* echo '<pre>';
print_r($events);
echo '</pre>'; */

require '../views/header.php';
?>


<div class="calendar">


<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">

<h1>  <?= $month->toString(); ?> </h1>

<div>
<a href="calendar2.php?month=<?= $month->previousMonth()->month; ?>&year=<?=$month->previousMonth()->year;?>" class="btn btn-primary"  >&lt;</a>
<a href="calendar2.php?month=<?= $month->nextMonth()->month; ?>&year=<?=$month->nextMonth()->year;?>" class="btn btn-primary" >&gt;</a>
</div>

</div>










<table class="calendar__table calendar__table--<?=$weeks;?>weeks">
<?php for($i=0; $i<$weeks; $i++): ?>

  <tr>

  <?php foreach($month->days as $k => $day): 
    $date= (clone $start)->modify("+".($k+$i*7). " days");
    $eventsForDay= $events[$date->format('Y-m-d')]  ?? [];
    ?>

  <td class="<?= $month->withinMonth($date)?'': 'calendar__othermonth';?>">
     
  <?php if($i===0):?><div class="calendar__weekday"><?= $day; ?></div><br>
<?php endif; ?>

  <div class="calendar__day"><?= $date->format('d');?></div>
  <?php foreach($eventsForDay as $event): ?>
<div class="calendar__event">

<?= $event['typaction']; ?>
:
<?= (new DateTime($event['start']))->format('')?> <a href="../jardin/event.php?id=<?= $event['id'];
?>">  <?= $event['name'];?> </a>

</div>
    <?php endforeach; ?>
  
  </td>
 
  <?php endforeach;?>

</tr>


  <?php endfor; ?>

<table>

</table>


<!-- <a href="../jardin/add.php" class="calendar__button">+</a> -->

  </div>


<?php
require '../views/footer.php';

?>


  </body>

  </html>