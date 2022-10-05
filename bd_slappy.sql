
/*CRIANDO O BANCO DE DADOS E USANDO ELE*/
Create database bd_slappy;
use bd_slappy;

/*CRIANDO AS TABELAS*/
Create table tb_usuario (
	cd_usuario Int primary key auto_increment not null,
	id_nivel Int not null,
	nm_usuario varchar(50),
	ds_email varchar(50),
	ds_senha varchar(50) not null,
	ds_data varchar(10) not null,
	im_imagem_usuario varchar(100) 
);
Create table tb_nivel(
	cd_nivel Int primary key auto_increment not null,
	nm_nivel varchar(50)
);
Create table tb_post(
	cd_post Int primary key auto_increment not null,
	id_usuario Int not null,
	id_sistema Int not null,
	dt_post varchar(19) not null,
	nm_post varchar(100) not null,
	im_imagem_post varchar(100)  not null,
	ds_post varchar(500) not null

);
Create table tb_comentario_homebrew(
	cd_comentario_homebrew int primary key auto_increment not null,
	id_usuario int not null,
	id_homebrew int not null,
	ds_comentario_homebrew varchar (500),
	ds_data_comentario_homebrew varchar (10),
	ds_hora_comentario_homebrew varchar (8)
);
Create table tb_comentario_post(
	cd_comentario int primary key auto_increment not null,
	id_usuario int not null,
	id_post int not null,
	ds_comentario_post varchar (500),
	ds_data_comentario_post varchar (10), 
	ds_hora_comentario_post varchar (8) 
);
Create table tb_curtir(
	cd_curtir Int primary key auto_increment not null,
	id_homebrew int
);

Create table tb_sistema(
	cd_sistema Int primary key auto_increment not null,
	id_usuario Int not null,
	nm_sistema varchar(50),
	im_imagem_sistema varchar(200),
	ds_sistema varchar (500)

);
Create Table tb_homebrew(
	cd_homebrew Int primary key auto_increment not null,
	id_usuario Int not null,
	id_sistema Int not null,
	id_tipo_homebrew Int not null,
	nm_postador varchar(50) not null,
	nm_homebrew varchar(50) not null,
	im_imagem_homebrew varchar(200),
	ds_homebrew varchar(10000) not null,
	ds_data_homebrew varchar(10),
	ds_hora_homebrew varchar(8)

);
Create table tb_tipo_homebrew(
	cd_tipo_homebrew Int primary key auto_increment not null,
	nm_tipo_homebrew varchar(50)
);
Create table tb_solucao_seguidor(
	id_usuario Int not null,
	id_seguidor INT not null

);
Create table tb_seguidor(
	cd_seguidor Int primary key auto_increment not null,
	nm_seguidor varchar(100),
	im_seguidor varchar(100)  not null
);

/*CRIANDO AS CHAVES SECUNDARIAS*/

/*
Alter table tb_usuario ////tabela que vai ser alterada//// 
ADD foreign key (id_nivel) //// chave estrangeira da tabela que vai ser alterada//////
references tb_nivel(cd_nivel); ///// tabela que tem a chave primaria que vai estar conectada com a chave estrangeira ///////
*/
Alter table tb_usuario ADD foreign key (id_nivel) references tb_nivel(cd_nivel);

Alter table tb_post ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_post ADD foreign key (id_sistema) references tb_sistema(cd_sistema);

Alter table tb_comentario_post ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_comentario_post ADD foreign key (id_post) references tb_post(cd_post);

Alter table tb_comentario_homebrew ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_comentario_homebrew ADD foreign key (id_homebrew) references tb_homebrew(cd_homebrew);

Alter table tb_curtir ADD foreign key (id_homebrew) references tb_homebrew(cd_homebrew); 

Alter table tb_sistema ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_homebrew ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_homebrew ADD foreign key (id_sistema) references tb_sistema(cd_sistema);

Alter table tb_homebrew ADD foreign key (id_tipo_homebrew) references tb_tipo_homebrew(cd_tipo_homebrew);

Alter table tb_solucao_seguidor ADD foreign key (id_usuario) references tb_usuario(cd_usuario);

Alter table tb_solucao_seguidor ADD foreign key (id_seguidor) references tb_seguidor(cd_seguidor);

/*INSERINDO AS INFORMAÇÕES FIXAS*/

INSERT INTO tb_tipo_homebrew VALUES
(null, "Bestiario"),
(null, "Itens Mágicos"),
(null, "Aventuras"),
(null, "Classes"),
(null, "Mapas");

INSERT INTO tb_nivel VALUES
(null, "Usuário"),
(null, "Administrador"),
(null, "Banido");

INSERT INTO tb_usuario VALUES
(null, 1, "Usuario da Guilda", "usuario@gmail.com", "usuario", "09/09/2022", "imagens/perfilbranco.png"),
(null, 1, "Pedro Lucas", "pedro.lucas@gmail.com", "pedropedro", "10/09/2022", "imagens/perfilbranco.png"),
(null, 2, "Mestre da Guilda", "mestre@gmail.com", "kenkucaolho666", "08/09/2022", "imagens/perfilbranco.png"),
(null, 3, "Banido da Guilda", "ola@gmail.com", "cellbit", "03/10/2022", "imagens/perfilbranco.png"	);

INSERT INTO tb_sistema VALUES
(null, 1, "Dungeon & Dragons (D&D)", null, "sistema de D&D"),
(null, 1, "Call of Cthulhu", null, "sistema de Call of Cthulhu"),
(null, 1, "Ordem Paranormal", null, "sistema de Ordem Paranormal"),
(null, 1, "Terra Devastada", null, "sistema de Terra Devastada"),
(null, 1, " Defensores de Tóquio(3D&T)", null, "sistema de 3D&T");