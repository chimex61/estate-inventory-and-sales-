<?php 
class Sales
{

/*Fileds**************************************************Fields// Codes */


         private $_cust_id; //cust_id Field

         private $_dateTime; //dateTime Field

         private $_goodsId; //goodsId Field

         private $_number; //number Field

         private $_sales_id; //sales_id Field

         private $_totalAmount; //totalAmount Field

//End Of Fields**************************************End Of Fields.


/*/****Properties For Fields****Properties For Fields****Properties For Fields****Properties For Fields*/

/*///// ******** Start Of SetMethods************* Start Of SetMethods************* Start Of SetMethods***** */

         /* This Method Will Assign The cust_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setCust_id($value)
         {
         	$this->_cust_id = $value;
         }
         /* This Method Will Assign The dateTime properties Of the Object Of This Class To The Value Supplied.*/
         public function setDateTime($value)
         {
         	$this->_dateTime = $value;
         }
         /* This Method Will Assign The goodsId properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoodsId($value)
         {
         	$this->_goodsId = $value;
         }
         /* This Method Will Assign The number properties Of the Object Of This Class To The Value Supplied.*/
         public function setNumber($value)
         {
         	$this->_number = $value;
         }
         /* This Method Will Assign The sales_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setSales_id($value)
         {
         	$this->_sales_id = $value;
         }
         /* This Method Will Assign The totalAmount properties Of the Object Of This Class To The Value Supplied.*/
         public function setTotalAmount($value)
         {
         	$this->_totalAmount = $value;
         }
/*///// ******** End Of SetMethods************* End Of SetMethods************* End Of SetMethods***** */

/*///// ******** Start Of GetMethods************* Start Of GetMethods************* Start Of GetMethods***** */

         /* This Method Will Return The cust_id properties Of the Object Of This Class.*/
         public function getCust_id()
         {
         	 return $this->_cust_id;
         }
         /* This Method Will Return The dateTime properties Of the Object Of This Class.*/
         public function getDateTime()
         {
         	 return $this->_dateTime;
         }
         /* This Method Will Return The goodsId properties Of the Object Of This Class.*/
         public function getGoodsId()
         {
         	 return $this->_goodsId;
         }
         /* This Method Will Return The number properties Of the Object Of This Class.*/
         public function getNumber()
         {
         	 return $this->_number;
         }
         /* This Method Will Return The sales_id properties Of the Object Of This Class.*/
         public function getSales_id()
         {
         	 return $this->_sales_id;
         }
         /* This Method Will Return The totalAmount properties Of the Object Of This Class.*/
         public function getTotalAmount()
         {
         	 return $this->_totalAmount;
         }
/*///// ******** End Of GetMethods************* End Of GetMethods************* End Of GetMethods***** */

/* ****Constructor****  ****Constructor****  ****Constructor****  ****Constructor**** */

          /*This Serve As Constructor To Construct Object Of This Class From Database Table.*/
         public function Construct($_cust_id, $_dateTime, $_goodsId, $_number, $_sales_id, $_totalAmount)
         {
         	 $this->_cust_id = $_cust_id; 
         	 $this->_dateTime = $_dateTime; 
         	 $this->_goodsId = $_goodsId; 
         	 $this->_number = $_number; 
         	 $this->_sales_id = $_sales_id; 
         	 $this->_totalAmount = $_totalAmount; 
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
         	 $sql = "INSERT INTO  `sales` (`cust_id`, `dateTime`, `goodsId`, `number`, `totalAmount`) VALUES (".$this->Prepare($this->getCust_id()).", ".$this->Prepare($this->getDateTime()).", ".$this->Prepare($this->getGoodsId()).", ".$this->Prepare($this->getNumber()).", ".$this->Prepare($this->getTotalAmount()).")";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Inserting.*/
         	 return mysql_insert_id();  /*This Return The Id Generated For sales_id*/
         }


         /*This Method Update The Object Of This Class In the Corresponding Database*/
         public function Update()
         {
         	 $sql = "update `sales` set cust_id = ".$this->Prepare($this->getCust_id()).", dateTime = ".$this->Prepare($this->getDateTime()).", goodsId = ".$this->Prepare($this->getGoodsId()).", number = ".$this->Prepare($this->getNumber()).", totalAmount = ".$this->Prepare($this->getTotalAmount())." where sales_id = '".$this->getSales_id()."' ";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Updating.*/
         }


         /*This Method Delete The Object Of This Class In the Corresponding Database*/
         public function Delete()
         {
         	 $sql = "Delete From `sales` where  sales_id = ".$this->Prepare($this->getSales_id());
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Deleting....*/
         }


         /*This Method Sellect All Records In sales Table and Construct Array Of Objects Of This Class From It.*/
         public function SelectAll()
         {
         	 $sql = "Select * from `sales`";
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Sales();
         	 	 	$object->Construct($r['cust_id'], $r['dateTime'], $r['goodsId'], $r['number'], $r['sales_id'], $r['totalAmount']);
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

         /*This Method Sellect Records In sales Table and Construct Array Of Objects Of This Class From It Based On The Sql Statements Supplied. Its Usually Useful For Select With Where Clause.*/
         public function SelectWithCondition($sql)
         {
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Sales();
         	 	 	$object->Construct($r['cust_id'], $r['dateTime'], $r['goodsId'], $r['number'], $r['sales_id'], $r['totalAmount']);
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
         public function SelectSingle($sales_id)
         {
         	 $sql = "Select * from `sales` where sales_id = ".$this->Prepare($sales_id);
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$r = mysql_fetch_array($query);
         	 	 	$object = new Sales();
         	 	 	$object->Construct($r['cust_id'], $r['dateTime'], $r['goodsId'], $r['number'], $r['sales_id'], $r['totalAmount']);
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
         	 	 	$object = new Sales();
         	 	 	$CUST_ID = ($r['cust_id'] == "")? NULL: $r['cust_id'];
         	 	 	$DATETIME = ($r['dateTime'] == "")? NULL: $r['dateTime'];
         	 	 	$GOODSID = ($r['goodsId'] == "")? NULL: $r['goodsId'];
         	 	 	$NUMBER = ($r['number'] == "")? NULL: $r['number'];
         	 	 	$SALES_ID = ($r['sales_id'] == "")? NULL: $r['sales_id'];
         	 	 	$TOTALAMOUNT = ($r['totalAmount'] == "")? NULL: $r['totalAmount'];
         	 	 	$object->Construct($CUST_ID, $DATETIME, $GOODSID, $NUMBER, $SALES_ID, $TOTALAMOUNT);
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
         	 $sql = "Select * from `sales`";
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
         	 	 	$object = new Sales();
         	 	 	$object->Construct($r['cust_id'], $r['dateTime'], $r['goodsId'], $r['number'], $r['sales_id'], $r['totalAmount']);
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

         /*This Method Select A record Based On The Value Of The Field cust_id Supplied, And Return A Single Object Of This Class.*/
         public function SelectByCust_id($cust_id)
         {
         	 $sql = "Select * from `sales` where cust_id = ".$this->Prepare($cust_id);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field dateTime Supplied, And Return A Single Object Of This Class.*/
         public function SelectByDateTime($dateTime)
         {
         	 $sql = "Select * from `sales` where dateTime = ".$this->Prepare($dateTime);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goodsId Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoodsId($goodsId)
         {
         	 $sql = "Select * from `sales` where goodsId = ".$this->Prepare($goodsId);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field number Supplied, And Return A Single Object Of This Class.*/
         public function SelectByNumber($number)
         {
         	 $sql = "Select * from `sales` where number = ".$this->Prepare($number);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field totalAmount Supplied, And Return A Single Object Of This Class.*/
         public function SelectByTotalAmount($totalAmount)
         {
         	 $sql = "Select * from `sales` where totalAmount = ".$this->Prepare($totalAmount);
         	 return $this->SelectWithCondition($sql);
         }
         

/* =============End Of Select By Each Columns Methods.==============*/

/* *****End Of Data Access******  *****End Of Data Access******  *****End Of Data Access****** */

/*+++++++++++++Start Of Compearer Methods ++++++++++++++*/
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True If The Object Are Equal By Attributes, and Value And They Are Instances Of This Class Otherwise False.*/
         public function simplesCompare($salesObject)
         {
         	 return ($this == $salesObject);
         }
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True if and only if they refer to the same instance of the This class.Otherwise False*/
         public function strictCompare($salesObject)
         {
         	 return ($this === $salesObject);
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
         public function cloneMe($sales_Object_To_Clone)
         {
         	 return clone $sales_Object_To_Clone; 
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
