<?php 
class Goods
{

/*Fileds**************************************************Fields// Codes */


         private $_dateTimeEntered; //dateTimeEntered Field

         private $_goodsPicture; //goodsPicture Field

         private $_goods_cat_id; //goods_cat_id Field

         private $_goods_cost; //goods_cost Field

         private $_goods_description; //goods_description Field

         private $_goods_id; //goods_id Field

         private $_goods_name; //goods_name Field

         private $_goods_selling_price; //goods_selling_price Field

         private $_numberInStock; //numberInStock Field

//End Of Fields**************************************End Of Fields.


/*/****Properties For Fields****Properties For Fields****Properties For Fields****Properties For Fields*/

/*///// ******** Start Of SetMethods************* Start Of SetMethods************* Start Of SetMethods***** */

         /* This Method Will Assign The dateTimeEntered properties Of the Object Of This Class To The Value Supplied.*/
         public function setDateTimeEntered($value)
         {
         	$this->_dateTimeEntered = $value;
         }
         /* This Method Will Assign The goodsPicture properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoodsPicture($value)
         {
         	$this->_goodsPicture = $value;
         }
         /* This Method Will Assign The goods_cat_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_cat_id($value)
         {
         	$this->_goods_cat_id = $value;
         }
         /* This Method Will Assign The goods_cost properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_cost($value)
         {
         	$this->_goods_cost = $value;
         }
         /* This Method Will Assign The goods_description properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_description($value)
         {
         	$this->_goods_description = $value;
         }
         /* This Method Will Assign The goods_id properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_id($value)
         {
         	$this->_goods_id = $value;
         }
         /* This Method Will Assign The goods_name properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_name($value)
         {
         	$this->_goods_name = $value;
         }
         /* This Method Will Assign The goods_selling_price properties Of the Object Of This Class To The Value Supplied.*/
         public function setGoods_selling_price($value)
         {
         	$this->_goods_selling_price = $value;
         }
         /* This Method Will Assign The numberInStock properties Of the Object Of This Class To The Value Supplied.*/
         public function setNumberInStock($value)
         {
         	$this->_numberInStock = $value;
         }
/*///// ******** End Of SetMethods************* End Of SetMethods************* End Of SetMethods***** */

/*///// ******** Start Of GetMethods************* Start Of GetMethods************* Start Of GetMethods***** */

         /* This Method Will Return The dateTimeEntered properties Of the Object Of This Class.*/
         public function getDateTimeEntered()
         {
         	 return $this->_dateTimeEntered;
         }
         /* This Method Will Return The goodsPicture properties Of the Object Of This Class.*/
         public function getGoodsPicture()
         {
         	 return $this->_goodsPicture;
         }
         /* This Method Will Return The goods_cat_id properties Of the Object Of This Class.*/
         public function getGoods_cat_id()
         {
         	 return $this->_goods_cat_id;
         }
         /* This Method Will Return The goods_cost properties Of the Object Of This Class.*/
         public function getGoods_cost()
         {
         	 return $this->_goods_cost;
         }
         /* This Method Will Return The goods_description properties Of the Object Of This Class.*/
         public function getGoods_description()
         {
         	 return $this->_goods_description;
         }
         /* This Method Will Return The goods_id properties Of the Object Of This Class.*/
         public function getGoods_id()
         {
         	 return $this->_goods_id;
         }
         /* This Method Will Return The goods_name properties Of the Object Of This Class.*/
         public function getGoods_name()
         {
         	 return $this->_goods_name;
         }
         /* This Method Will Return The goods_selling_price properties Of the Object Of This Class.*/
         public function getGoods_selling_price()
         {
         	 return $this->_goods_selling_price;
         }
         /* This Method Will Return The numberInStock properties Of the Object Of This Class.*/
         public function getNumberInStock()
         {
         	 return $this->_numberInStock;
         }
/*///// ******** End Of GetMethods************* End Of GetMethods************* End Of GetMethods***** */

/* ****Constructor****  ****Constructor****  ****Constructor****  ****Constructor**** */

          /*This Serve As Constructor To Construct Object Of This Class From Database Table.*/
         public function Construct($_dateTimeEntered, $_goodsPicture, $_goods_cat_id, $_goods_cost, $_goods_description, $_goods_id, $_goods_name, $_goods_selling_price, $_numberInStock)
         {
         	 $this->_dateTimeEntered = $_dateTimeEntered; 
         	 $this->_goodsPicture = $_goodsPicture; 
         	 $this->_goods_cat_id = $_goods_cat_id; 
         	 $this->_goods_cost = $_goods_cost; 
         	 $this->_goods_description = $_goods_description; 
         	 $this->_goods_id = $_goods_id; 
         	 $this->_goods_name = $_goods_name; 
         	 $this->_goods_selling_price = $_goods_selling_price; 
         	 $this->_numberInStock = $_numberInStock; 
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
         	 $sql = "INSERT INTO  `goods` (`dateTimeEntered`, `goodsPicture`, `goods_cat_id`, `goods_cost`, `goods_description`, `goods_name`, `goods_selling_price`, `numberInStock`) VALUES (".$this->Prepare($this->getDateTimeEntered()).", ".$this->Prepare($this->getGoodsPicture()).", ".$this->Prepare($this->getGoods_cat_id()).", ".$this->Prepare($this->getGoods_cost()).", ".$this->Prepare($this->getGoods_description()).", ".$this->Prepare($this->getGoods_name()).", ".$this->Prepare($this->getGoods_selling_price()).", ".$this->Prepare($this->getNumberInStock()).")";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Inserting.*/
         	 return mysql_insert_id();  /*This Return The Id Generated For goods_id*/
         }


         /*This Method Update The Object Of This Class In the Corresponding Database*/
         public function Update()
         {
         	 $sql = "update `goods` set dateTimeEntered = ".$this->Prepare($this->getDateTimeEntered()).", goodsPicture = ".$this->Prepare($this->getGoodsPicture()).", goods_cat_id = ".$this->Prepare($this->getGoods_cat_id()).", goods_cost = ".$this->Prepare($this->getGoods_cost()).", goods_description = ".$this->Prepare($this->getGoods_description()).", goods_name = ".$this->Prepare($this->getGoods_name()).", goods_selling_price = ".$this->Prepare($this->getGoods_selling_price()).", numberInStock = ".$this->Prepare($this->getNumberInStock())." where goods_id = '".$this->getGoods_id()."' ";
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Updating.*/
         }


         /*This Method Delete The Object Of This Class In the Corresponding Database*/
         public function Delete()
         {
         	 $sql = "Delete From `goods` where  goods_id = ".$this->Prepare($this->getGoods_id());
         	 $this->runScalar($sql);/*We Use RunScalar And Not RunSelect Since We Are Deleting....*/
         }


         /*This Method Sellect All Records In goods Table and Construct Array Of Objects Of This Class From It.*/
         public function SelectAll()
         {
         	 $sql = "Select * from `goods`";
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Goods();
         	 	 	$object->Construct($r['dateTimeEntered'], $r['goodsPicture'], $r['goods_cat_id'], $r['goods_cost'], $r['goods_description'], $r['goods_id'], $r['goods_name'], $r['goods_selling_price'], $r['numberInStock']);
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

         /*This Method Sellect Records In goods Table and Construct Array Of Objects Of This Class From It Based On The Sql Statements Supplied. Its Usually Useful For Select With Where Clause.*/
         public function SelectWithCondition($sql)
         {
         	 $query = $this->runSelect($sql);/*We Use RunSelect And Not RunScalar Since We Are Selecting.*/
         	 if(mysql_num_rows($query))
         	 {
         	 	$arrObj = array();
         	 	$i = 0;
         	 	while($r = mysql_fetch_array($query))
         	 	{
         	 	 	$object = new Goods();
         	 	 	$object->Construct($r['dateTimeEntered'], $r['goodsPicture'], $r['goods_cat_id'], $r['goods_cost'], $r['goods_description'], $r['goods_id'], $r['goods_name'], $r['goods_selling_price'], $r['numberInStock']);
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
         public function SelectSingle($goods_id)
         {
         	 $sql = "Select * from `goods` where goods_id = ".$this->Prepare($goods_id);
         	 $query = $this->runSelect($sql);
         	 if(mysql_num_rows($query))
         	 {
         	 	$r = mysql_fetch_array($query);
         	 	 	$object = new Goods();
         	 	 	$object->Construct($r['dateTimeEntered'], $r['goodsPicture'], $r['goods_cat_id'], $r['goods_cost'], $r['goods_description'], $r['goods_id'], $r['goods_name'], $r['goods_selling_price'], $r['numberInStock']);
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
         	 	 	$object = new Goods();
         	 	 	$DATETIMEENTERED = ($r['dateTimeEntered'] == "")? NULL: $r['dateTimeEntered'];
         	 	 	$GOODSPICTURE = ($r['goodsPicture'] == "")? NULL: $r['goodsPicture'];
         	 	 	$GOODS_CAT_ID = ($r['goods_cat_id'] == "")? NULL: $r['goods_cat_id'];
         	 	 	$GOODS_COST = ($r['goods_cost'] == "")? NULL: $r['goods_cost'];
         	 	 	$GOODS_DESCRIPTION = ($r['goods_description'] == "")? NULL: $r['goods_description'];
         	 	 	$GOODS_ID = ($r['goods_id'] == "")? NULL: $r['goods_id'];
         	 	 	$GOODS_NAME = ($r['goods_name'] == "")? NULL: $r['goods_name'];
         	 	 	$GOODS_SELLING_PRICE = ($r['goods_selling_price'] == "")? NULL: $r['goods_selling_price'];
         	 	 	$NUMBERINSTOCK = ($r['numberInStock'] == "")? NULL: $r['numberInStock'];
         	 	 	$object->Construct($DATETIMEENTERED, $GOODSPICTURE, $GOODS_CAT_ID, $GOODS_COST, $GOODS_DESCRIPTION, $GOODS_ID, $GOODS_NAME, $GOODS_SELLING_PRICE, $NUMBERINSTOCK);
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
         	 $sql = "Select * from `goods`";
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
         	 	 	$object = new Goods();
         	 	 	$object->Construct($r['dateTimeEntered'], $r['goodsPicture'], $r['goods_cat_id'], $r['goods_cost'], $r['goods_description'], $r['goods_id'], $r['goods_name'], $r['goods_selling_price'], $r['numberInStock']);
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

         /*This Method Select A record Based On The Value Of The Field dateTimeEntered Supplied, And Return A Single Object Of This Class.*/
         public function SelectByDateTimeEntered($dateTimeEntered)
         {
         	 $sql = "Select * from `goods` where dateTimeEntered = ".$this->Prepare($dateTimeEntered);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goodsPicture Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoodsPicture($goodsPicture)
         {
         	 $sql = "Select * from `goods` where goodsPicture = ".$this->Prepare($goodsPicture);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goods_cat_id Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoods_cat_id($goods_cat_id)
         {
         	 $sql = "Select * from `goods` where goods_cat_id = ".$this->Prepare($goods_cat_id);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goods_cost Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoods_cost($goods_cost)
         {
         	 $sql = "Select * from `goods` where goods_cost = ".$this->Prepare($goods_cost);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goods_name Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoods_name($goods_name)
         {
         	 $sql = "Select * from `goods` where goods_name = ".$this->Prepare($goods_name);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field goods_selling_price Supplied, And Return A Single Object Of This Class.*/
         public function SelectByGoods_selling_price($goods_selling_price)
         {
         	 $sql = "Select * from `goods` where goods_selling_price = ".$this->Prepare($goods_selling_price);
         	 return $this->SelectWithCondition($sql);
         }
         

         /*This Method Select A record Based On The Value Of The Field numberInStock Supplied, And Return A Single Object Of This Class.*/
         public function SelectByNumberInStock($numberInStock)
         {
         	 $sql = "Select * from `goods` where numberInStock = ".$this->Prepare($numberInStock);
         	 return $this->SelectWithCondition($sql);
         }
         

/* =============End Of Select By Each Columns Methods.==============*/

/* *****End Of Data Access******  *****End Of Data Access******  *****End Of Data Access****** */

/*+++++++++++++Start Of Compearer Methods ++++++++++++++*/
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True If The Object Are Equal By Attributes, and Value And They Are Instances Of This Class Otherwise False.*/
         public function simplesCompare($goodsObject)
         {
         	 return ($this == $goodsObject);
         }
         /*This Method Compare The Suplied Object With The Current Object Calling This Method. It Returns True if and only if they refer to the same instance of the This class.Otherwise False*/
         public function strictCompare($goodsObject)
         {
         	 return ($this === $goodsObject);
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
         public function cloneMe($goods_Object_To_Clone)
         {
         	 return clone $goods_Object_To_Clone; 
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
