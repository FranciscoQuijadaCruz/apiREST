<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//$app = new \Slim\App;

/**
CONFIGURAR LOS CORS
*/
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


$app->get('/categorias',function(Request $req, Response $res){

	$consulta = 'SELECT * FROM dbcategories';
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

$app->get('/categorias/{id}',function(Request $req, Response $res){

	$id = $req->getAttribute('id');
	$consulta = 'SELECT * FROM dbcategories WHERE id='.$id;
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


$app->post('/categorias',function(Request $req, Response $res){

	
	$nombre = $req->getParam('nombre');
	$descripcion = $req->getParam('descripcion');

	$consulta = "INSERT INTO dbcategories (nombre,descripcion)
		VALUES
		(:nombre, :descripcion)";
	
	try{

		$db = new db();

		$db = $db->conectar();

		$ejecutar = $db->prepare($consulta);

		$ejecutar->bindParam(':nombre',$nombre);
		$ejecutar->bindParam(':descripcion',$descripcion);

		$ejecutar->execute();

		echo '{"resultado":"Categoria registrada"}';

		$db = null;


	}catch(PDOException $ex){
		echo '{"error":{"text":'.$ex->getMessage().'}}';
	}

	return $res->withHeader('Content-Type','application/json');





});


//Metodo modificar
$app->post('/editarcat/{id}', function(Request $req, Response $res){
	$id = $req->getAttribute('id');
	$nombre = $req->getParam('nombre');
	$descripcion = $req->getParam('descripcion');
	$consulta = "UPDATE dbcategories SET nombre=:nombre,descripcion=:descripcion WHERE id = ".$id;
// }); <-- el cierre va hasta abajo

try{
	$db = new db();
	$db = $db->conectar();
	$ejecutar = $db->prepare($consulta); // $ejecutar -> $db->prepare($consulta);

	$ejecutar -> bindParam(':nombre', $nombre);
	$ejecutar -> bindParam(':descripcion', $descripcion);

	$ejecutar -> execute();

	echo '{"resultado":"Categoria modificada"}';
	$db = null;

}catch(PDOException $ex){
echo '{"error":"'.$ex->getMessage().'"}';
}

return $res->withHeader('Content-Type','application/json');

});


//Metodo eliminar
$app->post('/eliminarcat/{id}', function(Request $req, Response $res){
	$id = $req->getAttribute('id');

	$consulta = "DELETE FROM dbcategories WHERE id = ".$id;
// }); <-- el cierre va hasta abajo

try{
	$db = new db();
	$db = $db->conectar();
	$ejecutar = $db->prepare($consulta); // $ejecutar -> $db->prepare($consulta);

	$ejecutar -> execute();

	echo '{"resultado":"Categoria eliminada"}';
	$db = null;

}catch(PDOException $ex){
echo '{"error":"'.$ex->getMessage().'"}';
}

return $res->withHeader('Content-Type','application/json');

});



//agregar
//editar
//eliminar
//obtener por id
?>