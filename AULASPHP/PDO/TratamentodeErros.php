<?php
$host = 'localhost';
$dbname = 'bancodedados';
$username = 'root';
$password = '';

//cria conexão com banco de dados PDO - PHP Data Objects


try{
    $pdo = new PDO("mysql:host = $host;dbname=$dbname",$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso<br>";
}
catch (PDOException $e){
    echo "Falha na conexão:".$e->getmessage();
}

try{
    //Inicia a transação
    $pdo->beginTransaction();

    //Primeira consulta
    $stmti = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    $stmti->execute(['João', "joao@gmail.com"]);

    //Segunda consulta (suponha que ocorra um erro aqui, como volação de chave unica)
    $stmt2 = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    $stmt2->execute(['Maria', 'joao@gmail.com']);//erro, email duplicado

    //Confirma a transação
    $pdo->commit();

    echo "Transação realizada com sucesso!";
}catch (PDOException $e){
    //Reverte a transação em caso de erro
    $pdo->rollBack();
    echo "Erro na transação: ". $e->getMessage();
}
?>