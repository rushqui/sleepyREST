<?php 
header('Content-Type: application/json');
require 'doctorHandler.php';

if($_SERVER['REQUEST_METHOD']== POST){

$json=file_get_contents('php://input');
$registro=json_decode($json,true);


/*$usuario = $_POST['usuario'];
$email=$_POST['email'];
$password = $_POST['password']; */
$correo= $registro['correo'];
$password= $registro['password'];

$insert_doctor=Doctor::insertPacient($correo,$password);

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