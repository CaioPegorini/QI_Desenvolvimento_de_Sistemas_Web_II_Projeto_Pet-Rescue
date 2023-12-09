create database if not exists pet_rescue_teste;
use pet_rescue_teste;

create table if not exists users (
	id tinyint unsigned primary key auto_increment,
    firstname varchar(45) not null,
    lastname varchar(45) not null,
    email varchar(110) not null,
    number varchar(13) not null,
    genero varchar(15) not null,
    password char(30) not null
);

create table if not exists OwnerlessAnimal (
	id tinyint unsigned primary key auto_increment,
    specie varchar(30) not null,
    age tinyint,
    description text not null,
    additionalinfo text,
    user_number varchar(13) not null
);

/*insert into OwnerlessAnimal values (null,"cachorro",3,"macho castrado vira-lata","adicionado via banco","51991576679");*/
select * from OwnerlessAnimal;