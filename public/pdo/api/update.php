<?php
    
    include_once '../config/database.php';
    include_once '../class/Equipe.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Equipe($db);
    
    // $data = json_decode(file_get_contents("php://input"));
    // Ou $_POST  

    $item->setID(1);        
    $item->setValues([  
        'nome'=>'Atualizado Nome',
        'email'=>'Atualizado Email',
        'idade'=>25, 
        'trabalho'=>'Atualizado Trabalho',
        'data_criacao'=>date('Y-m-d')]);
    
    if($item->updateEquipe()){
        echo json_encode("Membro da Equipe Atualizado"); 
    } else{
        echo json_encode("Membro da Equipe Não Foi Atualizado"); 
    }
?>