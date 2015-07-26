<?php 

define('DIVISOR', 45);

require ('Slim/Slim/Slim.php');
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', 'getGrupos');

$app->get('/test', function () {
	echo json_encode("Application Test: Working");
});

$app->post('/grupos', 'addGrupo');


$app->run();


function addGrupo(){

    $request = \Slim\Slim::getInstance()->request();
    $grupo = json_decode($request->getBody());
    if(!empty($grupo)){
    	if(sizeof($grupo->grupos) == sizeof($grupo->cometas)){
			echo getGrupos($grupo->grupos, $grupo->cometas);
    	}    	
    	else {
    		echo '{"Application error: The size of both arrays must be equal"}';
    	}
    }
    else{
   		echo '{"Application error: The Body Can not be null"}';
    }
}

function getGrupos($grupos = null, $cometas = null){

	if(empty($grupos) && empty($cometas)){
		$cometas = array(
			'HALLEY',
			'ENCKE',
			'WOLF',
			'KUSHIDA'
		);

		$grupos = array(
			'AMARELO',
			'VERMELHO',
			'PRETO',
			'AZUL'
		);
	}

	$indices_nao_levados = gruposNaoLevado(calcularValores($grupos), calcularValores($cometas));

	$grupos_nao_levados = array();
	
	foreach($indices_nao_levados as $i){
		$grupos_nao_levados[] = $grupos[$i];
	}
	echo '{"grupos":'.json_encode($grupos_nao_levados).'}';	
}


function calcularValores($palavras){
	$alfabeto = range('A', 'Z');
	$produto_letras = array();

	foreach($palavras as $key => $palavra){
		$produto_letras[$key] = 1;
		for($i = 0; $i<strlen($palavra); $i++){
			$produto_letras[$key] *= array_search($palavra[$i], $alfabeto)+1;		
		}
	}
	return $produto_letras;
}


function gruposNaoLevado($grupos, $cometas){
	$grupos_nao_levado = array();
	for($i = 0; $i<sizeof($grupos); $i++){
		if(!verificarSeraLevado($grupos[$i], $cometas[$i])){
			$grupos_nao_levado[] = $i;
		}
	}
	return $grupos_nao_levado;
}

function verificarSeraLevado($grupo, $cometa){
	return ($grupo%DIVISOR == $cometa%DIVISOR ? true : false);
}


?>