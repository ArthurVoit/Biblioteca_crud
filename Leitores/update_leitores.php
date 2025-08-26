<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $nacionalidade = $_POST['nacionalidade'];
    $dataNascimento = $_POST['dataNascimento'];

    $sql = "UPDATE autores SET name ='$name',nacionalidade ='$nacionalidade',dataNascimento ='$dataNascimento' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM autores WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de autores</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['name'];?>" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade'];?>" required>

        <label for="dataNascimento">Data do Nascimento:</label>
        <input type="date" name="dataNascimento" value="<?php echo $row['dataNascimento'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>