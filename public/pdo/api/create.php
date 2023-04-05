<?php
    include_once '../config/database.php';
    include_once '../class/Equipe.php';

    $database = new Database(); 
    $db = $database->getConnection(); 

    $item = new Equipe($db);  

    //$data = json_decode(file_get_contents("php://input"));
    //Podem acessar via POST também $_POST
    
    $pessoas = array(
        array("nome" => "João Silva", "email" => "joaosilva@contato.com", "idade" => 30, "trabalho" => "Desenvolvedor"),
        array("nome" => "Maria Santos", "email" => "mariasantos@contato.com", "idade" => 28, "trabalho" => "Designer"),
        array("nome" => "Pedro Oliveira", "email" => "pedroliveira@contato.com", "idade" => 35, "trabalho" => "Gerente"),
        array("nome" => "Ana Paula", "email" => "anapaula@contato.com", "idade" => 32, "trabalho" => "Gerente de Projeto"),
        array("nome" => "Lucas Rodrigues", "email" => "lucasrodrigues@contato.com", "idade" => 26, "trabalho" => "Desenvolvedor"),
        array("nome" => "Carla Souza", "email" => "carlasouza@contato.com", "idade" => 27, "trabalho" => "Designer"),
        array("nome" => "Rafael Silva", "email" => "rafael silva@contato.com", "idade" => 33, "trabalho" => "Gerente"),
        array("nome" => "Juliana Santos", "email" => "julianasantos@contato.com", "idade" => 31, "trabalho" => "Gerente de Projeto"),
        array("nome" => "Vinicius Oliveira", "email" => "viniciusoliveira@contato.com", "idade" => 29, "trabalho" => "Desenvolvedor"),
        array("nome" => "Bianca Almeida", "email" => "biancaalmeida@contato.com", "idade" => 27, "trabalho" => "Designer")
    );

    $random = $pessoas[array_rand($pessoas)];

    $item->setValues([ 
        'nome'=>$random['nome'], 
        'email'=>$random['email'],
        'idade'=>$random['idade'],
        'trabalho'=>$random['trabalho'],
        'data_criacao'=>date('Y-m-d')]);

    if($item->createEquipe()){
        echo 'Membro Equipe Criado Com Sucesso.';
    } else{
        echo 'Membro Equipe não foi criado Com .';
    }
?>