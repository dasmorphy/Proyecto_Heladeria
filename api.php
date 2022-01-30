<?php
/* (codigo) */  //comentar varias lineas de codigo
/*
$usuario = $_POST ["usuario"];
$cliente = $_POST["cliente"];
$ci = $_POST ["ci"];
$fecha = $_POST["fecha"];
$producto = $_POST["producto"];
$descripcion = $_POST["descripcion"];
$cantidad = $_POST["cantidad"];
$precio_unitario = $_POST["precio_unitario"];
$precio_total = $_POST ["precio_total"];
*/

//curl_setopt($ch, CURLOPT_POSTFIELDS, $usuario, $cliente, $fecha, $producto, $descripcion, $cantidad, $precio_unitario, $precio_total);




/**
 * Ejemplo de como consumir para enviar un arreglo a la api
 
    
 * 
 */

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://localhost:7073/api/factura");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //Enabled on producction
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Enabled on producction

*/
	// $payload = json_encode($_REQUEST);
	// // echo "<pre>";
	// // print_r($payload);
	// echo $payload;
	// exit();
	$result = array();
	if (isset($_REQUEST)) {

		$headers = array(
			'Content-Type:application/json',
			// 'Authorization: Basic ' . base64_encode("user:password"), // place your auth details here
			"Accept: application/json",
			"Cache-Control: no-cache",
			"Pragma: no-cache",
		);

		$process = curl_init("https://localhost:7073/api/factura"); //your API url
		curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($process, CURLOPT_HEADER, false);
		curl_setopt($process, CURLOPT_HEADER, 1);
		// curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
		curl_setopt($process, CURLOPT_TIMEOUT, 30);
		curl_setopt($process, CURLOPT_POST, true);
		curl_setopt($process, CURLOPT_POSTFIELDS, json_encode($_REQUEST));
		curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($process, CURLOPT_SSL_VERIFYHOST, false); //Enabled on producction
		curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false); //Enabled on producction
		$return = curl_exec($process);
		curl_close($process);
		curl_close($process);
		list($header, $body) = explode("\r\n\r\n", $return, 2);
		$dataResult = json_decode($body);
		if ($dataResult->status === 400) { //
			$result = array(
				'sucess' => false,
				'message' => 'Error generado',
				'data' => $dataResult,
			);
		} else {	
			$result = array(
				'sucess' => true,
				'message' => 'Exito',
				'data' => $dataResult,
				
			);
		}
	} else {
		$result = array(
			'sucess' => false,
			'message' => 'Datos requeridos',
			'data' => array()
		);
	}

	echo json_encode($result);
	exit();

//Es un post
//curl_setopt($ch, CURLOPT_POST, true);
//El arreglo a enviar a la api
	// $payload = array (
	 
	// 	'prod' => 'helado', 
	// 	'description' => 'fruta', 
	// 	'cant' => '1', 
	// 	'pUnit' => '2', 
	// 	'pTotal' => '2'
	// );
//json_encode() //para pasar como un objecto el post
//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

//$res = curl_exec($ch);
//curl_close($ch);

//echo $res;



?>