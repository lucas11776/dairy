<?php

namespace Database\Classes;

use PDO;

class Connection
{
  /**
   * Database host address
   * 
   * @var string
   */
  private const HOST = 'localhost';

  /**
   * Database host address
   * 
   * @var string
   */
  private const USERNAME = 'root';

  /**
   * Database host address
   * 
   * @var string
   */
  private const PASSWORD = '';

  /**
   * Database host address
   * 
   * @var string
   */
  private const DATABASE = 'dairy';

  /**
   * Database connection
   * 
   * @var object
   */
  protected $db_conn;

  public function __construct ()
  {
    try
    {
      $this->db_conn = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE, self::USERNAME, self::PASSWORD);
      $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error)
    {
      die($error->getMessage());
    }
  }
}
