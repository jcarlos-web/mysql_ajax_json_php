<?php
/*
* Autor <jCarlos:Mendoza/>
* Código: Usuario.php
* Fecha: 20/04/2017
*/
class Usuario
{
      private $id;
      private $nombre;
      private $ap_pat;
      private $ap_mat;
      private $usu;
      private $pw;

      public function __construct($id, $nombre, $ap_pat, $ap_mat, $usu, $pw)
      {
          $this->id     = $id;
          $this->nombre = $nombre;
          $this->ap_pat = $ap_pat;
          $this->ap_mat = $ap_mat;
          $this->usu    = $usu;
          $this->pw     = $pw;

      }


      // Método Read
      public function readUsuario($search)
      {
          $conexion = new Conexion();
          $sql = "SELECT * FROM usuario WHERE nombre LIKE '%".$search."%' OR ap_pat LIKE '%".$search."%' OR ap_mat LIKE '%".$search."%' OR usu LIKE '%".$search."%' ORDER BY id DESC";
          $query = $conexion->prepare($sql);
          $query->execute();
          $data = array();
          while($row = $query->fetch(PDO::FETCH_NUM))
          {
            $data[] = $row;
          }
          return json_encode($data);
          $conexion = null;
      }

      // Método getElementById
      public static function getUsuarioById($id)
      {
          $conexion = new Conexion();
          $sql = "SELECT * FROM usuario WHERE id=?";
          $query = $conexion->prepare($sql);
          $query->bindParam(1,$id);
          $query->execute();
          $result = ($query)? $query->fetch():null;
          return $result;
          $conexion = null;
      }

      // Método Create
      public function createUsuario()
      {
          $conexion = new Conexion();
          $sql = "INSERT INTO usuario(nombre, ap_pat, ap_mat, usu, pw)
                  VALUES(?,?,?,?,?)";
          $query = $conexion->prepare($sql);
          $query->bindParam(1,$this->nombre);
          $query->bindParam(2,$this->ap_pat);
          $query->bindParam(3,$this->ap_mat);
          $query->bindParam(4,$this->usu);
          $query->bindParam(5,$this->pw);
          $query->execute();
          $result = ($query)?true:false;
          return $result;
          $conexion = null;
      }

      // Método Update
      public function updateUsuario()
      {
          $conexion = new Conexion();
          $sql = "UPDATE usuario SET nombre=?, ap_pat=?, ap_mat=?, usu=?, pw=? WHERE id=?";
          $query = $conexion->prepare($sql);
          $query->bindParam(1,$this->nombre);
          $query->bindParam(2,$this->ap_pat);
          $query->bindParam(3,$this->ap_mat);
          $query->bindParam(4,$this->usu);
          $query->bindParam(5,$this->pw);
          $query->bindParam(6,$this->id);
          $query->execute();
          $result = ($query)?true:false;
          return $result;
          $conexion = null;
      }

      // Método Delete
      public static function deleteUsuario($id)
      {
          $conexion = new Conexion();
          $sql = "DELETE FROM usuario WHERE id=?";
          $query = $conexion->prepare($sql);
          $query->bindParam(1,$id);
          $query->execute();
          $result = ($query)?true:false;
          return $result;
          $conexion = null;
      }



}

 ?>
