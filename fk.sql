use pay_for_view;
describe user;
alter table user add generopreferido int;

alter table user
add foreign key (generopreferido)
references genero(id_genero);

select * from user;

update user set generopreferido = '1' where id_user= '2';

UPDATE genero_filme_reverse SET id_filme_fk = 3 WHERE nome_filme_fk = 'Maze Runner: A Cura Mortal';