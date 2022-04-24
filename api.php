<?php
	
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
?>
