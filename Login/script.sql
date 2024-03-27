


/*Criação do database*/
create database login;

/*indicação do database que sera utilizado*/
use login;

create table pessoas(

	id int auto_increment,
    usuario text unique,
    senha int,
    
    primary key(id)

)default charset utf8;


select * from pessoas;