<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo da pagina</title>
    <style>
        table {
            border: 1px solid;
        }
    </style>
</head>
<body>
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