<?php include("login_verifica.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body data-bs-theme="dark">
    <?php include_once("html/navbar.php"); ?>
    <h1>Meu titulo!</h1>
    <p>Aqui vai o código HTML que fará seu site aparecer.</p>
    <p>Link para o <a href="https://google.com/">google</a></p>
    <table>
        <tr>
            <th>Id do curso</th>
            <th>Nome do curso</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Tecnico de Informatica  </td>
        </tr>
    </table>

    <h2>Listas</h2>
    <p>Exemplo de lista nao-ordenada:</p>
    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
    </ul>
    <p>Exemplo de lista ordenada:</p>
    <ol>
        <li><strong>Item 1</strong>
            <ol>
                <li>Subitem 1</li>
            </ol>
        </li>
        <li>Item 2</li>
    </ol>

    <form>
        <fieldset>
            <legend>Informações de cadastro</legend>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">
            <br>
            Sexo:
            <input type="radio" id="masculino" name="sexo" value="M"> 
            <label for="masculino">Masculino</label>
            <input type="radio" id="feminino" name="sexo" value="F">
            <label for="feminino">Feminino</label>
            <br>
            <label for="cursos">Curso de interesse:</label>
            <select name="cursos" id="cursos">
                <option value="0">Selecione um curso</option>
                <option value="1">Tecnico em Informatica</option>
            </select>
            <br>
            <input type="submit">
            <input type="reset">
        </fieldset>
    </form>
</body>
</html>