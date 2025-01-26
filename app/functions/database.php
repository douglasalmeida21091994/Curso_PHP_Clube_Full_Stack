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

function all($table) {
    $pdo = connect();
    $sql = "SELECT * FROM $table WHERE situacao = 1";
    $all = $pdo->prepare($sql);
    $all->execute();
    return $all->fetchAll();
}

function update($table, $fields) {
    $pdo = connect();
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $fields = (array) $fields;
    $fields['id'] = $id;

    $sql = "UPDATE $table SET ";

    foreach ($fields as $key => $value) {
        if ($key !== 'id') {
            $sql .= "$key = :$key, ";
        }
    }

    $sql = rtrim($sql, ', ');
    $sql .= " WHERE id = :id";
    $update = $pdo->prepare($sql);

    return $update->execute($fields);

}

function find($table, $id) {
    $pdo = connect();
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $sql = "SELECT * FROM $table WHERE id = :id";
    $find = $pdo->prepare($sql);
    $find->bindValue(':id', $id);
    $find->execute();
    return $find->fetch();

    dd($find->fetch());

}

function delete($table, $id, $situacao) {
    $pdo = connect();
    $id = filter_var($id, FILTER_VALIDATE_INT);
    $situacao = filter_var($situacao, FILTER_VALIDATE_INT);

    // Verifique se os valores são válidos
    if ($id && $situacao !== false) {
        $sql = "UPDATE $table SET situacao = :situacao WHERE id = :id";
        $delete = $pdo->prepare($sql);
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        $delete->bindValue(':situacao', $situacao, PDO::PARAM_INT);  
        
        // Execute e retorne o resultado
        return $delete->execute();
    } else {
        return false;
    }
}
