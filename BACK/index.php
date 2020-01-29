<?php
require 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;
require "bootstrap.php";
const CLE = "jesuisunecle";
$app = new \Slim\App;
$jwt = new \Slim\Middleware\JwtAuthentication([
    "path" => "/api",
    "secure" => false,
    "passthrough" => ["/api/users/login","/api/users/register"],
    "secret" => CLE,
    "attribute" => "decoded_token_data",
    "algorithm" => ["HS256"],
    "error" => function ($response, $arguments) {
        $data = array('ERREUR' => 'ERREUR', 'ERREUR' => 'AUTO');
        return $response->withHeader("Content-Type", "application/json")->getBody()->write(json_encode($data));
    }
]);
 $app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
}); 
$app->add($jwt);
$app->get('/produits', 'getProduits');
$app->get('/allclients', 'getAllClients');
$app->get('/getclient', 'getClient');
$app->post('/client', 'addClient');
$app->put('/client/{id}', 'updateClient');
$app->delete('/client/{id}', 'deleteClient');
$app->get('/connexion', '');
$app->post('/login', 'login');


function login ($request, $response, $args) {
    $login = "test";
    $pwd = "test";
    
    $body = $request->getParsedBody(); // Parse le body
    $enteredLogin = $body['login'];
    $enteredPwd = $body['mdp']; 
    //if($enteredLogin==$login && $enteredPwd==$pwd) {
        $issuedAt = time();
        $expirationTime = $issuedAt + 60; // jwt valid for 60 seconds from the issued time
        $payload = array(
        'login' => $enteredLogin,
        'iat' => $issuedAt,
        'exp' => $expirationTime
        );
        $token_jwt = JWT::encode($payload,CLE, "HS256");
        
        $response = $response->withHeader("Content-Type", "application/json");
        
        $data = array('login' => $login, 'pwd' => $pwd, 'token' => $token_jwt);
        return $response->withJson($data);
    //}
    $data = array("erreur" => 'Erreur!', 'token' => "ERREUR");
    return $response->withJson($data);
}

function setHeader($response) {
    return $response->withHeader("Access-Control-Allow-Origin", "*")->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
}

function getProduits($resquest,$response,$args)  
{
	include("list_products.php");
}

function getAllClients($resquest,$response,$args)  
{
	include("list_clients.php");
}

function addClient($request,$response,$args) {
    global $entityManager;
	$body = $request->getParsedBody(); // Parse le body
    
	$client = new Client();
	
	$client->setName($body['name']);
	$client->setFirstname($body['firstname']);
	$client->setAdress($body['adress']);
	$client->setCp($body['cp']);
	$client->setVille($body['ville']);
	$client->setTel($body['tel']);
	$client->setEmail($body['email']);
	$client->setCivilite($body['civilite']);
	$client->setLogin($body['login']);
	$client->setPassword($body['password']);
	$client->setPasswordVerif($body['passwordVerif']);
	
	$entityManager->persist($client);
	$entityManager->flush();
	
    return $response->write(json_encode($client));
}
function getClient($request,$response,$args) {
    return $response->write(json_encode($client));
}
$app->run();
    
?>