<?php 

/***********************This Is An Intellectual Properties Of Francis John.************************/
/*******************The Use Of These Codes Must Be Prior To The Permission Issued By Francis Himself.*********************/
/*Respect Individual Opinion And Make The World Worth Living In.*/
/* Contact Francis On +2348039183518  Or chimex61@yahoo.com Or chimex61@gmail.com Thank You.*/

error_reporting(E_ALL ^ E_DEPRECATED);
class Configure
{
/* *****Please Set These Properties As Appropriate ****** */
         	 private static $dbUserName = "estate";
         	 private static $dbPassWord = "root";
         	 private static $dbHost = "localhost";
         	 private static $dbName = "estate";
/* ***** Properties ****** */

	          public function getDbUserName()
         {
         	 return Configure::$dbUserName;
         }

	          public function getDbPassWord()
         {
         	 return Configure::$dbPassWord;
         }

	          public function getDbHost()
         {
         	 return Configure::$dbHost;
         }

	          public function getDbName()
         {
         	 return Configure::$dbName;
         }

/* ***** End Of Properties ****** */

         	 public function connectToDb()
         	 {
         	 	 $conn = mysql_connect($this->getDbHost(),$this->getDbUserName(),$this->getDbPassword());
         	 	 if(!$conn) die(mysql_error());
         	 	 $dbSel = mysql_select_db($this->getDbName(),$conn);
         	 	 if(!$dbSel) die(mysql_error());
				 
         	 }
			 

}

?>