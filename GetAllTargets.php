<?php

require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The GetAllTargets sample demonstrates how to query a single target by target id.
class GetAllTargets{

	//Server Keys
	private $access_key 	= "7806c4d174ae795d5589b413507d1442422b24f9";
	private $secret_key 	= "8984cecffe549339bd24b2c40a1275857ebb3023";

	private $url 		= "https://vws.vuforia.com";
	private $requestPath = "/targets";//hhhh
	private $request;
	public  $result;
	public  $res;




	function GetAllTargets(){

		$this->requestPath = $this->requestPath;

		$this->execGetAllTargets();
	}

	private function execGetAllTargets(){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_GET );

		$this->request->setConfig(array(
				'ssl_verify_peer' => false
		));

		$this->request->setURL( $this->url . $this->requestPath );

		// Define the Date and Authentication headers
		$this->setHeaders();


		try {

			$response = $this->request->send();


			if (200 == $response->getStatus())
			{
			 	$res = $response->getBody();

			 	$result = json_decode($res);
			 	$size = count($result->results);


			     for( $i = 0; $i<5; $i++ )
			         {
					$instance = new GetTarget($result->results[$i]);
        			 }
			}

			else

			{
				echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
				$response->getReasonPhrase(). ' ' . $response->getBody();
			}

		} catch (HTTP_Request2_Exception $e) {
			echo 'Error: ' . $e->getMessage();
			
		}


	}

	private function setHeaders(){
		$sb = 	new SignatureBuilder();
		$date = new DateTime("now", new DateTimeZone("GMT"));

		// Define the Date field using the proper GMT format
		$this->request->setHeader('Date', $date->format("D, d M Y H:i:s") . " GMT" );
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $this->access_key . ":" . $sb->tmsSignature( $this->request , $this->secret_key ));

	}



	}




?>
