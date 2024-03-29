<?
// ----------- start config methods ------------------------------------------------------------------------------------
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

//use JetBrains\PhpStorm\Internal\ReturnTypeContract;

error_reporting(E_ERROR);

session_start();
include('jdf.php');
date_default_timezone_set("Asia/Tehran");
// ----------- end config methods --------------------------------------------------------------------------------------

// ----------- start DB class ------------------------------------------------------------------------------------------
class DB
{
    // ----------- properties
    protected $_DB_HOST = 'localhost';
    protected $_DB_USER = 'root';
    protected $_DB_PASS = '';
    protected $_DB_NAME = 'hamitech';
    protected $connection;

    // ----------- constructor
    public function __construct()
    {
        $this->connection = mysqli_connect($this->_DB_HOST, $this->_DB_USER, $this->_DB_PASS, $this->_DB_NAME);
        if ($this->connection) {
            $this->connection->query("SET NAMES 'utf8'");
            $this->connection->query("SET CHARACTER SET 'utf8'");
            $this->connection->query("SET character_setconnectionection = 'utf8'");
        }
    }

    // ----------- for return connection
    public function connect()
    {
        return $this->connection;
    }

}

// ----------- end DB class --------------------------------------------------------------------------------------------

// ----------- start Action class --------------------------------------------------------------------------------------
class Action
{

    // ----------- properties
    public $connection;

    // ----------- constructor
    public function __construct()
    {
        $db = new DB();
        $this->connection = $db->connect();
    }

    // ----------- start main methods ----------------------------------------------------------------------------------

    // ----------- get current page url
    public function url()
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $url;
    }

    // ----------- for check result of query
    public function result($result)
    {
        if (!$result) {
            $errorno = mysqli_errno($this->connection);
            $error = mysqli_error($this->connection);
            echo "Error NO : $errorno";
            echo "<br>";
            echo "Error Message : $error";
            echo "<hr>";
            return false;
        }
        return true;
    }

    // ----------- count of table's field
    public function table_counter($table)
    {
        $shop_id= $this->guild()->shop_id;;
        $result = $this->connection->query("SELECT * FROM `$table` WHERE shop_id='$shop_id' ");
        if (!$this->result($result)) return false;
        return $result->num_rows;
    }

    // ----------- get all fields in table
    public function table_list($table)
    {
       
        $result = $this->connection->query("SELECT * FROM `$table` ORDER BY `id` DESC");
        if (!$this->result($result)) return false;
        return $result;
    }

    // ----------- get all fields in table other than one :)
    public function table_option($table, $id)
    {
        $result = $this->connection->query("SELECT * FROM `$table` WHERE NOT `id`='$id' ORDER BY `id` DESC");
        if (!$this->result($result)) return false;
        return $result;
    }

    // ----------- change status of field
    public function change_status($table, $id)
    {
        $status = $this->get_data($table, $id)->status;
        $status = !$status;

        $now = time();
        $result = $this->connection->query("UPDATE `$table` SET 
        `status`='$status',
        `updated_at`='$now'
        WHERE `id` ='$id'");
        if (!$this->result($result)) return false;
        return $id;
    }

    // ----------- get data from table
    public function get_data($table, $id)
    {
        $result = $this->connection->query("SELECT * FROM `$table` WHERE id='$id'");
        if (!$this->result($result)) return false;
        $row = $result->fetch_object();
        return $row;
    }

    // ----------- remove data from table
    public function remove_data($table, $id)
    {
        $result = $this->connection->query("DELETE FROM `$table` WHERE id='$id'");
        if (!$this->result($result)) return false;
        return true;
    }

    // ----------- clean strings (to prevent sql injection attacks)
    public function clean($string, $status = true)
    {
        if ($status)
            $string = htmlspecialchars($string);
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = mysqli_real_escape_string($this->connection, $string);
        return $string;
    }

    // ----------- for clean and get requests
    public function request($name, $status = true)
    {
        return $this->clean($_REQUEST[$name], $status);
    }

    // ----------- for get and convert date
    public function request_date($name)
    {
        $name = $this->request('birthday', false);
        $name = $this->shamsi_to_miladi($name);
        return strtotime($name);
    }

    // ----------- convert timestamp to shamsi date
    public function time_to_shamsi($timestamp)
    {
        return $this->miladi_to_shamsi(date('Y-m-d', $timestamp));
    }

    // ----------- convert shamsi date to miladi date
    public function shamsi_to_miladi($date)
    {
        $pieces = explode("/", $date);
        $day = $pieces[2];
        $month = $pieces[1];
        $year = $pieces[0];
        $b = jalali_to_gregorian($year, $month, $day, $mod = '-');
        $f = $b[0] . '-' . $b[1] . '-' . $b[2];
        return $f;
    }

    // ----------- convert miladi date to shamsi date
    public function miladi_to_shamsi($date)
    {
        $pieces = explode("-", $date);
        $year = $pieces[0];
        $month = $pieces[1];
        $day = $pieces[2];
        $b = gregorian_to_jalali($year, $month, $day, $mod = '-');
        $f = $b[0] . '/' . $b[1] . '/' . $b[2];
        return $f;
    }

    // ----------- for send sms to mobile number
    public function send_sms($mobile, $textMessage)
    {
        $webServiceURL = "";
        $webServiceSignature = "";
        $webServiceNumber = "";
        $textMessage = mb_convert_encoding($textMessage, "UTF-8");
        $parameters['signature'] = $webServiceSignature;
        $parameters['toMobile'] = $mobile;
        $parameters['smsBody'] = $textMessage;
        $parameters['retStr'] = ""; // return reference send status and mobile and report code for delivery
        try {
            $con = new SoapClient($webServiceURL);
            $responseSTD = (array)$con->Send($parameters);
            $responseSTD['retStr'] = (array)$responseSTD['retStr'];
        } catch (SoapFault $ex) {
            echo $ex->faultstring;
        }
    }

    // ----------- create random token
    public function get_token($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max - 1)];
        }
        return $token;
    }


    // ----------- end main methods ------------------------------------------------------------------------------------

    // ----------- start guild----------------------------------------------------------------------------------------
    // ----------- for login guild
    public function guild_login($user, $pass)
    {
        $result = $this->connection->query("SELECT * FROM `tbl_shop_admin` WHERE `username`='$user' AND `password`='$pass' AND status=1");
        if (!$this->result($result)) return false;
        $rowcount = mysqli_num_rows($result);
        $row = $result->fetch_object();
        if ($rowcount) {
            $this->guild_update_last_login();
            $_SESSION['guild_id'] = $row->id;
            $_SESSION['shop_id']= $row->shop_id;
            $this->log_action(1);
            return true;
        }
        return false;
    }

    // ----------- for check access (guild access)
    public function auth()
    {
        if (isset($_SESSION['guild_id']))
            return true;
        return false;
    }



    // ----------- update last login of guild (logged)
    public function guild_update_last_login()
    {
        $id = $_SESSION['guild_id'];
        $now = strtotime(date('Y-m-d H:i:s'));
        $result = $this->connection->query("UPDATE `tbl_shop_admin` SET `last_login`='$now' WHERE `id`='$id'");
        if (!$this->result($result)) return false;
        return true;
    }


    // ----------- for show all guilds
    public function guild_list()
    {
        $shop_id= $this->guild()->shop_id;;
        $result = $this->connection->query("SELECT * FROM `tbl_shop_admin` WHERE `shop_id`='$shop_id'  ORDER BY `id` DESC");
        if (!$this->result($result)) return false;
        return $result;
    }

    // ----------- get admin's data
    public function admin_get($id)
    {
        return $this->get_data("tbl_shop_admin", $id);
    }
    

    // ----------- get guild's data (logged)
    public function guild()
    {
        $id = $_SESSION['guild_id'];
        return $this->admin_get($id);
    }

    // ----------- count of guild
    public function guild_counter()
    {
        return $this->table_counter("tbl_shop_admin");
    }

    public function guild_edit($first_name, $last_name, $phone, $username, $password,$national_code,$postal_code,$birthday)
    {
        $now = time();
        $id= $_SESSION['guild_id'];
        $result = $this->connection->query("UPDATE `tbl_shop_admin` SET 
        `first_name`='$first_name',
        `last_name`='$last_name',
        `phone`='$phone',
        `username`='$username',
        `password`='$password',
        `national_code`='$national_code',
        `postal_code`='$postal_code',
        `birthday`='$birthday',
        `updated_at`='$now'
        WHERE `id` ='$id'");
        if (!$this->result($result)) return false;
        return $id;
    }
    // ----------- end guild ------------------------------------------------------------------------------------------

    // ----------- start SHOPS -----------------------------------------------------------------------------------------


public function shop_pics_add($shop_id,$pic)
{
    $now = time();
    $result = $this->connection->query("INSERT INTO `tbl_shop_pics`
    (`shop_id`,`image`,`created_at`) 
    VALUES
    ('$shop_id','$pic','$now')");
    if (!$this->result($result)) return false;
    return $this->connection->insert_id;
}

public function shop_pics_get($shop_id)
{
    return $this->connection->query("SELECT * FROM `tbl_shop_pics` WHERE `shop_id` = '$shop_id'");
}

public function shop_edit($id,$category_id,$title,$icon, $phone, $fax, $city_id, $address, $longitude, $latitude,$economic_code, $status)
{
    $now = time();
    $result = $this->connection->query("UPDATE `tbl_shop` SET 
    `category_id`= '$category_id',
    `title`='$title',
    `image`='$icon',
    `phone`='$phone',
    `fax`='$fax',
    `city_id`='$city_id',
    `address`='$address',
    `longitude`='$longitude',
    `latitude`='$latitude',
    `status`='$status',
    `economic_code`='$economic_code',
    `updated_at`='$now'
    WHERE `id` ='$id'");
    if (!$this->result($result)) return false;
    return $id;
}



public function shop_status($id)
{
    return $this->change_status('tbl_shop', $id);
}

public function shop_get($id)
{
    return $this->get_data("tbl_shop", $id);
}

// ----------- end SHOPS -------------------------------------------------------------------------------------------

     // ----------- start PRODUCT -----------------------------------------------------------------------------------------

     public function product_list()
     {
        $shop_id= $this->guild()->shop_id;
        $result = $this->connection->query("SELECT * FROM `tbl_product` WHERE shop_id=' $shop_id' ORDER BY `id` DESC");
        if (!$this->result($result)) return false;
        return $result;
     }

     public function product_option($id)
    {
        return $this->table_option("tbl_product", $id);
    }
    public function product_counter()
    {
        return $this->table_counter("tbl_product");
    }
     public function product_add($title,$description,$price,$discount,$score,$status)
     {
         $now = time();
         $guild_id=$this->guild()->id;
         $shop_id= $this->guild()->shop_id;
         $category_id=$this->get_data("tbl_shop",$shop_id)->category_id;
         $result = $this->connection->query("INSERT INTO `tbl_product`
         (`guild_id`,`category_id`,`shop_id`,`title`,`discription`,`price`,`discount`,`score`,`status`,`created_at`) 
         VALUES
         ('$guild_id','$category_id','$shop_id','$title','$description','$price','$discount','$score','$status','$now')");
         if (!$this->result($result)) return false;
         return $this->connection->insert_id;
     }
 
     public function product_edit($id,$title,$description,$price,$discount,$score,$status)
     {
         $now = time();
         $guild_id=$this->guild()->id;
         $shop_id= $this->guild()->shop_id;;
         $category_id=$this->get_data("tbl_shop",$shop_id)->category_id;
         $result = $this->connection->query("UPDATE `tbl_product` SET 
         `guild_id`='$guild_id',
         `category_id` = '$category_id',
         `shop_id`='$shop_id',
         `title`='$title',
         `discription`='$description',
         `price` = '$price',
         `discount`= '$discount',
         `score` = '$score',
         `status`='$status',
         `updated_at`='$now'
         WHERE `id` ='$id'");
         if (!$this->result($result)) return false;
         return $id;
     }
 
     public function product_remove($id)
     {
         return $this->remove_data("tbl_product", $id);
     }
 
     public function product_status($id)
     {
         return $this->change_status('tbl_product', $id);
     }
 
     public function product_get($id)
     {
         return $this->get_data("tbl_product", $id);
     }
 
     // ----------- end PRODUCT -------------------------------------------------------------------------------------------
    // ----------- start PRODCT_COMMENT -----------------------------------------------------------------------------------------

      public function product_comment_list($product_id)
      {
         return $this->connection->query("SELECT * FROM `tbl_product_comment` WHERE `product_id` = $product_id");
      }
  
      public function product_comment_status($id,$old_status)
      {
        $status = !$old_status;
        $result = $this->connection->query("UPDATE `tbl_product_comment` SET 
         `status`='$status'
         WHERE `id` ='$id'");
         if (!$this->result($result)) return false;
         return $id;
      }

      public function product_comment_remove($id)
      {
        return $this->remove_data("tbl_product_comment", $id);
      }
  
      public function product_comment_get($id)
      {
          return $this->get_data("tbl_product_comment", $id);
      }
  
      // ----------- end PRODUCT_COMMENT -------------------------------------------------------------------------------------------
      // ----------- start SHOP_COMMENT -----------------------------------------------------------------------------------------
      public function category_list()
      {
          return $this->table_list("tbl_category");
      }
  
      public function shop_comment_list()
      {
        $shop_id= $this->guild()->shop_id;;
        return $this->connection->query("SELECT * FROM `tbl_shop_comment` WHERE `shop_id` = '$shop_id' AND `parent` = 0");
      }

      public function shop_comment_confirmed_list()
      {
        $shop_id= $this->guild()->shop_id;;
        return $this->connection->query("SELECT * FROM `tbl_shop_comment` WHERE `shop_id` = '$shop_id' AND `parent` = 0 AND `confirm` = 1");
      }
  
      public function shop_comment_confirm($id)
      {
        $result = $this->connection->query("UPDATE `tbl_shop_comment` SET 
         `confirm`= 1
         WHERE `id` ='$id'");
         if (!$this->result($result)) return false;
         return $id;
      }

    public function shop_comment_add($user_id,$parent,$text){
        $now = time();
        $shop_id= $this->guild()->shop_id;;
        $result = $this->connection->query("INSERT INTO `tbl_shop_comment`
        (`shop_id`,`user_id`,`parent`,`text`,`score`,`created_at`,`confirm`) 
        VALUES
        ('$shop_id','$user_id', '$parent' ,'$text', 0 ,'$now', 0 )");
        if (!$this->result($result)) return false;
        return $this->connection->insert_id;
    }

    public function shop_comment_reply($id){
        return $this->connection->query("SELECT * FROM `tbl_shop_comment` WHERE `parent` = $id ORDER BY created_at DESC");
    }

      public function shop_comment_remove($id)
      {
        return $this->remove_data("tbl_shop_comment", $id);
      }
  
      public function shop_comment_get($id)
      {
          return $this->get_data("tbl_shop_comment", $id);
      }
  

      // ----------- end SHOP_COMMENT ----------------------------------------------------------------------------
    // ----------- stat user ----------------------------------------------------------------------------
    
      public function user_get($id)
      {
          return $this->get_data("tbl_user", $id);
      }
    // ----------- end user ----------------------------------------------------------------------------
    
// ----------- province_city ----------------------------------------------------------------------------
    
    public function city_get($id)
    {
        return $this->get_data("tbl_city", $id);
    }

    public function province_city_list($province_id)
    {
      return $this->connection->query("SELECT * FROM `tbl_city` WHERE `province_id` = '$province_id'");
    }
    public function province_list()
    {
        return $this->table_list("tbl_province");
    }
// -----------end province_city ----------------------------------------------------------------------------
 
// ----------- start log ----------------------------------------------------------------------------
    public function log_action($action_id){
            $this->guild_log($action_id);  
    }

    public function guild_log($action_id){
        $now = time();
        $guild_id=$_SESSION['guild_id'];
        $shop_id= $this->guild()->shop_id;;
        $ip=$_SERVER['REMOTE_ADDER'];
        $result= $this->connection->query("INSERT INTO tbl_guild_log (`guild_id`,`shop_id`,`action_id`,`ip`,`created_at`)VALUES('$guild_id','$shop_id','$action_id','$ip','$now')");  
        if (!$this->result($result)) return false;
        return $this->connection->insert_id;
    }
   
    public function guild_log_list(){
      $id= $this->guild()->id;;
      return $this->connection->query("SELECT * FROM `tbl_guild_log` WHERE `view`=0 AND `guild_id`='$id'");
    }
    public function action_log_get($id){
        return $this->get_data("tbl_action", $id);
    }
    public function change_view($id){
        
            $result= $this->connection->query("UPDATE tbl_guild_log SET `view`='1' WHERE `id`='$id'");  
            if (!$this->result($result)) return false;
            return true;
        
    }
    

// ----------- end log ----------------------------------------------------------------------------
 
// ----------- start finantial ----------------------------------------------------------------------------
public function cart_add($bank_id,$title,$cart_number,$account_number,$iban,$validation)
{
    $shop_id= $this->guild()->shop_id;;
    $now = time();
    $result=$this->connection->query("SELECT *FROM tbl_guild_cart WHERE `cart_number`='$cart_number' OR `account_number`='$account_number' OR `iban`='$iban'");
    if(mysqli_num_rows($result)){
        return false;
    }else{
        $result = $this->connection->query("INSERT INTO `tbl_guild_cart`
        (`shop_id`,`bank_id`,`title`,`cart_number`,`account_number`,`iban`,`validation`,`created_at`) 
        VALUES
        ('$shop_id','$bank_id','$title','$cart_number','$account_number','$iban','$validation','$now')");
        if (!$this->result($result)) return false;
        return $this->connection->insert_id;
    }
}
public function cart_edit($id,$bank_id,$title,$cart_number,$account_number,$iban,$validation)
{
    $now = time();
    // $result=$this->connection->query("SELECT *FROM tbl_guild_cart WHERE `cart_number`='$cart_number' AND `account_number`='$account_number' AND `iban`='$iban'");
    // if(mysqli_num_rows($result)){
    //     return false;
    // }else{
        $result = $this->connection->query("UPDATE `tbl_guild_cart` SET 
        `bank_id` = '$bank_id',
        `title`='$title',
        `cart_number`='$cart_number',
        `account_number`='$account_number',
        `iban`='$iban',
        `validation`='$validation',
        `updated_at`='$now'
        WHERE `id` ='$id'");
        if (!$this->result($result)) return false;
        return $id;
    // }
}

public function cart_remove($id){
    $result = $this->connection->query("DELETE FROM `tbl_guild_cart` WHERE id='$id'");
    if (!$this->result($result)) return false;
     return true;
}
public function cart_get($id){
        return $this->get_data("tbl_guild_cart", $id);
}

public function guild_get_request(){
   $shop_id= $this->guild()->shop_id;
    return $this->connection->query("SELECT * FROM `tbl_shop_withdraw` WHERE `shop_id` = '$shop_id'");
}
public function guild_request_remove($id){
    $result= $this->connection->query("DELETE  FROM `tbl_shop_withdraw` WHERE `id` = '$id' AND `status`=0");
     if (!$this->result($result)) return false;
     return true;
 }

public function guild_cart_list(){
    $shop_id= $this->guild()->shop_id;;
    return $this->connection->query("SELECT * FROM `tbl_guild_cart` WHERE `shop_id` = '$shop_id'");
}  

function bankCardCheck($card='', $irCard=true)
{
    $card = (string) preg_replace('/\D/','',$card);
    $strlen = strlen($card);
    if($irCard==true and $strlen!=16)
        return false;
    if($irCard!=true and ($strlen<13 or $strlen>19))
        return false;
    if(!in_array($card[0],[2,4,5,6,9]))
        return false;
    
    for($i=0; $i<$strlen; $i++)
    {
        $res[$i] = $card[$i];
        if(($strlen%2)==($i%2))
        {
            $res[$i] *= 2;
            if($res[$i]>9)
                $res[$i] -= 9;        
        }
    }
    return array_sum($res)%10==0?true:false;    
}
public function shaba($code){
    $shaba=substr($code,2)."1827".$code[0].$code[1];
    return bcmod($shaba, '97');
}

public function bank_list(){
    return $this->table_list("tbl_bank");
}

public function bank_get($id){
    return $this->get_data("tbl_bank", $id);
}

public function request_add($cart_id,$amount){
    $shop_id = $this->guild()->shop_id;
    $now  = time();
    $result = $this->connection->query("INSERT INTO `tbl_shop_withdraw`
    (`shop_id`,`cart_id`,`amount`,`created_at`) 
    VALUES
    ('$shop_id','$cart_id','$amount','$now')");
    if (!$this->result($result)) return false;
    return $this->connection->insert_id;
}

public function guild_wallet_log_list(){
    $shop_id = $this->guild()->shop_id;
    $result = $this->connection->query("SELECT * FROM `tbl_guild_wallet_log` WHERE shop_id=' $shop_id' ORDER BY `id` DESC");
    if (!$this->result($result)) return false;
    return $result;
}

// ----------- end finantial ----------------------------------------------------------------------------
// ----------- start TICKETS -----------------------------------------------------------------------------------------


public function ticket_add($subject,$text,$type)
{
    $now = time();
    $shop_id = $this->guild()->shop_id;
    $result = $this->connection->query("INSERT INTO `tbl_guild_ticket`
    (`shop_id`,`subject`,`text`,`type`,`created_at`) 
    VALUES
    ('$shop_id','$subject','$text','$type','$now')");
    if (!$this->result($result)) return false;
    return $this->connection->insert_id;
}

public function ticket_edit($id,$subject,$text,$type)
{
    $result = $this->connection->query("UPDATE  `tbl_guild_ticket` SET'subject`='$subject',`text'=$text',`type`='$type' WHERE `id`='$id'");
    if (!$this->result($result)) return false;
    return $id;
}
public function ticket_get($id)
{
    return $this->get_data("tbl_guild_ticket", $id);
}
public function ticket_list()
{
   $shop_id= $this->guild()->shop_id;
   $result = $this->connection->query("SELECT * FROM `tbl_guild_ticket` WHERE shop_id=' $shop_id' ORDER BY `id` DESC");
   if (!$this->result($result)) return false;
   return $result;
}

// ----------- end TICKET -------------------------------------------------------------------------------------------
// -----------  strat add guild -----------------------------------------------------------------------------------------
public function guild_request_get($id)
{
    return $this->get_data("tbl_shop_request", $id);
}


public function guild_request_add($category,$name,$owner,$address){
    $now = time();
    $status = 0;
    $shop_id= $this->guild()->shop_id;
    $result = $this->connection->query("INSERT INTO `tbl_shop_request`
    (`user_id`,`category_id``title`,`owner`,`address`,`access`,`created_at`,`status`) 
    VALUES
    ('$shop_id','$category','$name','$owner','$address',2,'$now','$status')");
    if (!$this->result($result)) return false;
    return $this->connection->insert_id;
}

public function guild_request_edit($id,$category,$name,$owner,$address,){
    $result = $this->connection->query("UPDATE `tbl_shop_request` SET
     `category_id`='$category',
     `title`='$name',
     `owner`='$owner',
     `address`='$address'
    WHERE `id`='$id'");
    if (!$this->result($result)) return false;
    return $id;
}
public function add_guild_list()
{
   $shop_id= $this->guild()->shop_id;
   $result = $this->connection->query("SELECT * FROM `tbl_shop_request` WHERE user_id='$shop_id'AND `access`=2 ORDER BY `id` DESC");
   if (!$this->result($result)) return false;
   return $result;
}

public function add_guild_remove($id){
    $result = $this->connection->query("DELETE FROM `tbl_shop_request` WHERE `id`='$id' AND `status`=0");
    if (!$this->result($result)) return false;
    return true;
}
// ----------- end add guild-----------------------------------------------------------------------------------------


// ----------- end Action class ----------------------------------------------------------------------------------------


}