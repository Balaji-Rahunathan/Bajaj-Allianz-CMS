<?php
session_start();
require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The GetTarget sample demonstrates how to query a single target by target id.
class GetTarget{

	//Server Keys
	private $access_key 	= "7806c4d174ae795d5589b413507d1442422b24f9";
	private $secret_key 	= "8984cecffe549339bd24b2c40a1275857ebb3023";

	private $targetId;
	private $url 		= "https://vws.vuforia.com";
	private $requestPath = "/summary/";// . $targetId;
	private $request;

	function GetTarget($id){

		$this->targetId = $id;

		$this->requestPath = $this->requestPath . $this->targetId;

		$this->execGetTarget();
	}

	private function execGetTarget(){

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

			if (200 == $response->getstatus())
			{

				$json = $response->getbody();
				$de = json_decode($json);
				echo "</div> <tr class='tablerow'><th>".$de->target_name."</th><th>".$de->upload_date."</th><th>".$de->total_recos."</th> <th>".$de->current_month_recos."</th> <th>".$de->previous_month_recos."</th> <th>".$de->tracking_rating."</th> <th>Edit</th> </tr> <div class='hidetext'>";
				$_SESSION['get']	= $de;
				$_SESSION['targetId']= $this->targetId;


				header("Location:source/add policy.php");
			}
			else
		 	{
				//echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
				//$response->getReasonPhrase(). ' ' . $response->getBody();
				$json = $response->getbody();
				$de = json_decode($json);
				$_SESSION['get']	= $de;
				header("Location:source/add policy.php");
			}

		}
	 	catch (HTTP_Request2_Exception $e)
	 		{
				echo 'Error: ' . $e->getMessage();
				$json = $response->getMessage();
				$de = json_decode($json);
				$_SESSION['get']	= $de;
				header("Location:source/add policy.php");
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
