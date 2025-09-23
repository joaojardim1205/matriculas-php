<?php
include_once("conexaodb.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina cursos</title>
</head>
<body>
    <h1>Cursos</h1>

    <h2>Cursos cadastrados</h2>
    <table border="1">
      <tr>
        <th>ID de Curso</th>
        <th>Nome de Curso</th>
        <th colspan="2">Ações</th>
      </tr>
      <?php
        $stmt = $pdo->prepare("SELECT * FROM cursointeresse");
        $stmt->execute();
        $resultados = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $linhas = $stmt->fetchAll();
        foreach($linhas as $linha) {
          echo "<tr>";
          echo "<td>" . $linha['idCursoInteresse'] . "</td>";
          echo "<td>" . $linha['Nome'] . "</td>";
          echo "<td><a href='curso_delete.php?id_curso=" . $linha['idCursoInteresse'] . "';
                      onclick='return confirm(\"tem certeza que deseja excluir o curso selecionado?\")'>Delete</a></td>"; 
          echo "<td><a href='cursos.php?id_curso=" . $linha['idCursoInteresse'] . "'>Editar</a></td>";
          echo "</tr>";
        }
      ?>
    </table>
    
    <?php
    $id_curso = isset($_GET["id_curso"]) ? $_GET["id_curso"] : '';

    if(empty($id_curso)){
    ?>
      <h2>Cadastrar novo cursos</h2>
      <form action="cursos_add.php" method="get">
          <label for="nome_curso">Nome do curso:</label>
          <input type="text" id="nome_curso" name="nome_curso">
          <br>
          <input type="submit">
      </form>
    <?php } else { ?>
      <h2>Editar curso existente</h2>
      <form action="curso_update.php" method="get">
        <label for="nome_curso">Nome do curso</label>
        <input type="text" id="nome_curso" name="nome_curso">
        <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
        <br>
        <input type="submit">
      </form>
      <?php } ?>
</body>
</html>