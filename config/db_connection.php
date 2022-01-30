<?php

    $HOST = 'db4free.net';
    $USER = 'aaron_db';
    $PASSWORD = 'Nakamaliw1';
    $DATABASE = 'db_books_store';

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