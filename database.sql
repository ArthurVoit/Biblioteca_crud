create database biblioteca_db

use biblioteca_db

create table autores(
    id_autor int primary key not null,
    nome varchar(45) not null,
    nacionalidade varchar(45) not null,
    ano_nascimento date not null
);

create table livros(
    id_livros int primary key not null,
    titulo varchar(45) not null,
    genero varchar(45) not null,
    ano_publicacao date not null,
    fk_autor int,
    foreign key (id_autor) references autores(id)
);

create table leitores(
    id_leitor int primary key not null,
    nome_leitor varchar(45) not null,
    email_leitor varchar(45) not null,
    telefone_leitor varchar(45) not null
);

create table emprestimos(
    id_emprestimo int primary key not null,
    fk_id_livros int,
    foreign key (id_livros) references livros(id),
    fk_id_leitor int,
    foreign key (id_leitor) references leitores(id)
    data_emprestimo date not null,
    data_devolucao date not null
);


