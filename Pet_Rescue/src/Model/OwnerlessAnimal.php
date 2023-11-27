<?php

namespace QI\PetRescue\Model;


class OwnerlessAnimal {

    private string $id;
    private string $specie;
    private int $age;
    private string $description;
    private string $additionalinfo;

    public function __get($attribute){
        return $this->$attribute;
    }
    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
    public function __construct($specie, $age, $description, $additionalinfo) {
        $this->specie = $specie;
        $this->age = $age;
        $this->description = $description;
        $this->additionalinfo = $additionalinfo;
    }

}






?>