<?php 

class Admin
{

/*Fileds**************************************************Fields// Codes */


         private $_admin_id; //admin_id Field

         private $_admin_password; //admin_password Field

         private $_admin_username; //admin_username Field

//End Of Fields**************************************End Of Fields.


/*/****Properties For Fields****Properties For Fields****Properties For Fields****Properties For Fields*/

/*///// ******** Start Of SetMethods************* Start Of SetMethods************* Start Of SetMethods***** */

         /* This Method Will Assign The admin_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setAdmin_id($value)
         {
         	$this->_admin_id = $value;
         }
         /* This Method Will Assign The admin_password properties Of the Object Of This Class To The Value Supplied.*/
         public function setAdmin_password($value)
         {
         	$this->_admin_password = $value;
         }
         /* This Method Will Assign The admin_username properties Of the Object Of This Class To The Value Supplied.*/
         public function setAdmin_username($value)
         {
         	$this->_admin_username = $value;
         }
/*///// ******** End Of SetMethods************* End Of SetMethods************* End Of SetMethods***** */

/*///// ******** Start Of GetMethods************* Start Of GetMethods************* Start Of GetMethods***** */

         /* This Method Will Return The admin_id properties Of the Object Of This Class.*/
         public function getAdmin_id()
         {
         	 return $this->_admin_id;
         }
         /* This Method Will Return The admin_password properties Of the Object Of This Class.*/
         public function getAdmin_password()
         {
         	 return $this->_admin_password;
         }
         /* This Method Will Return The admin_username properties Of the Object Of This Class.*/
         public function getAdmin_username()
         {
         	 return $this->_admin_username;
         }
/*///// ******** End Of GetMethods************* End Of GetMethods************* End Of GetMethods***** */

/* ****Constructor****  ****Constructor****  ****Constructor****  ****Constructor**** */

          /*This Serve As Constructor To Construct Object Of This Class From Database Table.*/
         public function Construct($_admin_id, $_admin_password, $_admin_username)
         {
         	 $this->_admin_id = $_admin_id; 
         	 $this->_admin_password = $_admin_password; 
         	 $this->_admin_username = $_admin_username; 
         }
/* *** End Of Constructor ***  *** End Of Constructor ***  *** End Of Constructor *** */

/* *****Real Constructor *****  *****Real Constructor *****  *****Real Constructor ***** */
         /*An Empty Constructor To Instantiate Object Of This Class.*/
         public function __construct()
         {
          	
         }
/* **** End Of Constructor ******  **** End Of Constructor ******  **** End Of Constructor ****** */
/* ***** DbAccessor ********** DbAccessor ********** DbAccessor ********** DbAccessor ***** */
         /*This Method Run Queries On Database And Return The Result Set Of Query It Is Best Used For Select,Select Count, etc.*/ 
         public function runSelect($sql)
         {
         	 $this->getConf();
         	 $query = mysql_query($sql);
         	 if(!$query) die(mysql_error());
         	 return $query;
         }

         /*This Method Run Queries On Database And Does Not Return Anything, It Is Best used For Insert,Update,Delete etc.*/ 
         public function runScalar($sql)
         {
         	 $this->getConf();
         	 $query = mysql_query($sql);
         	 if(!$query) die(mysql_error());
         }
         /*This Method Establish Connection To Your Database.By Calling ConnectToDb on Configure Object.*/
         private function getConf()
         {
         	 if(!class_exists("Configure"))
         	 {
         		 include("Configure.php");
         	 }
         	 $conf = new Configure();
         	 $conf->connectToDb();
         }
/* ***** End Of DbAccessor ********** End Of DbAccessor ********** End Of DbAccessor ******/
/* ******* Prepare Function ******* ******* Prepare Function ******* ******* Prepare Function ******* */
         /*This Method Make Proper Correction To Any Parameter Supplied And Return The Modified Value With Single Quotes Appended.So If This Method Is Called In An SQl Statement, The Value Should Not Be Enclosed By Single Quotes As This Method Will Do That.*/
         public function Prepare($value)
         {
         $this->getConf();
         	 if (get_magic_quotes_gpc())
         	 {
         	 	$value = stripslashes($value);
         	 }
         // Quote if not a number or a numeric string
         	 if (!is_numeric($value))
         	 {
         	 	$value = "'" . mysql_real_escape_string($value) . "'";
         	 }
         	 return $value;
         }
/******** End Of Prepare Function ******* ****** End Of Prepare Function ******* */
/* ****** DataAccess ******  ****** DataAccess ******  ****** DataAccess ******  ****** DataAccess ****** */
         /*This Insert An Object Of This Class Into Its Corresponding DB Table.*/
         public function Insert()
         {
         	 $sql = "INSERT INTO  `admin` (`admin_password`, `admin_username`) VALUES (".$this->Prepare($this->getAdmin_password()).", ".$this->Prepare($this->getAdmin_username()).")";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Inserting.*/
         	 return mysql_insert_id();  /*This Return The Id Generated For admin_id*/
         }


         /*This Method Update The Object Of This Class In the Corresponding Database*/
         public function Update()
         {
         	 $sql = "update `admin` set admin_password = ".$this->Prepare($this->getAdmin_password()).", admin_username = ".$this->Prepare($this->getAdmin_username())." where admin_id = '".$this->getAdmin_id()."' ";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Updating.*/
         }


         /*This Method Delete The Object Of This Class In the Corresponding Database*/
         public function Delete()
         {
         	 $sql = "Delete From `admin` where  admin_id = ".$this->Prepare($this->getAdmin_id());
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Deleting....*/
         }


         /*This Method Sellect All Records In admin Table and Construct Array Of Objects Of This Class From It.*/
         public function SelectAll()
         {
         	 $sql = "Select * from `admin`";
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Admin();
         	 	 	$object->Construct($r['admin_id'], $r['admin_password'], $r['admin_username']);
         	 	 	$arrObj[$i] = $object;
         	 	 	$i += 1;
         	 	}
         	 }
         	 else
         	 {
         	 	$arrObj = NULL;
         	 }
         	 return $arrObj;
         }

         /*This Method Sellect Records In admin Table and Construct Array Of Objects Of This Class From It Based On The Sql Statements Supplied. Its Usually Useful For Select With Where Clause.*/
         public function SelectWithCondition($sql)
         {
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Admin();
         	 	 	$object->Construct($r['admin_id'], $r['admin_password'], $r['admin_username']);
         	 	 	$arrObj[$i] = $object;
         	 	 	$i += 1;
         	 	}
         	 }
         	 else
         	 {
         	 	$arrObj = NULL;
         	 }
         	 return $arrObj;
         }

         /*This Method Select A record Based On The Value Of The Primary Key Supplied, And Return A Single Object Of This Class.*/
         public function SelectSingle($admin_id)
         {
         	 $sql = "Select * from `admin` where admin_id = ".$this->Prepare($admin_id);
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$r = mysql_fetch_array($query);
         	 	 	$object = new Admin();
         	 	 	$object->Construct($r['admin_id'], $r['admin_password'], $r['admin_username']);
         	 }
         	 else
         	 {
         	 	$object = NULL;
         	 }
         	 return $object;
         }

         /*This Method Select Records From Db Even If Its Not All The Fields Of The DB Table That Is Selected, It Will Still Loads The Selected Field For The Object.And Construct An Array Of Objects Of This Class.*/
         public function SelectAnyHow($sql)
         {
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Admin();
         	 	 	$ADMIN_ID = ($r['admin_id'] == "")? NULL: $r['admin_id'];
         	 	 	$ADMIN_PASSWORD = ($r['admin_password'] == "")? NULL: $r['admin_password'];
         	 	 	$ADMIN_USERNAME = ($r['admin_username'] == "")? NULL: $r['admin_username'];
         	 	 	$object->Construct($ADMIN_ID, $ADMIN_PASSWORD, $ADMIN_USERNAME);
         	 	 	$arrObj[$i] = $object;
         	 	 	$i += 1;
         	 	}
         	 }
         	 else
         	 {
         	 	$arrObj = NULL;
         	 }
         	 return $arrObj;
         }

         /*Instead Of Writing Sql Urself, You Can Just Supply The Columns Name, The Value Of The Columns And The Connectors That You Want To Use In Querying The DB As An Arrays And The Method Will Generate The SQL Statement For You And Select The Records To Construct An Array Of Objects Of This Class.*/
         public function SelectByColumns($columns , $values, $connectorArray)
         {
         	 $sql = "Select * from `admin`";
         	 if(is_array($columns) and is_array($values))
         	 {
         	 	 $sql .= " where ";
         	 	 for($i = 0; $i < count($values); $i++)
         	 	 {
         	 	 	 $sql .= "`".$columns[$i]."`"." = ".$this->Prepare($values[$i]); 
         	 	 	 if(is_array($connectorArray) and $i < count($connectorArray) and $connectorArray[$i] != "" )
         	 	 	 {
         	 	 	 	 $sql .=" ". $connectorArray[$i]." ";
         	 	 	 }
         	 	 	 else
         	 	 	 {
         	 	 	 	 if($i < count($columns)-1 and !is_array($connectorArray))
         	 	 	 	 {
         	 	 	 	 	 $sql .= " ". $connectorArray." "; 
         	 	 	 	 }
         	 	 	 }
         	 	 }
         	 }
         	 else
         	 {
         	 	 $sql .= " where "."`".$columns."`"." = ".$this->Prepare($values); 
         	 }
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Admin();
         	 	 	$object->Construct($r['admin_id'], $r['admin_password'], $r['admin_username']);
         	 	 	$arrObj[$i] = $object;
         	 	 	$i += 1;
         	 	}
         	 }
         	 else
         	 {
         	 	$arrObj = NULL;
         	 }
         	 return $arrObj;
         }
/* =============Start Of Select By Each Columns Methods.==============*/

         /*This Method Select A record Based On The Value Of The Field admin_password Supplied, And Return A Single Object Of This Class.*/
         public function SelectByAdmin_password($admin_password)
         {
         	 $sql = "Select * from `admin` where admin_password = ".$this->Prepare($admin_password);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field admin_username Supplied, And Return A Single Object Of This Class.*/
         public function SelectByAdmin_username($admin_username)
         {
         	 $sql = "Select * from `admin` where admin_username = ".$this->Prepare($admin_username);
         	 return $this->SelectWithCondition($sql);
         }
         

/* =============End Of Select By Each Columns Methods.==============*/

/* *****End Of Data Access******  *****End Of Data Access******  *****End Of Data Access****** */

/*+++++++++++++Start Of Compearer Methods ++++++++++++++*/
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True If The Object Are Equal By Attributes, and Value And They Are Instances Of This Class Otherwise False.*/
         public function simplesCompare($adminObject)
         {
         	 return ($this == $adminObject);
         }
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True if and only if they refer to the same instance of the This class.Otherwise False*/
         public function strictCompare($adminObject)
         {
         	 return ($this === $adminObject);
         }
/*+++++++++++++End Of Compearer Methods ++++++++++++++*/
/****************Start Of Transition Method*****************/
         /*This Method Take You To The Page Suuplied. Note Make Sure The Call To This Method Is The Last Excutable Code.*/
         public static function TransitTo($address)
         {
         	 header("location:$address");
         }
/****************End Of Transition Method*****************/
/***** Start Of Clone Method********* Start Of Clone Method********* Start Of Clone Method******/
         public function cloneMe($admin_Object_To_Clone)
         {
         	 return clone $admin_Object_To_Clone; 
         }
/***** End Of Clone Method******** End Of Clone Method******** End Of Clone Method******/
/****User Defined Code Here******User Defined Code Here******User Defined Code Here****/
/** User Defined Field**** User Defined Field**** User Defined Field**** User Defined Field**/


/** End Of User Defined Field**** End Of User Defined Field**** End Of User Defined Field**/
/** User Defined Method**** User Defined Method**** User Defined Method**** User Defined Method**/


/** End Of User Defined Method**** End Of User Defined Method**** End Of User Defined Method**/
/*** End Of User Defined Code**** End Of User Defined Code**** End Of User Defined Code***/
////Code Generated By Francis John
}
?>
