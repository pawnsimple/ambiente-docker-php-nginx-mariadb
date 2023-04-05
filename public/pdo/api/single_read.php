<?php
    include_once '../config/database.php';
    include_once '../class/Equipe.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Equipe($db);  

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->setID($id);   
    $item->getSingleEquipe();   

    if($item->getProperty('nome') != null){ 
        $emp_arr = array(
            "id" =>  $item->getProperty('id'),
            "nome" => $item->getProperty('nome'),
            "email" => $item->getProperty('email'),
            "idade" => $item->getProperty('idade'),
            "trabalho" => $item->getProperty('trabalho'),
            "data_criacao" => $item->getProperty('data_criacao'),
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404); 
        echo json_encode("Membro da Equipe Não Encontrado");
    }
?>