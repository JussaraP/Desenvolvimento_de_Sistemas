<?php

$host = 'localhost';
$dbname = 'livro';
$username = 'root';
$password = '';

//cria conexão com banco de dados PDO - PHP Data Objects


try{
    $conn = new PDO("mysql:host = $host;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso<br>";
}
catch (PDOException $e){
    echo "Falha na conexão:".$e->getmessage();
}

//dados a serem inseridos

$nome = 'C.S. Lewis';
$nacionalidade = 'Inglaterra';
$dataNascimento = '1892-01-03';

$sql = "INSERT INTO autores(nome,nacionalidade,dataNascimento) VALUES (:nome,:nacionalidade,:dataNascimento)";

//prepara a conexão

$stmt = $conn->prepare($sql);

//associa os valores aos parametros de consulta
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':nacionalidade',$nacionalidade);
$stmt->bindParam(':dataNascimento',$dataNascimento);

// executa a consulta

if($stmt->execute()){
    echo "dados inseridos com sucesso";
}
else{
    echo "Erro ao inserir dados";
}

//fecha a conexão

$conn = null;

?>