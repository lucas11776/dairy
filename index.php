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
                          ->withHeader('Access-Control-Allow-Methods', 'GET, POST');
});

// return all items in database
$app->get('/api/', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles'));
});

// get single item
$app->get('/api/single/{id}', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles', array('id' => $args['id'])));
});

// create item
$app->get('/api/create', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->create('articles', $args)) ? array('status' => true) : array('status' => false);
});

// update item
$app->get('/api/update', function (Request $request, Response $response, array $args) {
  echo 'Update';
});

// Delete item
$app->get('/api/delete', function (Request $request, Response $response, array $args) {
  echo 'Delete';
});

$app->run();