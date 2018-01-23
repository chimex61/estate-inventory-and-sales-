<?php 
class Customer
{

/*Fileds**************************************************Fields// Codes */


         private $_address; //address Field

         private $_cust_id; //cust_id Field

         private $_email; //email Field

         private $_name; //name Field

         private $_password; //password Field

         private $_phone; //phone Field

         private $_sex; //sex Field

         private $_title; //title Field

         private $_username; //username Field

//End Of Fields**************************************End Of Fields.


/*/****Properties For Fields****Properties For Fields****Properties For Fields****Properties For Fields*/

/*///// ******** Start Of SetMethods************* Start Of SetMethods************* Start Of SetMethods***** */

         /* This Method Will Assign The address properties Of the Object Of This Class To The Value Supplied.*/
         public function setAddress($value)
         {
         	$this->_address = $value;
         }
         /* This Method Will Assign The cust_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setCust_id($value)
         {
         	$this->_cust_id = $value;
         }
         /* This Method Will Assign The email properties Of the Object Of This Class To The Value Supplied.*/
         public function setEmail($value)
         {
         	$this->_email = $value;
         }
         /* This Method Will Assign The name properties Of the Object Of This Class To The Value Supplied.*/
         public function setName($value)
         {
         	$this->_name = $value;
         }
         /* This Method Will Assign The password properties Of the Object Of This Class To The Value Supplied.*/
         public function setPassword($value)
         {
         	$this->_password = $value;
         }
         /* This Method Will Assign The phone properties Of the Object Of This Class To The Value Supplied.*/
         public function setPhone($value)
         {
         	$this->_phone = $value;
         }
         /* This Method Will Assign The sex properties Of the Object Of This Class To The Value Supplied.*/
         public function setSex($value)
         {
         	$this->_sex = $value;
         }
         /* This Method Will Assign The title properties Of the Object Of This Class To The Value Supplied.*/
         public function setTitle($value)
         {
         	$this->_title = $value;
         }
         /* This Method Will Assign The username properties Of the Object Of This Class To The Value Supplied.*/
         public function setUsername($value)
         {
         	$this->_username = $value;
         }
/*///// ******** End Of SetMethods************* End Of SetMethods************* End Of SetMethods***** */

/*///// ******** Start Of GetMethods************* Start Of GetMethods************* Start Of GetMethods***** */

         /* This Method Will Return The address properties Of the Object Of This Class.*/
         public function getAddress()
         {
         	 return $this->_address;
         }
         /* This Method Will Return The cust_id properties Of the Object Of This Class.*/
         public function getCust_id()
         {
         	 return $this->_cust_id;
         }
         /* This Method Will Return The email properties Of the Object Of This Class.*/
         public function getEmail()
         {
         	 return $this->_email;
         }
         /* This Method Will Return The name properties Of the Object Of This Class.*/
         public function getName()
         {
         	 return $this->_name;
         }
         /* This Method Will Return The password properties Of the Object Of This Class.*/
         public function getPassword()
         {
         	 return $this->_password;
         }
         /* This Method Will Return The phone properties Of the Object Of This Class.*/
         public function getPhone()
         {
         	 return $this->_phone;
         }
         /* This Method Will Return The sex properties Of the Object Of This Class.*/
         public function getSex()
         {
         	 return $this->_sex;
         }
         /* This Method Will Return The title properties Of the Object Of This Class.*/
         public function getTitle()
         {
         	 return $this->_title;
         }
         /* This Method Will Return The username properties Of the Object Of This Class.*/
         public function getUsername()
         {
         	 return $this->_username;
         }
/*///// ******** End Of GetMethods************* End Of GetMethods************* End Of GetMethods***** */

/* ****Constructor****  ****Constructor****  ****Constructor****  ****Constructor**** */

          /*This Serve As Constructor To Construct Object Of This Class From Database Table.*/
         public function Construct($_address, $_cust_id, $_email, $_name, $_password, $_phone, $_sex, $_title, $_username)
         {
         	 $this->_address = $_address; 
         	 $this->_cust_id = $_cust_id; 
         	 $this->_email = $_email; 
         	 $this->_name = $_name; 
         	 $this->_password = $_password; 
         	 $this->_phone = $_phone; 
         	 $this->_sex = $_sex; 
         	 $this->_title = $_title; 
         	 $this->_username = $_username; 
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
         	 $sql = "INSERT INTO  `customer` (`address`, `email`, `name`, `password`, `phone`, `sex`, `title`, `username`) VALUES (".$this->Prepare($this->getAddress()).", ".$this->Prepare($this->getEmail()).", ".$this->Prepare($this->getName()).", ".$this->Prepare($this->getPassword()).", ".$this->Prepare($this->getPhone()).", ".$this->Prepare($this->getSex()).", ".$this->Prepare($this->getTitle()).", ".$this->Prepare($this->getUsername()).")";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Inserting.*/
         	 return mysql_insert_id();  /*This Return The Id Generated For cust_id*/
         }


         /*This Method Update The Object Of This Class In the Corresponding Database*/
         public function Update()
         {
         	 $sql = "update `customer` set address = ".$this->Prepare($this->getAddress()).", email = ".$this->Prepare($this->getEmail()).", name = ".$this->Prepare($this->getName()).", password = ".$this->Prepare($this->getPassword()).", phone = ".$this->Prepare($this->getPhone()).", sex = ".$this->Prepare($this->getSex()).", title = ".$this->Prepare($this->getTitle()).", username = ".$this->Prepare($this->getUsername())." where cust_id = '".$this->getCust_id()."' ";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Updating.*/
         }


         /*This Method Delete The Object Of This Class In the Corresponding Database*/
         public function Delete()
         {
         	 $sql = "Delete From `customer` where  cust_id = ".$this->Prepare($this->getCust_id());
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Deleting....*/
         }


         /*This Method Sellect All Records In customer Table and Construct Array Of Objects Of This Class From It.*/
         public function SelectAll()
         {
         	 $sql = "Select * from `customer`";
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Customer();
         	 	 	$object->Construct($r['address'], $r['cust_id'], $r['email'], $r['name'], $r['password'], $r['phone'], $r['sex'], $r['title'], $r['username']);
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

         /*This Method Sellect Records In customer Table and Construct Array Of Objects Of This Class From It Based On The Sql Statements Supplied. Its Usually Useful For Select With Where Clause.*/
         public function SelectWithCondition($sql)
         {
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Customer();
         	 	 	$object->Construct($r['address'], $r['cust_id'], $r['email'], $r['name'], $r['password'], $r['phone'], $r['sex'], $r['title'], $r['username']);
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
         public function SelectSingle($cust_id)
         {
         	 $sql = "Select * from `customer` where cust_id = ".$this->Prepare($cust_id);
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$r = mysql_fetch_array($query);
         	 	 	$object = new Customer();
         	 	 	$object->Construct($r['address'], $r['cust_id'], $r['email'], $r['name'], $r['password'], $r['phone'], $r['sex'], $r['title'], $r['username']);
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
         	 	 	$object = new Customer();
         	 	 	$ADDRESS = ($r['address'] == "")? NULL: $r['address'];
         	 	 	$CUST_ID = ($r['cust_id'] == "")? NULL: $r['cust_id'];
         	 	 	$EMAIL = ($r['email'] == "")? NULL: $r['email'];
         	 	 	$NAME = ($r['name'] == "")? NULL: $r['name'];
         	 	 	$PASSWORD = ($r['password'] == "")? NULL: $r['password'];
         	 	 	$PHONE = ($r['phone'] == "")? NULL: $r['phone'];
         	 	 	$SEX = ($r['sex'] == "")? NULL: $r['sex'];
         	 	 	$TITLE = ($r['title'] == "")? NULL: $r['title'];
         	 	 	$USERNAME = ($r['username'] == "")? NULL: $r['username'];
         	 	 	$object->Construct($ADDRESS, $CUST_ID, $EMAIL, $NAME, $PASSWORD, $PHONE, $SEX, $TITLE, $USERNAME);
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
         	 $sql = "Select * from `customer`";
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
         	 	 	$object = new Customer();
         	 	 	$object->Construct($r['address'], $r['cust_id'], $r['email'], $r['name'], $r['password'], $r['phone'], $r['sex'], $r['title'], $r['username']);
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

         /*This Method Select A record Based On The Value Of The Field email Supplied, And Return A Single Object Of This Class.*/
         public function SelectByEmail($email)
         {
         	 $sql = "Select * from `customer` where email = ".$this->Prepare($email);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field name Supplied, And Return A Single Object Of This Class.*/
         public function SelectByName($name)
         {
         	 $sql = "Select * from `customer` where name = ".$this->Prepare($name);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field password Supplied, And Return A Single Object Of This Class.*/
         public function SelectByPassword($password)
         {
         	 $sql = "Select * from `customer` where password = ".$this->Prepare($password);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field phone Supplied, And Return A Single Object Of This Class.*/
         public function SelectByPhone($phone)
         {
         	 $sql = "Select * from `customer` where phone = ".$this->Prepare($phone);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field sex Supplied, And Return A Single Object Of This Class.*/
         public function SelectBySex($sex)
         {
         	 $sql = "Select * from `customer` where sex = ".$this->Prepare($sex);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field title Supplied, And Return A Single Object Of This Class.*/
         public function SelectByTitle($title)
         {
         	 $sql = "Select * from `customer` where title = ".$this->Prepare($title);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field username Supplied, And Return A Single Object Of This Class.*/
         public function SelectByUsername($username)
         {
         	 $sql = "Select * from `customer` where username = ".$this->Prepare($username);
         	 return $this->SelectWithCondition($sql);
         }
         

/* =============End Of Select By Each Columns Methods.==============*/

/* *****End Of Data Access******  *****End Of Data Access******  *****End Of Data Access****** */

/*+++++++++++++Start Of Compearer Methods ++++++++++++++*/
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True If The Object Are Equal By Attributes, and Value And They Are Instances Of This Class Otherwise False.*/
         public function simplesCompare($customerObject)
         {
         	 return ($this == $customerObject);
         }
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True if and only if they refer to the same instance of the This class.Otherwise False*/
         public function strictCompare($customerObject)
         {
         	 return ($this === $customerObject);
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
         public function cloneMe($customer_Object_To_Clone)
         {
         	 return clone $customer_Object_To_Clone; 
         }

}
?>
