<?php
    

    include_once '../config/database.php';
    include_once '../class/Equipe.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Equipe($db);
    
    // $data = json_decode(file_get_contents("php://input"));
    // ou $_GET  
    $item->setID($_GET['id']);       
    if($item->deleteEquipe()){ 
        echo json_encode("Membro da Equipe deletado.");
    } else{
        echo json_encode("Membro da Equipe Não foi Removido");
    }
?>