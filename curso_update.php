<?php
include_once("conexaodb.php");

var_dump($_GET);

$nome_curso = $_GET["nome_curso"];
$id_curso = $_GET["id_curso"];

if(empty($nome_curso)) {
    echo "Erro: nome do curso não pode ser vazio!";
    die("<a href='javscript:history.back()'>voltar</a>");
}

if(empty($id_curso)) {
    echo "Erro: ID do curso não pode ser vazio!";
    die("<a href='javscript:history.back()'>voltar</a>");
}

if(!is_int($id_curso)) {
    echo "Erro: ID do curso deve ser um número inteiro!";
    die("<a href='javscript:history.back()'>voltar</a>");
}

try {
    $stmt = $pdo->prepare("UPDATE cursointeresse SET nome = :nome_curso WHERE idCursoInteresse = :id_curso");
    $stmt->bindParam(":nome_curso", $nome_curso);
    $stmt->bindParam("id_curso", $id_curso);

    if($stmt->execute()) {
        echo "O nome do curso #" . $id_curso . " foi alterado com sucesso para '" . $nome_curso . "'.<br>";
        echo "<a href='" . $_SERVER["HTTP_REFERER"] . "'>voltar</a>";
    }
} catch(PDOException $e) {
    echo ("Erro durante a interação com o banco de dados: " . $e->getMessage());
}