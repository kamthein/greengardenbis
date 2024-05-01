<?php

namespace Calendar;
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins event</title>
 
</head>






<body>



<?php



class Event{

private $id;

private $name;

private $description;

private $start;

private $end;

private $codename;

public function getId(): int{
    return $this->id;
}


public function getName(): string{
    return $this->name;
}

public function getDescription(): string{
    return $this->description  ?? '';
}

public function getStart(): \DateTime{
    return new \DateTime($this->start);
}

public function getEnd(): \DateTime{
    return new \DateTime($this->end);
}

public function getCodename(): string{
    return $this->codename;
}



}


?>

</body>

</html>