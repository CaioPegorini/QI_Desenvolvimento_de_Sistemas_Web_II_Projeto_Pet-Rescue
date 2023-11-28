<?php

namespace QI\PetRescue\Model;


class User{

    private $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private $number;
    private string $genero;
    private $password;

    public function __get($attribute){
        return $this->$attribute;
    }
    public function __set($attribute, $value){
        $this->$attribute = $value;
    }

    public function __construct($email) {
        $this->email = $email;
    }
}











?>