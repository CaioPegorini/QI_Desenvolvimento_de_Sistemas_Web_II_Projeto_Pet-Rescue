create database if not exists pet_rescue_db;
use pet_rescue_db;
create table if not exists users (
	id tinyint unsigned primary key auto_increment,
    firstname varchar(45) not null,
    lastname varchar(45) not null,
    email varchar(110) not null,
    number varchar(13) not null,
    genero varchar(15) not null,
    password char(30) not null
);

select * from users