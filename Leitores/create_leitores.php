<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['a'];
    $nacionalidade = $_POST['nacionalidade'];
    $dataNascimento = $_POST['dataNascimento'];

    $sql = " INSERT INTO autores (name, nacionalidade, dataNascimento) VALUE ('$name','$nacionalidade','$dataNascimento)";

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
    <title>Cadastro Autores</title>
</head>

<body>

    <form method="POST" action="create_autor.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" required>

        <label for="dataNascimento">Data do Nascimento:</label>
        <input type="date" name="dataNascimento" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>