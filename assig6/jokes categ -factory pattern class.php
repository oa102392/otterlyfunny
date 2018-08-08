<?php
interface IJokesCateg
{
  function getJokeCateg();
}
 
class User implements IJokeCateg
{
  public function __construct($id) { }
 
  public function getJokeCateg()
  {
    return "Joke Category";
  }
}
 
class JokeFactory
{
  public static function Create($id)
  {
    return new JokeCateg($id);
  }
}
 
$jo = JokeFactory::Create(1);
echo( $jo->getJokeCateg()."\n" );
?>
