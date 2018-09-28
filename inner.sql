select nome, generopreferido from user;

select nome_genero from genero;

select u.nome, g.nome_genero from user as u right outer join genero as g on g.id_genero = u.generopreferido;

