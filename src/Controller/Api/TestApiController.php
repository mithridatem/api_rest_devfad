<?php

namespace App\Controller\Api;

use Mithridatem\Routing\Attribute\Route;
use Mithridatem\Routing\Http\RequestInterface;

class TestApiController
{
    //Méthode qui retourne un JSON en GET
    #[Route(path: '/api/test', method: 'GET')]
    public function test(): void
    {
        //Tableau de réponse
        $response = ["message" => "Bonjour"];

        //ajouter les entêtes HTTP
        header('Content-Type: text/json');

        header('Access-Control-Allow-Origin: *');

        //Code de status HTTP
        http_response_code(200);

        //Affichage du JSON
        echo json_encode($response);
    }

    //Méthode qui retourne un JSON en GET avec un Paramètre
    #[Route(path: '/api/bonjour/{nom}', method: 'GET')]
    public function bonjourNom(string $nom): void
    {
        //Tableau de réponse
        $response = ["message" => "Bonjour " . $nom];

        //ajouter les entêtes HTTP
        header('Content-Type: text/json');

        header('Access-Control-Allow-Origin: *');

        //Code de status HTTP
        http_response_code(200);

        //Affichage du JSON
        echo json_encode($response);
    }

    //Méthode qui retourne un JSON en GET avec un Paramètre en GET (query param)
    #[Route(path: '/api/bonjourget', method: 'GET')]
    public function bonjourNomGet(): void
    {
        if (isset($_GET["nom"])) {
            $nom = $_GET["nom"];
        }
        //Tableau de réponse
        $response = ["message" => "Bonjour en GET " . $nom ?? ""];

        //ajouter les entêtes HTTP
        header('Content-Type: text/json');

        header('Access-Control-Allow-Origin: *');

        //Code de status HTTP
        http_response_code(200);

        //Affichage du JSON
        echo json_encode($response);
    }

    //Méthode qui récupére le contenu du body (RequestInterface)
    #[Route(path: '/api/test/body', method: 'GET')]
    public function testBody(RequestInterface $request): void
    {
        $body = $request->getContent();
        $tab = json_decode($body, true);
        print_r($tab);
    }

    //Méthode qui récupére le contenu du body (file_get_contens + php://input)
    #[Route(path: '/api/test/bodyv2', method: 'GET')]
    public function testBodyv2(): void
    {
        $input = file_get_contents("php://input");
        $json_array = json_decode(
            json: $input,
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );
        print_r($json_array);
    }
}
