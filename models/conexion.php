<?php
/*
* Autor <jCarlos:Mendoza/>
* Código: Conexion.php
* Fecha: 20/04/2017
*/
class Conexion extends PDO
{
  // Propiedades de la clase Conexion
  private $driver = "mysql";
  private $dbname = "db_usuario";
  private $host   = "localhost";
  private $user   = "root";
  private $pw     = "";

  function __construct()
  {
    try
    {
      // Sobre escribir el constructor padre
        parent::__construct($this->driver.':host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pw);
        parent::exec('set names utf8');
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (PDOException $pe) {
        echo "Ha surgido un error y no se puede conectar a base de datos. Detalles: ".$pe->getMessage();
        die();
    }

  }
}
 ?>
