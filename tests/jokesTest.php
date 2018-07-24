<?php
use PHPUnit\Framework\TestCase;
class JokeTest extends TestCase
{
   public function testInsertofAJoke(){
	include('Joke.php');
        $jokeObject = new Joke();
        $tester = $jokeObject::insertJoke("Word Play","Joke Test");
        $this->assertEquals($tester,true);
    }
    
    public function testUpVote(){
	include('Joke.php');
        $jokeObject = new Joke();
        $tester = $jokeObject::upVoteJoke("Word Play","Joke Test");
        $this->assertTrue($tester);
    }

    public function testDownVote(){
	include('Joke.php');
        $jokeObject = new Joke();
        $tester = $jokeObject::downVoteJoke("Word Play","Joke Test");
        $this->assertTrue($tester);
    }

    public function testDelete(){
	include('Joke.php');
        $jokeObject = new Joke();
        $tester = $jokeObject::deleteJoke("Word Play","Joke Test");
        $this->assertTrue($tester);
    }
    public function testRetrieveJoke(){
	include('Joke.php');
        $jokeObject = new Joke();
        $tester = $jokeObject::retrieveJoke("Word Play","Joke Test");
        $this->assertEquals($tester,"Word Play","Joke Test");
    }
}
?>