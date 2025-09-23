<?php
include("conexaodb.php");

var_dump($_GET);

$id_curso = intval($_GET["id_curso"]);

if (empty($id_curso)) {
    echo "ID do curso não pode ser vazio!";
    die("<a href='javascript:history.back()'>voltar</a>");
};

if (!is_int($id_curso)) {
    echo "Erro: ID do curso não é um numero inteiro!";
    die("<a href='javascript:history.back()'>voltar</a>");
};

try {
    $stmt = $pdo->prepare("DELETE FROM cursointeresse WHERE idCursoInteresse =  :id_curso");
    $stmt->bindParam(":id_curso", $id_curso);
    
    if($stmt->execute()) {
        echo "Curso #" . $id_curso . " excluido com sucesso <br>";
        echo "<a href='" . $_SERVER["HTTP_REFERER"] . "'>voltar</a>";
    }
} catch(PDOException $e) {
    die("Erro durante a interação com o banco de dados: " . $e->getMessage());
}