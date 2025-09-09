<?php
var_dump($_GET);

$nome_usuario = $_GET["nome_usuario"];
$senha = $_GET["senha"];
$id_perfil = $_GET["id_perfil"];

echo "<br>" . "O nome de usuario é " . $nome_usuario . "<br>";
echo "A senha é " . $senha . "<br>";
echo "O perfil é ";
switch ($id_perfil) {
    case 1:
        echo "Administrador";
        break;
    case 2:
        echo "Auxiliar de matriculas";
        break;
    case 3:
        echo "Atendente";
        break;
    default:
        echo "Invalido!!";
        die("<a href='javascript:history.back()'>Voltar<a/>");
};

if (empty($nome_usuario)) {
    echo "Erro: O nome de usuario nao pode estar vazio.";
    die("<a href='javascript:history.back()'>Voltar<a/>");
};