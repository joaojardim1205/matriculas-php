<?php
include_once("conexaodb.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo da pagina</title>
</head>
<body>
    <h1>Usuarios</h1>

    <h2>Usuarios cadastrados</h2>
    <table border="1">
      <tr>
        <th>ID de Usuário</th>
        <th>Nome de Usuário</th>
        <th>Perfil</th>
      </tr>
      <?php
        $stmt = $pdo->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $resultados = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $linhas = $stmt->fetchAll();
        foreach($linhas as $linha) {
          echo "<tr>";
          echo "<td>" . $linha['idUsuarios'] . "</td>";
          echo "<td>" . $linha['NomeUsuario'] . "</td>";
          echo "<td>";
          switch ($linha['idPerfil']) {
            case 1:
                echo "Administrador";
                break;
            case 2:
                echo "Auxiliar de matrículas";
                break;
            case 3:
                echo "Atendente";
                break;
            }
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </table>

    <h2>Adicionar novo usuarios</h2>
    <form action="usuario_add.php" method="get">
        <label for="nome_usuario">Nome de usuario:</label>
        <input type="text" id="nome_usuario" name="nome_usuario">
        <br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br>

        <label for="id_perfil">Perfil:</label>
        <select name="id_perfil" id="id_perfil">
            <option value="0">---- Selecione um perfil ----</option>
            <option value="1">Administrador</option>
            <option value="2">Auxiliar de matriculas</option>
            <option value="3">Atendente</option>
        </select>
        <br>

        <input type="submit">
    </form>
</body>
</html> 