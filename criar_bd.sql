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
    data_notificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL

);

CREATE TABLE alertas (

    id_alerta INT PRIMARY KEY AUTO_INCREMENT,
    tipo_alerta VARCHAR(45) NOT NULL,
    mensagem_alerta VARCHAR(200) NOT NULL,
    data_alerta TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL

);

CREATE TABLE trens (

    id_trem INT PRIMARY KEY AUTO_INCREMENT,
    nome_trem VARCHAR(45) NOT NULL,
    estacao_atual_trem VARCHAR(45) NOT NULL DEFAULT 'Nenhuma Estação',
    linha_atual_trem VARCHAR(45) NOT NULL DEFAULT 'Nenhuma Linha',
    data_fabricacao_trem DATE NOT NULL,
    fabricante_trem VARCHAR(45) NOT NULL,
    maquinista_trem INT,
    FOREIGN KEY (maquinista_trem) REFERENCES funcionario(id_funcionario)

);

CREATE TABLE manutencao (

    id_manutencao INT PRIMARY KEY AUTO_INCREMENT,
    data_inicio_manutencao DATETIME NOT NULL,
    data_termino_manutencao DATETIME NOT NULL,
    problema_manutencao VARCHAR(8000) NOT NULL,
    resolvido_manutencao VARCHAR(10) NOT NULL DEFAULT 'Não',
    trem_manutencao INT,
    FOREIGN KEY (trem_manutencao) REFERENCES trens(id_trem),
    funcionario_manutencao INT,
    FOREIGN KEY (funcionario_manutencao) REFERENCES funcionario(id_funcionario)

);

CREATE TABLE registro_medico (

    id_medic INT PRIMARY KEY AUTO_INCREMENT,
    data_medic DATETIME NOT NULL,
    problema_medic VARCHAR(8000) NOT NULL,
    resolvido_medic VARCHAR(10) NOT NULL DEFAULT 'Não',
    tipo_medic VARCHAR(20) NOT NULL DEFAULT 'Não especificado',
    funcionario_medic INT,
    FOREIGN KEY (funcionario_medic) REFERENCES funcionario(id_funcionario)

);