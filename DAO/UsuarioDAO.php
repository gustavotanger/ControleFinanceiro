<?php
    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class UsuarioDAO extends Conexao{
        public function ValidarLogin($email, $senha){
            if(empty($email) || empty($senha)){
                return 0;
            }else if(strlen($senha) < 6 || strlen($senha) > 72){
                return -2;
            }else{
                $conexao = parent::retornarConexao();

                // A senha nao entra mais na clausula WHERE: buscamos o usuario
                // apenas pelo e-mail e validamos a senha com password_verify(),
                // comparando contra o hash armazenado em senha_usuario.
                $comando_sql = 'select id_usuario, nome_usuario, senha_usuario from tb_usuario where email_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1 , $email);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                $user = $sql->fetchAll();

                if(count($user) == 0 || !password_verify($senha, $user[0]['senha_usuario'])){
                    return -6;
                }else{
                    $cod = $user[0]['id_usuario'];
                    $nome = $user[0]['nome_usuario'];

                    UtilDAO::CriarSessao($cod , $nome);

                    header('location: inicial.php');
                    exit;
                }
            }
        }

        public function CadastrarUsuario($nome, $email, $senha, $repSenha){
            if(empty($nome) || empty($email) || empty($senha) || empty($repSenha)){
                return 0;
            }else if(strlen($senha) < 6 || strlen($senha) > 72){
                return -2;
            }else if($senha != $repSenha){
                return -3;
            }else{

                if($this->ValidarEmailDuplicadoCadastro($email) != 0){
                    return -5;
                }

                $conexao = parent::retornarConexao();

                // A senha nunca e gravada em texto plano: password_hash() gera
                // um hash (bcrypt, por padrao) que e o que fica salvo no banco.
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $comando_sql = 'INSERT INTO tb_usuario(nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES(?, ?, ?, ?);';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1 , $nome);
                $sql->bindValue(2 , $email);
                $sql->bindValue(3 , $senhaHash);
                $sql->bindValue(4 , date('Y-m-d'));


                try{
                    $sql->execute();
                    return 1;
                }catch (Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function CarregarMeusDados(){
            $conexao = parent::retornarConexao();

            // O hash da senha nao e mais selecionado aqui: a tela "Meus Dados"
            // nunca precisa exibi-lo, entao evitamos traze-lo do banco.
            $comando_sql = 'select nome_usuario, email_usuario from tb_usuario where id_usuario = ?;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1 , UtilDAO::UsuarioLogado());


            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
            
        }

        public function GravarMeusDados($nome, $email, $senha){
            if(empty($nome) || empty($email) || empty($senha)){
                return 0;
            }else if(strlen($senha) < 6 || strlen($senha) > 72){
                return -2;
            }else{
                if($this->ValidarEmailDuplicadoCadastro($email) != 0){
                    return -5;
                }
                $conexao = parent::retornarConexao();

                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                $comando_sql = 'update tb_usuario set nome_usuario = ?, email_usuario = ?, senha_usuario = ? where id_usuario = ?;';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);
                
                $i= 1;
                $sql->bindValue($i++ , $nome);
                $sql->bindValue($i++ , $email);
                $sql->bindValue($i++ , $senhaHash);
                $sql->bindValue($i++, UtilDAO::UsuarioLogado());


                try{
                    $sql->execute();
                    return 1;
                }catch (Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function ValidarEmailDuplicadoCadastro($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select COUNT(email_usuario) AS contar FROM tb_usuario WHERE email_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1 , $email);


                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();
                
                $contar = $sql->fetchAll();

                return $contar[0]['contar'];
            }
        }

        public function ValidarEmailDuplicadoAlterar($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select COUNT(email_usuario) AS contar FROM tb_usuario WHERE email_usuario = ? AND id_usuario != ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1 , $email);
                $sql->bindValue(2 , UtilDAO::UsuarioLogado());


                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();
                
                $contar = $sql->fetchAll();

                return $contar[0]['contar'];
            }
        }
    }
