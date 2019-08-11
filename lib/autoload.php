<?php

spl_autoload_register(function ($class) {
  // convert namespace to path
  $class = explode('\\', $class);
  $class = implode('/', $class);
  include $class . '.php';
});
