<?php

namespace App;

class Validator{


private $data;
protected $errors = [];



public function validates(array $data){
    $this->errors= [];
    $this->data=$data;
}

public function validate(string $field, string $method, ...$parameters){
    if(!isset($this->data[$field])){

        $this->errors[$field]="Le champs $field n'est pas rempli";
    }
    else{
        call_user_func([$this, $method], $field, ...$parameters);
    }
}



public function minLength(string $field, int $length){

if(mb_strlen($field)<$length){
    $this->errors[$field]="Le champs doit avoir plujs de $length caracteres"; 
}

}



}