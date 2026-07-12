// Validar Campos: Tela de Login.
function ValidarLogin(){
    if($("#email").val().trim() == ""){
        alert("Preencher o campo obrigatório E-MAIL!");
        $("#email").focus();
        return false;
    }

    if($("#senha").val().trim() == ""){
        alert("Preencher o campo obrigatório SENHA!");
        $("#senha").focus();
        return false;
    }

    if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 72){
        alert("A SENHA deve conter entre 6 e 72 caracteres!");
        $("#senha").focus();
        return false;
    }    
}

// Validar Campos: Tela de Cadastro de Usuário.
function ValidarCadastro(){
    if($("#nome").val().trim() == ""){
        alert("Preencher o campo obrigatório NOME!");
        $("#nome").focus();
        return false;
    }

    if($("#email").val().trim() == ""){
        alert("Preencher o campo obrigatório E-MAIL!");
        $("#email").focus();
        return false;
    }    

    if($("#senha").val().trim() == ""){
        alert("Preencher o campo obrigatório SENHA!");
        $("#senha").focus();
        return false;
    }

    if($("#repSenha").val().trim() == ""){
        alert("Preencher o campo obrigatório REPETIR SENHA!");
        $("#repSenha").focus();
        return false;
    }    

    if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 72){
        alert("A SENHA deve conter entre 6 e 72 caracteres!");
        $("#senha").focus();
        return false;
    } 

    if($("#senha").val().trim() != $("#repSenha").val().trim()){
        alert("As SENHAS deverão ser iguais!");
        $("#repSenha").focus();
        return false;
    }     
}

// Validar Campos: Tela de Dados do Usuário.
function ValidarMeusDados(){
    if($("#nome").val().trim() == ""){
        alert("Preencher o campo obrigatório NOME!");
        $("#nome").focus();
        return false;
    }

    if($("#email").val().trim() == ""){
        alert("Preencher o campo obrigatório E-MAIL!");
        $("#email").focus();
        return false;
    }    

    if($("#senha").val().trim() == ""){
        alert("Preencher o campo obrigatório SENHA!");
        $("#senha").focus();
        return false;
    }

    if($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 72){
        alert("A SENHA deve conter entre 6 e 72 caracteres!");
        $("#senha").focus();
        return false;
    }       
}

// Validar Campos: Tela de Cadastro e Alteração da Categoria Financeira.
function ValidarCategoria(){
    if($("#nome").val().trim() == ""){
        alert("Preencher o campo obrigatório NOME DA CATEGORIA FINANCEIRA!");
        $("#nome").focus();
        return false;
    }
}

// Validar Campos: Tela de Cadastro e Alteração da Empresa.
function ValidarEmpresa(){
    if($("#nome").val().trim() == ""){
        alert("Preencher o campo obrigatório NOME DA EMPRESA!");
        $("#nome").focus();
        return false;
    }

    if($("#telefone").val().trim() == ""){
        alert("Preencher o campo obrigatório TELEFONE!");
        $("#telefone").focus();
        return false;
    }
    
    if($("#endereco").val().trim() == ""){
        alert("Preencher o campo obrigatório ENDEREÇO!");
        $("#endereco").focus();
        return false;
    }    
}

// Validar Campos: Tela de Cadastro e Alteração da Conta Bancária.
function ValidarConta(){
    if($("#banco").val().trim() == ""){
        alert("Preencher o campo obrigatório NOME DO BANCO!");
        $("#banco").focus();
        return false;
    }

    if($("#agencia").val().trim() == ""){
        alert("Preencher o campo obrigatório NÚMERO DA AGÊNCIA!");
        $("#agencia").focus();
        return false;
    }
    
    if($("#numero").val().trim() == ""){
        alert("Preencher o campo obrigatório NÚMERO DA CONTA!");
        $("#numero").focus();
        return false;
    }  
    
    
    if($("#saldo").val().trim() == ""){
        alert("Preencher o campo obrigatório SALDO (R$)!");
        $("#saldo").focus();
        return false;
    }     
}

// Validar Campos: Tela de Realizar Movimentação Financeira.
function ValidarRealizarMovimento(){
    if($("#tipo").val().trim() == ""){
        alert("Selecione o item obrigatório TIPO DE MOVIMENTO FINANCEIRO!");
        $("#tipo").focus();
        return false;
    }

    if($("#data").val().trim() == ""){
        alert("Selecione o item obrigatório DATA!");
        $("#data").focus();
        return false;
    }
    
    if($("#valor").val().trim() == ""){
        alert("Preencher o campo obrigatório VALOR!");
        $("#valor").focus();
        return false;
    }  
    
    if($("#categoria").val().trim() == ""){
        alert("Selecione o item obrigatório CATEGORIA FINANCEIRA!");
        $("#categoria").focus();
        return false;
    } 

    if($("#empresa").val().trim() == ""){
        alert("Selecione o item obrigatório EMPRESA!");
        $("#empresa").focus();
        return false;
    } 

    if($("#conta").val().trim() == ""){
        alert("Selecione o item obrigatório CONTA BANCÁRIA!");
        $("#conta").focus();
        return false;
    } 
}

// Validar Campos: Tela de Consultar Movimentação Financeira.
function ValidarConsultarMovimento(){
    if($("#tipoMov").val().trim() == ""){
        alert("Selecione o item obrigatório TIPO DE MOVIMENTO FINANCEIRO!");
        $("#tipoMov").focus();
        return false;
    }

    if($("#dtInicio").val().trim() == ""){
        alert("Selecione o item obrigatório DATA DE INÍCIO!");
        $("#dtInicio").focus();
        return false;
    }

    if($("#dtFinal").val().trim() == ""){
        alert("Selecione o item obrigatório DATA FINAL!");
        $("#dtFinal").focus();
        return false;
    }    
}
