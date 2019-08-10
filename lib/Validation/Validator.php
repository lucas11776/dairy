<?php

namespace Validation;

use Validation\Classes\Tools as Tools;

class Validator extends Tools
{
  /**
   * Slim request object
   * 
   * @var object
   */
  private $request;

  /**
   * Validation rules
   * 
   * @var array
   */
  private $validators;

  /**
   * Validation errors
   * 
   * @var array
   */
  private $error = array();

  /**
   * Validation (value) pair split char
   *  
   * @var string 
   */
  private const SPLIT_STR = '|';

  /**
   * Validation (value) split char
   * 
   * @var string
   */
  private const SPLIT_VAL = ':';

  public function __construct (object $request)
  {
    $this->request = $request;
  }

  public function set_rules (array $validators)
  {
    $this->validators = $validators;
  }

  /**
   * Run validation rules
   * 
   * @return boolean
   */
  public function run()
  {
    $this->clear_error(); // clear errors
    foreach ($this->validators as $key => $value)
    {
      $valid = $this->validate($key, explode(self::SPLIT_STR, $value));
    }
    return count($this->error) === 0 ? true : false;
  }

  /**
   * Validation
   */
  public function validate (string $key, array $validators)
  {
    $value = json_encode($this->request->getParams(), true)[$keys] ?? '';

    echo $value . ' ';
  }

  /**
   * Clear validation error
   */
  private function clear_error ()
  {
    $this->error = array();
  }
}