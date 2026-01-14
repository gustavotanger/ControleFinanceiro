<?php

    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $repSenha = trim($_POST['repSenha']);

        $objDAO = new UsuarioDAO();
        $ret = $objDAO->CadastrarUsuario($nome, $email, $senha, $repSenha);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br>
                <br>
                <h2>Cadastre uma Conta.</h2>
                <h5>(Faça o cadastro da sua conta aqui).</h5>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Preencha com os dados solicitados:</strong>
                    </div>
                    <div class="panel-body">
                        <?php include_once '_msg.php'; ?>
                        <br>
                        <form action="cadastro.php" method="POST" role="form">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Digite seu Nome aqui..." name="nome" id="nome"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Digite seu E-mail aqui..." name="email" id="email"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Digite uma Senha aqui..." name="senha" id="senha" maxlength="8"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita sua Senha aqui..." name="repSenha" id="repSenha" maxlength="8"/>
                            </div>
                            <button type="submit" class="btn btn-success" name="btnCadastrar" onclick="return ValidarCadastro();">Cadastrar</button>
                        </form>
                        <hr>
                        <span>Já possui uma Conta?</span> <a href="index.php">Clique aqui...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>