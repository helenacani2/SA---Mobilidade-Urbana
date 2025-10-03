CREATE DATABASE db_train_info; 

USE db_train_info;

CREATE TABLE funcionario (

id_funcionario INT PRIMARY KEY AUTO_INCREMENT,
nome_funcionario VARCHAR(40) NOT NULL,
email_funcionario VARCHAR(40) NOT NULL,
senha_funcionario VARCHAR(40) NOT NULL,
cpf_funcionario VARCHAR(40) NOT NULL,
rg_funcionario VARCHAR(40) NOT NULL,
telefone_funcionario VARCHAR(40) NOT NULL,
dt_nasc_funcionario DATE NOT NULL,
endereco_funcionario VARCHAR(40) NOT NULL,
plan_saude_funcionario VARCHAR(40) NOT NULL,
cart_plan_saude_funcionario VARCHAR(40) NOT NULL,
gestor_funcionario VARCHAR(40) NOT NULL,
cargo_funcionario VARCHAR(40) NOT NULL

);

CREATE TABLE sensores (

    id_sensor INT PRIMARY KEY AUTO_INCREMENT,
    nome_sensor VARCHAR(45) NOT NULL,
    tipo_sensor VARCHAR(45) NOT NULL,
    estado_sensor BOOLEAN NOT NULL

);

CREATE TABLE notificacao (

    id_notificacao INT PRIMARY KEY AUTO_INCREMENT,
    titulo_notificacao VARCHAR(45) NOT NULL,
    mensagem_notificacao VARCHAR(200) NOT NULL,
    data_notificacao DATETIME NOT NULL

);