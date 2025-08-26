<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $anoPublicacao = $_POST['anoPublicacao'];

    $sql = " INSERT INTO livros (titulo, genero, anoPublicacao) VALUE ('$titulo','$genero','$anoPublicacao)";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro livros</title>
</head>

<body>

    <form method="POST" action="create_livros.php">

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" required>

        <label for="anoPublicacao">Ano da Publicação:</label>
        <input type="date" name="anoPublicacao" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>