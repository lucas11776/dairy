<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'lib/autoload.php';

$app = new \Slim\App;
$db  = new \Database\Db;

// cross-origin
$app->add(function ($req, $res, $next) {
  return $next($req, $res)->withHeader('Access-Control-Allow-Origin', '*');
});

// return all items in database
$app->get('/', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles'));
});

// get single item
$app->get('/single/{id}', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->get('articles', array('id' => $args['id'])));
});

// create item
$app->get('/create', function (Request $request, Response $response, array $args) use ($db) {
  return $response->withJson($db->create('articles', array(
    'name'    => $args['name'],
    'title'   => $args['title'],
    'emotion' => $args['emotion'],
    'text'    => $args['text']
  ))) ? array('status' => true) : array('status' => false);
});

// update item
$app->get('/update', function (Request $request, Response $response, array $args) {
  echo 'Update';
});

// Delete item
$app->get('/delete', function (Request $request, Response $response, array $args) {
  echo 'Delete';
});

$app->run();