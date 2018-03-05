<?php 
require 'databaseConnection.php';

class Doctor
{
	public static function getAll()
	{
		$consulta = "SELECT * FROM Doctores";
		try {
			$comando= Database::getInstance()->getDb()->prepare($consulta);
			$comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
		
		    return false;	
		}
	}


	public static function insertDoctor($nombre, $correo, $password,$fechaNacimiento, $edad, $sexo, $direccion, $celular)
	{
		$Query= "INSERT INTO  Doctores(correo,password) VALUES (?,?)"; 
		$sentencia=Database::getInstance()->getDb()->prepare($Query);
		$sentencia->bindParam(1,$correo,PDO::PARAM_STR,50);
		$sentencia->bindParam(2,$password,PDO::PARAM_STR,30);
		
          return $sentencia->execute(array($correo, $password));
          $sentencia->close();

	}	

public static function getUserByEmail($email_search)
	{
      $query="SELECT id,correo,password FROM usuarios_table WHERE correo=?";
      try{
      	$sentence=Database::getInstance()->getDb()->prepare($query);
        $sentence->bindParam(1,$email_search,PDO::PARAM_STR,50);
        $sentence->execute();
      //$sentence->execute(array($email_search));
      return $sentence->fetch(PDO::FETCH_ASSOC);
      }catch(Exception $e){
     	return false;
     }
      
	}
	

}

?>

