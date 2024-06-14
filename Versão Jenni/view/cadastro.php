<?php

if(isset($_POST['submit'])){
    
    

    include_once('../model/conexao.php');

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $telefone = $_POST['telefone']?? '';
    $sexo = $_POST['sexo']?? '';
    $data_nasc = $_POST['data_nascimento']?? '';
    $cidade = $_POST['cidade']?? '';
    $estado = $_POST['estado']?? '';
    $endereco = $_POST['endereco']?? '';
    $cpf = $_POST['cpf']?? '';

    $result = mysqli_query($conexao, "INSERT INTO cliente(nome, email, senha, telefone, sexo, data_nasc, cidade, estado, endereco, cpf) 
    VALUES('$nome', '$email','$senha', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco', '$cpf')");

header('Location: login.php');

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
$sql = "INSERT INTO cliente (nome, email, telefone, sexo, data_nasc, cidade, estado, endereco, cpf) 
            VALUES ('$nome', '$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco', '$cpf')";

if (mysqli_query($conexao, $sql)) {
    echo "Registro inserido com sucesso.";
} else {
    echo "Erro ao inserir registro: " . mysqli_error($conexao);
} 
mysqli_close($conexao);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro</title>

    <script>
        function validarFormulario() {
        var nome = document.getElementById("nome").value;
        var email = document.getElementById("email").value;
        var senha = document.getElementById("senha").value;
        var telefone = document.getElementById("telefone").value;
        var genero = document.querySelector('input[name="genero"]:checked');
        var dataNascimento = document.getElementById("data_nascimento").value;
        var cidade = document.getElementById("cidade").value;
        var estado = document.getElementById("estado").value;
        var endereco = document.getElementById("endereco").value;
        var cpf = document.getElementById("cpf").value;

        if (nome === "" || email === "" || senha === ""|| telefone === "" || genero === null || dataNascimento === "" || cidade === "" || estado === "" || endereco === "" || cpf === "") {
            alert("Por favor, preencha todos os campos.");
            return false;
        }
        return true;
    }
</script>
</head>
<body>
<li><a href="home.html">Voltar a Home</a></li>
    <div class="box">
        <form action="cadastro.php" method="POST"> 
            <fieldset>
                <legend><b>Cadastro De Clientes</b></legend>
                <br>
                <div class="inputbox">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Digite seu nome">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="inputUser" placeholder="Digite seu e-mail">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="senha">Senha</label>
                    <input type="senha" name="senha" id="senha" class="senha" placeholder="Digite a sua senha">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder="Digite seu telefone">
                </div>
                <br>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="sexo" value="feminino">
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino">
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro">
                <label for="outro">Outro</label>
                <br><br>

                <label for="data_nasc"><b>Data de Nascimento</b></label>
                <input type="date" name="data_nasc" id="data_nasc">
               
                <br><br><br>
                <div class="inputbox">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser"  placeholder="Digite sua cidade">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="inputUser"  placeholder="Digite seu estado">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser"  placeholder="Digite seu endereço">
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="inputUser"  placeholder="Digite seu cpf">
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
                
            </fieldset>
        </form> 
    </div>
</body>
</html>