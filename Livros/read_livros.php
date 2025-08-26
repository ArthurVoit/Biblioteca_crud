<?php

include 'db.php';

$sql = "SELECT * FROM livros INNER join autores on fk_autor = id_autor";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> Titulo </th>
            <th> Gênero </th>
            <th> Ano de publicação </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['titulo']} </td>
                <td> {$row['genero']} </td>
                <td> {$row['anoPublicacao']} </td>
                <td> {$row['nome']} </td>
                <td> 
                    <a href='update.php?id={$row['id']}'>Editar<a>
                    <a href='delete.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create.php'>Inserir novo Registro</a>";