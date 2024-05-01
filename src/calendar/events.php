<?php

namespace calendar;
 

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins event</title>
 
</head>






<body>

<?php

session_start();
$code=$_SESSION['code'];

class Events{


  private $pdo;

public function __construct(\PDO $pdo){

  $this->pdo =$pdo; 

}









public function getEventsBetween(\DateTime $start, \DateTime $end): array {


    //require 'dbConfigcal.php';
    $code=$_SESSION['code'];

    $sql = "SELECT * FROM events WHERE code = '$code'/* WHERE start BETWEEN'{$start->format('Y-m-d 00:00:00')}'AND'{$end->format('Y-m-d 23:59:59')}' */";
    
    
    $statement = $this->pdo->query($sql);

  

    $results =$statement->fetchAll();


return $results;

}




public function getEventsBetweenByDay (\DateTime $start, \DateTime $end): array {


$events= $this->getEventsBetween($start, $end);

$days=[];

foreach($events as $event){
  $date=explode(' ', $event['start'])[0];

if(!isset($days[$date])){

$days[$date] = [$event];

} else {
  $days[$date][] = $event;
}


}

return $days;

} 






public function find(int $id): Event{

require 'Event.php';

$statement= $this->pdo->query("SELECT * FROM events WHERE id= $id LIMIT 1");
$statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);

$result=$statement->fetch();

if($result ===false){
  throw new \Exception('Aucun résultat trouvé');
}
return $result;

}




}

?>

</body>


</html>