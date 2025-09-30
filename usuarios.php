<?php
include_once("conexaodb.php");
include("login_verifica.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body data-bs-theme="dark">
    <?php include_once("html/navbar.php"); ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
    <h1>Usuarios</h1>

    <h2>Usuarios cadastrados</h2>
    <table class="table table-striped table-hover">
      <thead>  
        <tr>
          <th>ID de Usuário</th>
          <th>Nome de Usuário</th>
          <th>Perfil</th>
        </tr>
      </thead>
      <tbody>
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
      </tbody>
    </table>

    <h2>Adicionar novo usuarios</h2>
    <form action="usuario_add.php" method="get">
        <label for="nome_usuario" class="form-label">Nome de usuario:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" class="form-control">
        <br>
        
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control">
        <br>

        <label for="id_perfil" class="form-control">Perfil:</label>
        <select name="id_perfil" id="id_perfil" class="form-select">
            <option value="0">---- Selecione um perfil ----</option>
            <option value="1">Administrador</option>
            <option value="2">Auxiliar de matriculas</option>
            <option value="3">Atendente</option>
        </select>
        <br>

        <input type="submit" class="form-control btn btn-primary">
    </form>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
</body>
</html> 