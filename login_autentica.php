<?php

include_once("conexaodb.php");

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);

if(empty($usuario)) {
    die("Nome de usuário não pode estar em branco!");
}

if(empty($senha)) {
    die("A senha não pode estar em branco!");
}

try {
    $stmt = $pdo->prepare("SELECT * FROM `usuarios` WHERE NomeUsuario = :usuario AND Senha = :senha LIMIT 1");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $dados = $stmt->fetchAll();
    if (count($dados) == 1) {
        setcookie("login", $usuario);
        header("Location: index.php");
    } else {
        die("Nome de usuário e/ou senha inválido(s)!");
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>