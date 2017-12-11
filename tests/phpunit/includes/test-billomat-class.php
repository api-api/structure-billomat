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
		$billomat_token = 'd44e969fdbaaf48116816130f380cf33';

		$config = array(
			'transporter'            => 'curl',
			'billomat'                => array(
				'authentication_data' => array(
					'account'    => $billomat_account,
					'token' => $billomat_token,
				),
			),
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}