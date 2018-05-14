<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case '안녕':
			$speech = "안녕 나는 테스트 챗봇이야";
			break;

		case '방가워':
			$speech = "나도 방가워";
			break;

		case '바보':
			$speech = "너도 바보야";
			break;
		
		default:
			$speech = "미안 못 알아들었어.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
