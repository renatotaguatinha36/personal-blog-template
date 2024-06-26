<?php
/*
 * Melhor prática usando Prepared Statements
 *
 */

$id = $_GET['id'];
try {
    $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $stmt = $conn->prepare('SELECT * FROM minhaTabela WHERE id = :id');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);  
    $stmt->execute(array('id' => $id));

    while($row = $stmt->fetch()) {
        print_r($row);
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>