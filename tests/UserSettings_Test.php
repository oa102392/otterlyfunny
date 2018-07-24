<?php

use PHPUnit\Framework\TestCase;

class MyProceduralTest extends TestCase {
	
	/*
	 * Testing the Suffix of extention
	 */

	public function testExtentionSuffix(){
		include('UserSettings.php'); // must include if tests are for non OOP code
		$result = upload(frogpicture.png , 33000);
		$this->assertStringEndsWith('png', $result);
		$this->assertStringEndsWith('jpg', $result);
		$this->assertStringEndsWith('jpeg', $result);
		$this->assertStringEndsWith('pdf', $result);

	}

	public function testFileSize(){
		include('UserSettings.php'); // must include if tests are for non OOP code
		$result = upload(frogpicture.png, 33000);
		$this->assertLessThanOrEqual(500000, $result)
		$this->assertGreaterThan(500000, $result)

	}

	public function testFileError(){
		include('UserSettings.php'); // must include if tests are for non OOP code
		$result = upload(frogpicture.png, 0);
		$this->assertEquals(0, $result)


	}

	public function testMoveFile(){
		include('UserSettings.php'); // must include if tests are for non OOP code
		$result =upload(frogpicture.png, 33000);


		$this->$this->assertEquals(33000, $result)


	}
}


?>
