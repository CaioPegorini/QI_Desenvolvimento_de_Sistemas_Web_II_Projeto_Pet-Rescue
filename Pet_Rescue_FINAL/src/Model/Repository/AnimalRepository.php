<?php

namespace QI\PetRescue\Model\Repository;
use PDO;


class AnimalRepository{
    
    private $connection;
    public function __construct(){
        $this->connection = Connection::getConnection();
    }
    
    public function insert($animal){
        $stmt=$this->connection->prepare("insert into OwnerlessAnimal values (null,?,?,?,?,?)");
        $stmt->bindParam(1, $animal->specie);
        $stmt->bindParam(2, $animal->age);
        $stmt->bindParam(3, $animal->description);
        $stmt->bindParam(4, $animal->additionalinfo);
        $stmt->bindParam(5, $animal->user_number);
        return $stmt->execute();
    }

    public function findAll(){
        $stmt = $this->connection->query("select * from OwnerlessAnimal");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $stmt = $this->connection->query("delete from OwnerlessAnimal where id=$id");
        return $stmt->execute();
    }

    public function findOne($id){
        $stmt = $this->connection->query("select * from OwnerlessAnimal where id=$id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function update($animal){
        $stmt = $this->connection->prepare("update OwnerlessAnimal set specie = ?, age = ?, description = ?, additionalinfo = ?, user_number = ? where id = ?");
        $stmt->bindParam(1, $animal->specie);
        $stmt->bindParam(2, $animal->age);
        $stmt->bindParam(3, $animal->description);
        $stmt->bindParam(4, $animal->additionalinfo);
        $stmt->bindParam(5, $animal->user_number);
        $stmt->bindParam(6, $animal->id);
        return $stmt->execute();
    }
}










?>