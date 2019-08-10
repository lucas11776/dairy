<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'lib/autoload.php';

$app = new \Slim\App;
$db  = new \Database\Db;

// cross-origin 
$app->add(function ($req, $res, $next) {
  return $next($req, $res)->withHeader('Access-Control-Allow-Origin', '*')
                          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// return all items in database
$app->get('/api/', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles'));
});

// get single item
$app->get('/api/single/{id}', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles', array('id' => $args['id'])));
});

$app->post('/api/create', function($request, $response, $args) {
  $validator = new \Validation\Validator($request); // post validation
  $validator->set_rules(
    array('name' => 'required|min:3|max:30', 'title' => 'required|min:3|max:30','text'  => 'required|min:3|max:500')
  );
  if($validator->run() === false); //return $response->withJson($validator->error(array('status' => false))); 
  //return $response->withJson($db->create('articles', $args)) ? array('status' => true) : array('status' => false);
});

// update item
$app->post('/api/update', function (Request $request, Response $response, array $args) {
  echo 'Update';
});

// Delete item
$app->post('/api/delete', function (Request $request, Response $response, array $args) {
  echo 'Delete';
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
  $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
  return $handler($req, $res);
});

$app->run();