<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $anoPublicacao = $_POST['anoPublicacao'];

    $sql = "UPDATE livros SET titulo ='$titulo',genero ='$genero',anoPublicacao ='$anoPublicacao' WHERE id=$id";

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

$sql = "SELECT * FROM livros WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de livros</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo'];?>" required>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" value="<?php echo $row['genero'];?>" required>

        <label for="anoPublicacao">Ano de Publicação:</label>
        <input type="date" name="anoPublicacao" value="<?php echo $row['anoPublicacao'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>