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

if (empty($senha)) {
    echo "Erro: A senha não pode estar vazia.<br>";
    die("<a href='javascript:history.back()'>Voltar</a>");
}

try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE NomeUsuario = :nome_usuario");
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->execute();

    $resultados = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $dados = $stmt->fetchAll();
    if(count($dados) >= 1) {
        echo "Erro: O nome de usuário informado já existe no banco de dados.<br>";
        die("<a href='javascript:history.back()'>Voltar</a>");
    }
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}

try {
    $stmt = $pdo->prepare("INSERT INTO `usuarios`(`NomeUsuario`, `Senha`, `idPerfil`) VALUES (:nome_usuario,:senha,:id_perfil)");
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':senha', md5($senha));
    $stmt->bindParam(':id_perfil', $id_perfil);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "O usuário '" . $nome_usuario . "' foi adicionado com sucesso ao banco de dados.<br>";
        echo "Você será redirecionado automaticamente a página anterior após 5 segundos.<br>";
        echo "<script>
          setTimeout(function() {
            history.back();
          }, 5000);
        </script>";
        echo "Caso você não seja redirecionado automaticamente, <a href='javascript:history.back()'>clique aqui</a>.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}