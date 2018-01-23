<?php 
class Pointsvalue
{

/*Fileds**************************************************Fields// Codes */


         private $_discount; //discount Field

         private $_gift; //gift Field

         private $_pointStart; //pointStart Field

         private $_valueId; //valueId Field

//End Of Fields**************************************End Of Fields.


/*/****Properties For Fields****Properties For Fields****Properties For Fields****Properties For Fields*/

/*///// ******** Start Of SetMethods************* Start Of SetMethods************* Start Of SetMethods***** */

         /* This Method Will Assign The discount properties Of the Object Of This Class To The Value Supplied.*/
         public function setDiscount($value)
         {
         	$this->_discount = $value;
         }
         /* This Method Will Assign The gift properties Of the Object Of This Class To The Value Supplied.*/
         public function setGift($value)
         {
         	$this->_gift = $value;
         }
         /* This Method Will Assign The pointStart properties Of the Object Of This Class To The Value Supplied.*/
         public function setPointStart($value)
         {
         	$this->_pointStart = $value;
         }
         /* This Method Will Assign The valueId properties Of the Object Of This Class To The Value Supplied.*/
         public function setValueId($value)
         {
         	$this->_valueId = $value;
         }
/*///// ******** End Of SetMethods************* End Of SetMethods************* End Of SetMethods***** */

/*///// ******** Start Of GetMethods************* Start Of GetMethods************* Start Of GetMethods***** */

         /* This Method Will Return The discount properties Of the Object Of This Class.*/
         public function getDiscount()
         {
         	 return $this->_discount;
         }
         /* This Method Will Return The gift properties Of the Object Of This Class.*/
         public function getGift()
         {
         	 return $this->_gift;
         }
         /* This Method Will Return The pointStart properties Of the Object Of This Class.*/
         public function getPointStart()
         {
         	 return $this->_pointStart;
         }
         /* This Method Will Return The valueId properties Of the Object Of This Class.*/
         public function getValueId()
         {
         	 return $this->_valueId;
         }
/*///// ******** End Of GetMethods************* End Of GetMethods************* End Of GetMethods***** */

/* ****Constructor****  ****Constructor****  ****Constructor****  ****Constructor**** */

          /*This Serve As Constructor To Construct Object Of This Class From Database Table.*/
         public function Construct($_discount, $_gift, $_pointStart, $_valueId)
         {
         	 $this->_discount = $_discount; 
         	 $this->_gift = $_gift; 
         	 $this->_pointStart = $_pointStart; 
         	 $this->_valueId = $_valueId; 
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
         	 $sql = "INSERT INTO  `pointsvalue` (`discount`, `gift`, `pointStart` ) VALUES (".$this->Prepare($this->getDiscount()).", ".$this->Prepare($this->getGift()).", ".$this->Prepare($this->getPointStart())." )";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Inserting.*/
         	 return mysql_insert_id();  /*This Return The Id Generated For valueId*/
         }


         /*This Method Update The Object Of This Class In the Corresponding Database*/
         public function Update()
         {
         	 $sql = "update `pointsvalue` set discount = ".$this->Prepare($this->getDiscount()).", gift = ".$this->Prepare($this->getGift()).", pointStart = ".$this->Prepare($this->getPointStart())."  where valueId = '".$this->getValueId()."' ";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Updating.*/
         }


         /*This Method Delete The Object Of This Class In the Corresponding Database*/
         public function Delete()
         {
         	 $sql = "Delete From `pointsvalue` where  valueId = ".$this->Prepare($this->getValueId());
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Deleting....*/
         }


         /*This Method Sellect All Records In pointsvalue Table and Construct Array Of Objects Of This Class From It.*/
         public function SelectAll()
         {
         	 $sql = "Select * from `pointsvalue` order by pointStart asc";
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Pointsvalue();
         	 	 	$object->Construct($r['discount'], $r['gift'], $r['pointStart'], $r['valueId']);
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

         /*This Method Sellect Records In pointsvalue Table and Construct Array Of Objects Of This Class From It Based On The Sql Statements Supplied. Its Usually Useful For Select With Where Clause.*/
         public function SelectWithCondition($sql)
         {
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Pointsvalue();
         	 	 	$object->Construct($r['discount'], $r['gift'], $r['pointStart'], $r['valueId']);
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
         public function SelectSingle($valueId)
         {
         	 $sql = "Select * from `pointsvalue` where valueId = ".$this->Prepare($valueId);
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$r = mysql_fetch_array($query);
         	 	 	$object = new Pointsvalue();
         	 	 	$object->Construct($r['discount'], $r['gift'], $r['pointStart'], $r['valueId']);
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
         	 	 	$object = new Pointsvalue();
         	 	 	$DISCOUNT = ($r['discount'] == "")? NULL: $r['discount'];
         	 	 	$GIFT = ($r['gift'] == "")? NULL: $r['gift'];
         	 	 	$POINTSTART = ($r['pointStart'] == "")? NULL: $r['pointStart'];
         	 	 	$VALUEID = ($r['valueId'] == "")? NULL: $r['valueId'];
         	 	 	$object->Construct($DISCOUNT, $GIFT, $POINTSTART, $VALUEID);
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
         	 $sql = "Select * from `pointsvalue`";
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
         	 	 	$object = new Pointsvalue();
         	 	 	$object->Construct($r['discount'], $r['gift'], $r['pointStart'], $r['valueId']);
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

         /*This Method Select A record Based On The Value Of The Field discount Supplied, And Return A Single Object Of This Class.*/
         public function SelectByDiscount($discount)
         {
         	 $sql = "Select * from `pointsvalue` where discount = ".$this->Prepare($discount);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field gift Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGift($gift)
         {
         	 $sql = "Select * from `pointsvalue` where gift = ".$this->Prepare($gift);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field pointStart Supplied, And Return A Single Object Of This Class.*/
         public function SelectByPointStart($pointStart)
         {
         	 $sql = "Select * from `pointsvalue` where pointStart = ".$this->Prepare($pointStart);
         	 return $this->SelectWithCondition($sql);
         }
         

/* =============End Of Select By Each Columns Methods.==============*/

/* *****End Of Data Access******  *****End Of Data Access******  *****End Of Data Access****** */

/*+++++++++++++Start Of Compearer Methods ++++++++++++++*/
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True If The Object Are Equal By Attributes, and Value And They Are Instances Of This Class Otherwise False.*/
         public function simplesCompare($pointsvalueObject)
         {
         	 return ($this == $pointsvalueObject);
         }
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True if and only if they refer to the same instance of the This class.Otherwise False*/
         public function strictCompare($pointsvalueObject)
         {
         	 return ($this === $pointsvalueObject);
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
         public function cloneMe($pointsvalue_Object_To_Clone)
         {
         	 return clone $pointsvalue_Object_To_Clone; 
         }
/***** End Of Clone Method******** End Of Clone Method******** End Of Clone Method******/
/****User Defined Code Here******User Defined Code Here******User Defined Code Here****/
/** User Defined Field**** User Defined Field**** User Defined Field**** User Defined Field**/


/** End Of User Defined Field**** End Of User Defined Field**** End Of User Defined Field**/
/** User Defined Method**** User Defined Method**** User Defined Method**** User Defined Method**/


/** End Of User Defined Method**** End Of User Defined Method**** End Of User Defined Method**/
/*** End Of User Defined Code**** End Of User Defined Code**** End Of User Defined Code***/
}
?>
