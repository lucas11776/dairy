<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

// return all items in database
$app->get('/', function (Request $request, Response $response, array $args) {
  echo 'Home';
});

// get single item
$app->get('/single/{id}', function (Request $request, Response $response, array $args) {
  echo 'Single';
});

// create item
$app->get('/create', function (Request $request, Response $response, array $args) {
  echo 'Create';
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