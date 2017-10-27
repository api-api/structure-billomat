<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';


class Billomat_Testcase extends Structure_TestCase {
	public function testThat() {
		$this->assertEquals( 1, true );
	}
}