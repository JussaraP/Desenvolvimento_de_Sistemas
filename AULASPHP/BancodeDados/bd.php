<?php

//configuração do banco de dados

$host = 'localhost';
$dbname = 'livro';
$username = 'root';
$password = '';

//criar a conexão com o banco de dados


$conn = new mysqli($host, $username, $password, $dbname);

//verifica se houve erro na conexão

if($conn ->connect_error){
    die ("Falha na conexão".$conn ->connect_error);
}
echo "Conexão realizada com sucesso";

//Dados a serem inseridos

$sql = "INSERT INTO autores (nome, nacionalidade, dataNascimento) VALUES ('Machado de Assis','Brasil','06/21/1889')";

//executo a instrução e verifico erro

if($conn->query($sql) === TRUE){
    echo "Dados inseridos com sucesso";
}
else{
    echo "Erro ao inserir dados" .$conn->error;
}

$conn->close();


?>