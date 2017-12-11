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
		$billomat_token = '1f81f939f547b0aadcfc34a606cacfbc';

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