<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->options('/{routes}', function($request, $response, $args){
		return $response;
});

$app->add(function($req,$res,$next){
		$response = $next($req, $res);
		return $response
			->withHeader('Access-Control-Allow-Origin','*')
			->withHeader('Access-Control-Allows-Headers',
				'X-Requested-With, Content-Type, Accept, Origin, Authorization')
			->withHeader('Access-Control-Allow-Methods','GET,POST,PUT,
			 DELETE, OPTIONS');
});


$app->post('/login',function(Request $req, Response $res){
	$email = $req->getParam('email');
	$contrasena = $req->getParam('contrasena');


	$consulta = 'SELECT * FROM dbuser WHERE email="'.$email.'" AND contrasena ="'.$contrasena.'"';
	try{

		$db = new db();

		$db = $db->conectar();

		$ejecutar = $db->query($consulta);

		$users = $ejecutar->fetchAll(PDO::FETCH_OBJ);

		$db = null;

		echo json_encode($users);

	}catch(PDOException $ex){
		echo '{"error":{"text":'.$ex->getMessage().'}}';
	}
});




$app->get('/usuarios',function(Request $req, Response $res){

	$consulta = 'SELECT * FROM dbuser';
	try{

		$db = new db();

		$db = $db->conectar();

		$ejecutar = $db->query($consulta);

		$users = $ejecutar->fetchAll(PDO::FETCH_OBJ);
		
		$db = null;

		echo json_encode($users);

	}catch(PDOException $ex){
		echo '{"error":{"text":'.$ex->getMessage().'}}';
	}

	return $res->withHeader('Content-Type','application/json');

});

$app->get('/usuarios/{id}',function(Request $req, Response $res){

	$id = $req->getAttribute('id');
	$consulta = 'SELECT * FROM dbuser WHERE id='.$id;
	try{

		$db = new db();

		$db = $db->conectar();

		$ejecutar = $db->query($consulta);

		$users = $ejecutar->fetchAll(PDO::FETCH_OBJ);
		
		$db = null;

		echo json_encode($users);

	}catch(PDOException $ex){
		echo '{"error":{"text":'.$ex->getMessage().'}}';
	}

	return $res->withHeader('Content-Type','application/json');

});



//Metodo agregar
$app->post('/usuarios', function(Request $req, Response $res){
	$nombre = $req->getParam('nombre');
	$apellido = $req->getParam('apellido');
	$edad = $req->getParam('edad');
	$direccion = $req->getParam('direccion');
	$email = $req->getParam('email');
	$contrasena = $req->getParam('contrasena');

	$consulta = "INSERT INTO dbuser (nombre, apellido, edad, direccion, email, contrasena) VALUES (:nombre,
	:apellido, :edad, :direccion, :email, :contrasena)";
// }); <-- el cierre va hasta abajo

try{
	$db = new db();
	$db = $db->conectar();
	$ejecutar = $db->prepare($consulta); // $ejecutar -> $db->prepare($consulta);

	$ejecutar -> bindParam(':nombre', $nombre);
	$ejecutar -> bindParam(':apellido', $apellido);
	$ejecutar -> bindParam(':edad', $edad);
	$ejecutar -> bindParam(':direccion', $direccion);
	$ejecutar -> bindParam(':email', $email);
	$ejecutar -> bindParam(':contrasena', $contrasena);

	$ejecutar -> execute();

	echo '{"resultado":"Usuario registrado"}';
	$db = null;

}catch(PDOException $ex){
echo '["error":"'.$ex->getMessage().'"}]';
}

return $res->withHeader('Content-Type','application/json');

});


//Metodo modificar
$app->post('/editar/{id}', function(Request $req, Response $res){
	$id = $req->getAttribute('id');
	$nombre = $req->getParam('nombre');
	$apellido = $req->getParam('apellido');
	$edad = $req->getParam('edad');
	$direccion = $req->getParam('direccion');
	$email = $req->getParam('email');
	$contrasena = $req->getParam('contrasena');

	$consulta = "UPDATE dbuser SET nombre=:nombre,apellido=:apellido,edad=:edad,direccion=:direccion,email=:email,contrasena=:contrasena WHERE id = ".$id;
// }); <-- el cierre va hasta abajo

try{
	$db = new db();
	$db = $db->conectar();
	$ejecutar = $db->prepare($consulta); // $ejecutar -> $db->prepare($consulta);

	$ejecutar -> bindParam(':nombre', $nombre);
	$ejecutar -> bindParam(':apellido', $apellido);
	$ejecutar -> bindParam(':edad', $edad);
	$ejecutar -> bindParam(':direccion', $direccion);
	$ejecutar -> bindParam(':email', $email);
	$ejecutar -> bindParam(':contrasena', $contrasena);

	$ejecutar -> execute();

	echo '{"resultado":"Usuario modificado"}';
	$db = null;

}catch(PDOException $ex){
echo '{"error":"'.$ex->getMessage().'"}';
}

return $res->withHeader('Content-Type','application/json');

});


//Metodo eliminar
$app->post('/eliminar/{id}', function(Request $req, Response $res){
	$id = $req->getAttribute('id');

	$consulta = "DELETE FROM dbuser WHERE id = ".$id;
// }); <-- el cierre va hasta abajo

try{
	$db = new db();
	$db = $db->conectar();
	$ejecutar = $db->prepare($consulta); // $ejecutar -> $db->prepare($consulta);

	$ejecutar -> execute();

	echo '{"resultado":"Usuario eliminado"}';
	$db = null;

}catch(PDOException $ex){
echo '{"error":"'.$ex->getMessage().'"}';
}

return $res->withHeader('Content-Type','application/json');

});
?>