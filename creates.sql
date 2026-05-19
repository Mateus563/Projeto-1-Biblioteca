create table livro (
	id SERIAL PRIMARY KEY,
	titulo VARCHAR(100),
	autor VARCHAR(100),
	genero VARCHAR(50),
	anopublicacao DATE
);

create table leitor(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
	cpf VARCHAR(11),
	telefone VARCHAR(11)
  );
