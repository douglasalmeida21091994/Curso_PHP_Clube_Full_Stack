<?php
require '../../../bootstrap.php';

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

function create() {

}

function update() {

}

function find() {

}

function delete() {

}