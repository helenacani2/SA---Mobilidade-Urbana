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

INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, rg_funcionario, telefone_funcionario, dt_nasc_funcionario, endereco_funcionario, plan_saude_funcionario, cart_plan_saude_funcionario, gestor_funcionario, cargo_funcionario)
VALUES
('Carlitos', 'carlitos@gmail.com', 'SenhaRuim1', '111.111.111-11', '1.111.111.-11', '(11)1111-1111', '1995-05-12', 'Rua Feia 12332', 'Unimed', '123', 'Georginho', 'Maquinista'),
('Joãosinho', 'joaosinho@gmail.com', 'SenhaRuim2', '222.222.222-22', '2.222.222.-22', '(22)2222-2222', '2005-03-22', 'Rua Bonita 12332', 'Unimed', '1234', 'Georginho', 'Equipe_Manutencao'),
('Pedrinho', 'pedrinho@gmail.com', 'SenhaRuim3', '333.333.333-33', '3.333.333.-33', '(33)3333-3333', '2026-01-30', 'Rua Meh 12332', 'Unimed', '12345', 'Georginho', 'Equipe_Atendimento'),
('Georginho', 'georginho@gmail.com', 'SenhaRuim4', '444.444.444-44', '4.444.444.-44', '(44)4444-4444', '1795-01-01', 'Rua De Aparência Indiferente 12332', 'Dona Helena', '123456', 'Georginho', 'Gerente')