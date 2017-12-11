<?php

class Billomat_TestCase extends Structure_TestCase {
	/**
	 * @var \APIAPI\Core\APIAPI
	 */
	protected $apiapi;

	/**
	 * @var \APIAPI\Structure_Billomat\Structure_Billomat
	 */
	protected $api;

	protected function setUp() {

		$billomat_account = 'awesome';
		$billomat_token = '12345';

		$config = array(
			'transporter'            => 'curl',
			'billomat'                => array(
				'authentication_data' => array(
					'account'    => $billomat_account,
					'token' => $billomat_token,
				),
			),
		);

		$file = fopen ( 'https://presslinkers.com', 'r' );
		$contents  = '';
		while ( ! feof( $file ) ) {
			$contents .= fread( $file, 8192);
		}
		var_dump( $contents );
		fclose( $file );

		$this->apiapi = apiapi( 'test-api', $config );
	}
}