<?php


function connect() {
    $pdo = new PDO('mysql:host=localhost;dbname=sos_ocommon', 'root', '');
    
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // para trabalhar já retornando com objetos pegando assim: $user->name        
        return $pdo;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    
}

function create($table, $fields) {
    
    // transformando em array
    if (!is_array($fields)) {
        $fields = (array) $fields;
    }

    $sql = "INSERT INTO $table";
    $sql .= " (".implode(', ', array_keys($fields)).")";
    $sql .= " VALUES  (" . ':'.implode(', :', array_keys($fields)).")";
    
    $pdo = connect();
    $insert = $pdo->prepare($sql);
    return $insert->execute($fields);

}

function update() {

}

function find() {

}

function delete() {

}