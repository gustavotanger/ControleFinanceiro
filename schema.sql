-- =========================================================
-- Schema do banco de dados: db_financeiro_ead
-- Sistema de Controle Financeiro
--
-- Como usar:
--   mysql -u root -p < schema.sql
-- ou importe este arquivo pelo phpMyAdmin / MySQL Workbench.
-- =========================================================

CREATE DATABASE IF NOT EXISTS db_financeiro_ead
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE db_financeiro_ead;

CREATE TABLE tb_usuario (
    id_usuario     INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_usuario   VARCHAR(150)  NOT NULL,
    email_usuario  VARCHAR(150)  NOT NULL UNIQUE,
    senha_usuario  VARCHAR(255)  NOT NULL COMMENT 'hash gerado por password_hash(), nunca texto plano',
    data_cadastro  DATE          NOT NULL
) ENGINE=InnoDB;

CREATE TABLE tb_categoria (
    id_categoria   INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(100) NOT NULL,
    id_usuario     INT UNSIGNED NOT NULL,
    CONSTRAINT fk_categoria_usuario FOREIGN KEY (id_usuario)
        REFERENCES tb_usuario (id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE tb_empresa (
    id_empresa       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_empresa     VARCHAR(150) NOT NULL,
    telefone_empresa VARCHAR(20)  NOT NULL,
    endereco_empresa VARCHAR(200) NOT NULL,
    id_usuario       INT UNSIGNED NOT NULL,
    CONSTRAINT fk_empresa_usuario FOREIGN KEY (id_usuario)
        REFERENCES tb_usuario (id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE tb_conta (
    id_conta      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    banco_conta   VARCHAR(100)  NOT NULL,
    agencia_conta VARCHAR(20)   NOT NULL,
    numero_conta  VARCHAR(20)   NOT NULL,
    saldo_conta   DECIMAL(12,2) NOT NULL DEFAULT 0,
    id_usuario    INT UNSIGNED  NOT NULL,
    CONSTRAINT fk_conta_usuario FOREIGN KEY (id_usuario)
        REFERENCES tb_usuario (id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE tb_movimento (
    id_movimento    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tipo_movimento  TINYINT UNSIGNED NOT NULL COMMENT '1 = Entrada, 2 = Saida',
    data_movimento  DATE             NOT NULL,
    valor_movimento DECIMAL(12,2)    NOT NULL,
    obs_movimento   VARCHAR(255)     NULL,
    id_categoria    INT UNSIGNED     NOT NULL,
    id_empresa      INT UNSIGNED     NOT NULL,
    id_conta        INT UNSIGNED     NOT NULL,
    id_usuario      INT UNSIGNED     NOT NULL,
    CONSTRAINT fk_movimento_categoria FOREIGN KEY (id_categoria)
        REFERENCES tb_categoria (id_categoria) ON DELETE RESTRICT,
    CONSTRAINT fk_movimento_empresa FOREIGN KEY (id_empresa)
        REFERENCES tb_empresa (id_empresa) ON DELETE RESTRICT,
    CONSTRAINT fk_movimento_conta FOREIGN KEY (id_conta)
        REFERENCES tb_conta (id_conta) ON DELETE RESTRICT,
    CONSTRAINT fk_movimento_usuario FOREIGN KEY (id_usuario)
        REFERENCES tb_usuario (id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB;
