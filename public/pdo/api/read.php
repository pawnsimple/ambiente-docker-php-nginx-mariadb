<?php

    
    include_once '../config/database.php';
    include_once '../class/Equipe.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Equipe($db);

    $stmt = $items->getEquipe();   
    $itemCount = $stmt->rowCount();


    // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $equipeArr = array();
        $equipeArr["body"] = array();
        $equipeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "idade" => $idade,
                "trabalho" => $trabalho,
                "data_criacao" => $data_criacao
            );

            array_push($equipeArr["body"], $e);
        }
        echo json_encode($equipeArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Sem Registro.")
        );
    }
?>