-- CRUD: Create, Read, Update, Delete.
-- Cadastrar, Consultar, Atualizar, Excluir.
-- CRUD - Create (Cadastrar).

-- tabela usuario 
INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Lucca', 'lucca@gmail.com', '123', '2025-09-26');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Ana catarina', 'ana.catarina@gmail.com', 'catarian321', '2025-09-06');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Alisson Rocha', 'rocha@gmail.com', 'ali9292', '2025-09-26');





INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Lanche', 1);

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Empresa CNPJ', 6);





INSERT INTO tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
VALUES
('BV Financeira', '4333339999', 'Rua Teste Nº200', 1);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('Santander', '14234', '112341', 4500.40, 1);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('bradesco', '11233', '55764', 6020.40, 2);

INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
VALUES
(1, '2021-01-10', 45, null, 1, 1, 1, 1);

INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
VALUES
(2, '2021-01-15', 34.12,'pagamento adiantado',1,3,1,3);
