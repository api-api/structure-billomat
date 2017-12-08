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
					'account'    => 'awesome',
					'token' => 'e1db94ee6d161d59f02e67c18133a078'
				),
				'billomatID'    => 'awesome'
			),
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}