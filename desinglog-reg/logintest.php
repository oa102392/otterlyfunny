<?php
use PHPUnit\Framework\TestCase;
class JokeTest extends TestCase
{
    function getConnection()
    {
	include('user.php');
        $pdo = new PDO('mysql:host=localhost;dbname=testdbconn', 'root', '');
        return $this->createDefaultDBConnection($pdo, 'testdbconn');

    }

    function getDataSet()
    {
	include('user.php');
        return $this->createXMLDataSet(dirname(__FILE__).'/../dbTesting/providers.xml');
    }

    function testgetProviders_compareResult()
    {
	include('user.php');
        $db = $this->getConnection();
        $fixture = new AdProviders($db);
        $res = $fixture->getProviders();
    }

    function Login()
    {
	Session::start();
    	$response = $this->call('POST', '/login', [
        'email' => 'failtest@test.com',
        'password' => 'badPass',
        '_token' => csrf_token()
    ]);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('auth.login', $response->original->name());
    }
}