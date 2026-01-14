-- CRUD: Create, Read, Update, Delete.
-- Cadastrar, Consultar, Atualizar, Excluir.
-- CRUD - Update (Atualizar).

UPDATE tb_usuario
    SET email_usuario = 'alisson_rocha@outlook.com.br'
WHERE id_usuario = 3;

UPDATE tb_usuario
    SET nome_usuario = 'Bruno Silva',
        email_usuario = 'brunoo_2000@hotmail.com',
        senha_usuario = 'brubru01'
WHERE id_usuario = 2;

UPDATE tb_conta
    SET saldo_conta = 12560
WHERE id_conta = 1;