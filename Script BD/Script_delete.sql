-- CRUD: Create, Read, Update, Delete.
-- Cadastrar, Consultar, Atualizar, Excluir.
-- CRUD - Delete (Excluir).

-- Exclui todo o Banco de Dados com suas Tabelas.
DROP DATABASE db_exemplo;

-- Exclui toda a Tabela do Banco de Dados.
DROP TABLE tb_exemplo;

DELETE FROM tb_usuario WHERE id_usuario = 8;

DELETE FROM tb_categoria WHERE id_categoria = 3;

DELETE FROM tb_movimento WHERE id_movimento IN (4, 5, 7, 10, 14);