<?php

namespace QI\PetRescue\Model\Repository;

//use PDO;


class UsersRepository{
    private $connection;
    private const TABLE = "users";
    public function __construct(){
        $this->connection = Connection::getConnection();
    }
    public function insert($users){
        $stmt = $this->connection->prepare("insert into users values(null,?,?,?,?,?);");
        $stmt->bindParam(1, $users->firstname);
        $stmt->bindParam(2, $users->lastname);
        $stmt->bindParam(3, $users->email);
        $stmt->bindParam(4, $users->number);
        $stmt->bindParam(5, $users->genero);
        $stmt->bindParam(5, $users->password);
        return $stmt->execute();
    }

    //public function findAll() {
    //    $smtm = $this->connection->query("select c.*,u.name from users c inner join users u on c.users_id = u.id;
    //    ");
    //    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //}

}




?>