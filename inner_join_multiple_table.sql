insert into genero_user values ('Jerry','Romance');

select * from genero_user;

select f.titulo from filme f
join genero_user gu 
on gf.nome_genero_fk = gu.nome_genero_fk
join genero_filme gf
on gu.nome_genero_fk = gf.nome_genero_fk
order by u.nome;

