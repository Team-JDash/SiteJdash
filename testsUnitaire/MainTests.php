<?php

require_once('../scripts/class/Config/database.php');
require_once('../scripts/class/Connection_BDD.php');
require_once('../scripts/class/Functions.php');
require_once('../scripts/class/MySession.php');
require_once('../scripts/class/User.php');
require_once('../scripts/class/Plugin.php');

if(!defined('PHPUnit_MAIN_METHOD')){
	define('PHPUnit_MAIN_METHOD', 'MainTests::main');
}


/** 
*  Class principale pour les tests unitaire
*/
class MainTests
{
	
		
	function __construct()
	{
		self::main();
	}
	


	public static function main(){
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}


	public static function suite(){
		$suite = new PHPUnit_Framework_TestSuite('MainTests');
		$suite->addTests(TestUser::main());
	}
	
}

if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
   AllTests::main();
}

?>

