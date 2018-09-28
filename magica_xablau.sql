insert into genero_filme values ('Circulo de Fogo','Aventura');

select * from genero_filme;
select * from genero_user;

select gu.nome_user_fk, gu.nome_genero_fk, f.titulo from filme f
join genero_filme gf
on f.titulo = gf.nome_filme_fk
join genero_user gu
on gu.nome_genero_fk = gf.nome_genero_fk
order by gu.nome_user_fk;

