<?php
require_once('PHPUnit/Autoload.php');
require_once('MainTests.php');

require_once('../scripts/class/User.php');
require_once('../scripts/class/Config/database.php');
require_once('../scripts/class/Connection_BDD.php');
require_once('../scripts/class/Functions.php');
require_once('../scripts/class/MySession.php');
require_once('../scripts/class/Plugin.php');
/**
* Test Unitaire pour la class User
*/
class TestUser extends PHPUnit_Framework_TestCase
{

	
	public $profil_user = array(
		"pseudo" => "toto",
		"email" => "email@test.com",
		"password" => "testpassword",		
		"firstName" => "michell",
		"lastName" => "boutoin",
		"id" => " ",
		"token" => "deea44e0fe3d025f87b185208c77cb51",
	);

		public function testSetteur()
    {
        $user = new User();
        $user->set_user_pseudo($this->profil_user['pseudo']);
        $user->set_user_email($this->profil_user['email']);
		$user->set_user_password($this->profil_user['password']);
		$user->set_user_firstName($this->profil_user['firstName']);
		$user->set_user_lastName($this->profil_user['lastName']);
		$user->set_user_token($this->profil_user['token']);
		
    }

    /**
     * @depends testSetteur
     */
	public function testGetteur()
	{
		$user = new User();
        $user->set_user_pseudo($this->profil_user['pseudo']);
        $user->set_user_email($this->profil_user['email']);
		$user->set_user_password($this->profil_user['password']);
		$user->set_user_firstName($this->profil_user['firstName']);
		$user->set_user_lastName($this->profil_user['lastName']);
		$user->set_user_token($this->profil_user['token']);

		$this->assertEquals( $this->profil_user['pseudo'] , $user->get_user_pseudo() );
		$this->assertEquals( $this->profil_user['email'] , $user->get_user_email() );
		$this->assertEquals( $this->profil_user['password'] , $user->get_user_password() );
		$this->assertEquals( $this->profil_user['firstName'] , $user->get_user_firstName() );
		$this->assertEquals( $this->profil_user['lastName'] , $user->get_user_lastName() );
		$this->assertEquals( $this->profil_user['id'] , $user->get_user_id() );
		$this->assertEquals( $this->profil_user['token'] , $user->get_user_token() );
	}

	/**
     * @depends testSetteur
     * @depends Table SQL
     */
	public function testNewUser ()
	{
		$user = new User();
		$this->assertEquals( $this->profil_user , $user->create_user());
	}

	/**
     * @depends testSetteur
     * @depends Table SQL
     */
	public function testUserExist()
	{
		$this->assertTrue(User::user_exist());
	}

}
