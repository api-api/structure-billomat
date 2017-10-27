<?php

class Billomat_TestCase extends Structure_TestCase {
	/**
	 * @var $api
	 */
	private $api;

	public function init() {
		$config = array(
			'transporter'            => 'curl',
			'config_updater'         => true,
			'config_updater_storage' => 'cookie',
			'twitter'                => array(
				'mode'                => '',
				'authenticator'       => 'twitter-oauth1',
				'authentication_data' => array(
					'consumer_key'    => 'Hvx7agOw1KFKNZsFvWIgIZXoI',
					'consumer_secret' => 'itDGjT9raslfvXez41mB0YcdVu94fap2ZdgDHgSM3wBmyHoWhW',
				),
			),
		);

		$this->api = apiapi( 'my-api', $config );
	}
}