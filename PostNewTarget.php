<?php
session_start();
require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The PostNewTarget sample demonstrates how to update the attributes of a target using a JSON request body. This example updates the target's metadata.

class PostNewTarget{

	//Server Keys
	private $access_key 	= "7806c4d174ae795d5589b413507d1442422b24f9";
	private $secret_key 	= "8984cecffe549339bd24b2c40a1275857ebb3023";

	//private $targetId 		= "eda03583982f41cdbe9ca7f50734b9a1";
	private $url 			= "https://vws.vuforia.com";
	private $requestPath 	= "/targets";
	private $request;
	private $jsonRequestObject;

	public $targetName;// = 'aaaaaaaaa';
	public $imageLocation;//= 'http://augmo.net/php/rajan/audio/dsfdsdfs/Piston.JPG';



	function PostNewTarget($name,$location){



		$this->imageLocation = $location;

		$this->jsonRequestObject = json_encode( array( 'width'=>1 , 'name'=>$this->targetName=$name , 'image'=>$this->getImageAsBase64() , 'application_metadata'=>base64_encode("Vuforia test metadata") , 'active_flag'=>1 ) );

		$this->execPostNewTarget();

	}



	function getImageAsBase64(){

		$file = file_get_contents( $this->imageLocation );

		if( $file ){

			$file = base64_encode( $file );
		}

		return $file;

	}

	public function execPostNewTarget(){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_POST );
		$this->request->setBody( $this->jsonRequestObject );

		$this->request->setConfig(array(
				'ssl_verify_peer' => false
		));

		$this->request->setURL( $this->url . $this->requestPath );

		// Define the Date and Authentication headers
		$this->setHeaders();


		try {

			$response = $this->request->send();

			if (200 == $response->getStatus() || 201 == $response->getStatus() ) {
				echo $response->getBody();


			 	$res = $response->getBody();

			 	$result = json_decode($res);
				//$_SESSION['targetId']	= $result->target_id;

			 	$instance = new GetTarget($result->target_id);


			} else {
				echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
						$response->getReasonPhrase(). ' ' . $response->getBody();
						$json = $response->getbody();
						$de = json_decode($json);
						$_SESSION['get']	= $de;

						header("Location:source/add policy.php");
			}
		} catch (HTTP_Request2_Exception $e) {
			echo 'Error: ' . $e->getMessage();
			$json = $response->getMessage();
			$de = json_decode($json);
			$_SESSION['get']	= $de;
		}


	}

	private function setHeaders(){
		$sb = 	new SignatureBuilder();
		$date = new DateTime("now", new DateTimeZone("GMT"));

		// Define the Date field using the proper GMT format
		$this->request->setHeader('Date', $date->format("D, d M Y H:i:s") . " GMT" );

		$this->request->setHeader("Content-Type", "application/json" );
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $this->access_key . ":" . $sb->tmsSignature( $this->request , $this->secret_key ));

	}
}

?>
