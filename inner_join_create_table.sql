create table genero_user (
	nome_user_fk varchar(100) not null,
    nome_genero_fk varchar(100) not null,
    foreign key (nome_user_fk) references user(nome_user),
    foreign key (nome_genero_fk) references genero(nome_genero)
)