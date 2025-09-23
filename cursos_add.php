<?php
include_once("conexaodb.php");

var_dump($_GET);

$nome_curso = $_GET["nome_curso"];

if(empty($nome_curso)) {
    echo "Erro: O nome do curso não pode estar vazio";
    echo "</tr>";
    die("<a href='javascript:history.back()'>Voltar<a/>");
};

try {
    $stmt = $pdo->prepare("SELECT * FROM cursointeresse WHERE Nome = :nome_curso");
    $stmt->bindParam(':nome_curso', $nome_curso);
    $stmt->execute();

    $resultados = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $dados = $stmt->fetchAll();
    if(count($dados) >= 1) {
        echo "Erro: O nome do curso informado já existe no banco de dados.<br>";
        echo "</tr>";
        die("<a href='javascript:history.back()'>Voltar</a>");
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
  }

try {
    $stmt = $pdo->prepare("INSERT INTO `cursointeresse`(`Nome`) VALUES (:nome_curso)");
    $stmt->bindParam(':nome_curso', $nome_curso);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "O curso '" . $nome_curso . "' foi adicionado com sucesso ao banco de dados.<br>";
        echo "Você será redirecionado automaticamente a página anterior após 5 segundos.<br>";
        echo "<script>
          setTimeout(function() {
            window.location.replace('" . $_SERVER["HTTP_REFERER"] . "');
          }, 5000);
        </script>";
        echo "Caso você não seja redirecionado automaticamente, <a href='" . $_SERVER["HTTP_REFERER"] . "'>clique aqui</a>.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
  }