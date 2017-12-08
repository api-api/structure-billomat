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
					'account'    => $_ENV['BILLOMAT_ACCOUNT'],
					'token' => $_ENV['BILLOMAT_TOKEN'],
					'billomatID'    => $_ENV['BILLOMAT_ACCOUNT'],
				),
				'billomatID'    => $_ENV['BILLOMAT_ACCOUNT']
			),
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}