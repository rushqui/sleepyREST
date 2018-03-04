<?php 
header('Content-Type: application/json');
require 'pacientHandler.php';

if($_SERVER['REQUEST_METHOD']== POST){

$json=file_get_contents('php://input');
$registro=json_decode($json,true);


/*$usuario = $_POST['usuario'];
$email=$_POST['email'];
$password = $_POST['password']; */
$usuario= $registro['usuario'];
$correo= $registro['email'];
$password= $registro['password'];
$fechaNacimiento= $registro['fechaNacimiento'];
$edad= $registro['edad'];
$sexo= $registro['sexo'];
$direccion= $registro['direccion'];
$celular= $registro['celular'];

$insert_user=Paciente::insertPacient($usuario,$correo,$password,$fechaNacimiento,$edad,$sexo,$direccion,$celular);

if($insert_user){
	print json_encode(array(
			"success" => true,
			"mensaje" => "Registro Completado"
			));
}else{
	print json_encode(array(
			"success" => false,
			"mensaje" => "Registro No Completado"
			));
}
if($usuario==null | $correo==null | $password==null){
	print json_encode(array(
			"success" => false,
			"mensaje" => "Error ingrese los datos correctamente"
			));

}

}  


 ?>