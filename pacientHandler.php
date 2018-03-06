<?php 
require 'databaseConnection.php';

class Paciente
{
	public static function getAll()
	{
		$consulta = "SELECT * FROM Pacientes";
		try {
			$comando= Database::getInstance()->getDb()->prepare($consulta);
			$comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
		
		    return false;	
		}
	}


	public static function insertPacient($nombre,$correo,$password,$fechaNacimiento,$edad,$sexo,$direccion,$celular)
	{
		$Query= "INSERT INTO  Pacientes(nombre,correo,password,fechaNacimiento,edad,sexo,direccion,celular) VALUES (?,?,?,?,?,?,?,?)"; 
		$sentencia=Database::getInstance()->getDb()->prepare($Query);
		$sentencia->bindParam(1,$nombre,PDO::PARAM_STR,100);
		$sentencia->bindParam(2,$correo,PDO::PARAM_STR,30);
		$sentencia->bindParam(3,$password,PDO::PARAM_STR,30);
		$sentencia->bindParam(4,strtotime(date($fechaNacimiento)),PDO::PARAM_STR,20);
		$sentencia->bindParam(5,$edad,PDO::PARAM_INT);
		$sentencia->bindParam(6,$sexo,PDO::PARAM_STR,10);
		$sentencia->bindParam(7,$direccion,PDO::PARAM_STR,200);
		$sentencia->bindParam(8,$celular,PDO::PARAM_STR,20);

          return $sentencia->execute(array($nombre, $correo, $password,$fechaNacimiento, $edad, $sexo, $direccion, $celular));
          $sentencia->close();

	}	

public static function getUserByEmail($email_search)
	{
      $query="SELECT id,nombre,email,password FROM usuarios_table WHERE email=?";
      try{
      	$sentence=Database::getInstance()->getDb()->prepare($query);
        $sentence->bindParam(1,$email_search,PDO::PARAM_STR,30);
        $sentence->execute();
      //$sentence->execute(array($email_search));
      return $sentence->fetch(PDO::FETCH_ASSOC);
      }catch(Exception $e){
     	return false;
     }
      
	}
	

}

?>

