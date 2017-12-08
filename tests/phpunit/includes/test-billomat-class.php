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
		$config = array(
			'transporter'            => 'curl',
			'billomat'                => array(
				'authentication_data' => array(
					'account'    => $_ENV['billomat_account'],
					'token' => $_ENV['billomat_token']
				),
				'billomatID'    => $_ENV['billomat_account']
			),
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}