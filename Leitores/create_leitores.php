<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = " INSERT INTO leitores (name, email, telefone) VALUE ('$name','$email','$telefone)";

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
    <title>Cadastro leitores</title>
</head>

<body>

    <form method="POST" action="create_leitores.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="telephone" name="telefone" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>