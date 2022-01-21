<?php

    $HOST = 'localhost';
    $USER = 'root';
    $PASSWORD = '';
    $DATABASE = 'db_books';

    $dns = "mysql:host=$HOST;dbname=$DATABASE";

    try{

        $pdo = new PDO($dns, $USER, $PASSWORD);

    }catch(PDOException $ex){

        die(json_encode(array(
            'outcome'=>false,
            'message'=>'Unable to connect.'
        )));
       
    }

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);