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
      if ($valid !== true) $this->error[$key] = $valid;
    }
    return count($this->error) === 0 ? true : false;
  }

  /**
   * Validation
   */
  protected function validate (string $key, array $validators)
  {
    $val = 'themba'; //$this->request->getParams()[$key] ?? '';
    $error = null; // validation error placeholder

    for ($i = 0; $i < count($validators); $i++)
    {
      $single_validator = explode(self::SPLIT_VAL, $validators[$i]);
      $swich = strtolower($single_validator[0]);

      switch ($swich) {

        case 'required':
          if (!$error && $this->required($val)) $error = "The {$key} field is required";
          break;

        case 'min':
          if (!$error && $this->min($val, $single_validator[1])) $error = "The {$key} most have min length " . $single_validator[1] . " .";
          break;

        case 'max':
        if (!$error && $this->max($val, $single_validator[1])) $error = "The {$key} most have max length " . $single_validator[1] . " .";
          break;

        case 'integer':
          if (!$error && $this->max($val, $single_validator[1])) $error = "The {$key} most have max length " . $single_validator[1] . " .";
          break;
      }
    }

    return $error === null ? true : $error;
  }

  /**
   * Validation errors
   * 
   * @param   string
   * @return  array
   */
  public function array_error(string $field = null)
  {
    return $field === null ? $this->error : ($this->error[$field] ?? '');
  }

  /**
   * Clear validation error
   */
  private function clear_error ()
  {
    $this->error = array();
  }
}