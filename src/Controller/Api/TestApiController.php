<?php

namespace App\Controller\Api;

use Mithridatem\Routing\Attribute\Route;

class TestApiController
{
    #[Route(path: '/api/test', method:'GET')]
    public function test(): void 
    {
        //Tableau de réponse
        $response = ["message"=>"Bonjour"];

        //ajouter les entêtes HTTP
        header('Content-Type: text/json');

        header('Access-Control-Allow-Origin: *');
        
        //Code de status HTTP
        http_response_code(200);

        //Affichage du JSON
        echo json_encode($response);
    } 
}
