<?php

//abrir conexão com o banco de dados

$conn = mysqli_connect('localhost','root','','livro');

//seleciona o banco de dados ativo

mysql_select_db('livro', $conn);

// define a consulta a ser realizada

$query = 'SELECT id,nome,nacionalidade FROM autores';

//envia consulta ao banco de dados

$result = mysql_query($query,$conn);

if ($result){
    //percorre resultados da pesquisa
    while ($row = mysql_fetch_assoc($result)){
        echo $row[id]. '-' .$row['nome']. '-' .$row['nacionalidade']. "br\n";
    }
}
// fecha a conexão
mysql_close($conn);

?>