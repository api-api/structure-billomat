<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class GeneralTests extends Billomat_TestCase {
	public function testThat() {
		try {
			$request = $this->apiapi->get_request_object( 'billomat', '/clients' );
			$request->set_param( 'first_name', 'Felix' );
			$response = $this->apiapi->send_request( $request );

			$params = $response->get_params();
			print_r( $response );

		}catch ( Exception $e ) {
			echo 'Exception: ',  $e->getMessage(), "\n";
		}
	}
}