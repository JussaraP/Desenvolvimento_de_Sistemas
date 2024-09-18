<?php

$host = 'localhost';
$dbname = 'bancodedados';
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

$nome = 'cafe';
$preco = '9.99';

$sql = "INSERT INTO produtos(nome,preco) VALUES (:nome,:preco)";

//prepara a conexão

$stmt = $conn->prepare($sql);

//associa os valores aos parametros de consulta
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':preco',$preco);

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