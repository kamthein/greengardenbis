<?php

namespace calendar;

use App\Validator;

class EventValidator extends Validator{

public function validates(array $data){

    parent::validates($data);
    $this->validate('name', 'minLength', 30);
    return $this->errors;
}



}