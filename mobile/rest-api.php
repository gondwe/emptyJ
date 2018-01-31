<?php


/**
 * @author Axe Programs <care@axeprograms.com>
 * @copyright Axe Programs 2018
 * @package ej
 * 
 * 
 * Created using Ionic App Builder
 * http://codecanyon.net/item/ionic-mobile-app-builder/15716727
 */


/** CONFIG:START **/
$config["host"] 		= "localhost" ; 		//host
$config["user"] 		= "emptyjou_mmboss" ; 		//Username SQL
$config["pass"] 		= "MAtowil2Boss2" ; 		//Password SQL
$config["dbase"] 		= "emptyjou_trucks" ; 		//Database
$config["utf8"] 		= true ; 		//turkish charset set false
$config["abs_url_images"] 		= "http://emptyjourneys.com/mobile//media/image/" ; 		//Absolute Images URL
$config["abs_url_videos"] 		= "http://emptyjourneys.com/mobile//media/media/" ; 		//Absolute Videos URL
$config["abs_url_audios"] 		= "http://emptyjourneys.com/mobile//media/media/" ; 		//Absolute Audio URL
$config["abs_url_files"] 		= "http://emptyjourneys.com/mobile//media/file/" ; 		//Absolute Files URL
$config["image_allowed"][] 		= array("mimetype"=>"image/jpeg","ext"=>"jpg") ; 		//whitelist image
$config["image_allowed"][] 		= array("mimetype"=>"image/jpg","ext"=>"jpg") ; 		
$config["image_allowed"][] 		= array("mimetype"=>"image/png","ext"=>"png") ; 		
$config["file_allowed"][] 		= array("mimetype"=>"text/plain","ext"=>"txt") ; 		
$config["file_allowed"][] 		= array("mimetype"=>"","ext"=>"tmp") ; 		
/** CONFIG:END **/

if(isset($_SERVER["HTTP_X_AUTHORIZATION"])){
	list($_SERVER["PHP_AUTH_USER"],$_SERVER["PHP_AUTH_PW"]) = explode(":" , base64_decode(substr($_SERVER["HTTP_X_AUTHORIZATION"],6)));
}
$rest_api=array("data"=>array("status"=>404,"title"=>"Not found"),"title"=>"Error","message"=>"Routes not found");

/** connect to mysql **/
$mysql = new mysqli($config["host"], $config["user"], $config["pass"], $config["dbase"]);
if (mysqli_connect_errno()){
	die(mysqli_connect_error());
}


if(!isset($_GET["json"])){
	$_GET["json"]= "route";
}
if((!isset($_GET["form"])) && ($_GET["json"] == "submit")) {
	$_GET["json"]= "route";
}

if($config["utf8"]==true){
	$mysql->set_charset("utf8");
}

$get_dir = explode("/", $_SERVER["PHP_SELF"]);
unset($get_dir[count($get_dir)-1]);
$main_url = "http://" . $_SERVER["HTTP_HOST"] . implode("/",$get_dir)."/";


switch($_GET["json"]){	
	// TODO: -+- Listing : complains
	case "complains":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["feedback_id"])){
			if($_GET["feedback_id"]!="-1"){
				$_where[] = "`feedback_id` LIKE '%".$mysql->escape_string($_GET["feedback_id"])."%'";
			}
		}
		if(isset($_GET["feedback_email"])){
			if($_GET["feedback_email"]!="-1"){
				$_where[] = "`feedback_email` LIKE '%".$mysql->escape_string($_GET["feedback_email"])."%'";
			}
		}
		if(isset($_GET["feedback_name"])){
			if($_GET["feedback_name"]!="-1"){
				$_where[] = "`feedback_name` LIKE '%".$mysql->escape_string($_GET["feedback_name"])."%'";
			}
		}
		if(isset($_GET["feedback_message"])){
			if($_GET["feedback_message"]!="-1"){
				$_where[] = "`feedback_message` LIKE '%".$mysql->escape_string($_GET["feedback_message"])."%'";
			}
		}
		if(is_array($_where)){
			$where = " WHERE " . implode(" AND ",$_where);
		}
		// TODO: -+----+- orderby
		$order_by = "`feedback_id`";
		$sort_by = "DESC";
		if(!isset($_GET["order"])){
			$_GET["order"] = "`feedback_id`";
		}
		// TODO: -+----+- sort asc/desc
		if(!isset($_GET["sort"])){
			$_GET["sort"] = "desc";
		}
		if($_GET["sort"]=="asc"){
			$sort_by = "ASC";
		}else{
			$sort_by = "DESC";
		}
		if($_GET["order"]=="feedback_id"){
			$order_by = "`feedback_id`";
		}
		if($_GET["order"]=="feedback_email"){
			$order_by = "`feedback_email`";
		}
		if($_GET["order"]=="feedback_name"){
			$order_by = "`feedback_name`";
		}
		if($_GET["order"]=="feedback_message"){
			$order_by = "`feedback_message`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `complains` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['feedback_id'])){$rest_api[$z]['feedback_id'] = $data['feedback_id'];}; # id
				if(isset($data['feedback_email'])){$rest_api[$z]['feedback_email'] = $data['feedback_email'];}; # text
				if(isset($data['feedback_name'])){$rest_api[$z]['feedback_name'] = $data['feedback_name'];}; # text
				if(isset($data['feedback_message'])){$rest_api[$z]['feedback_message'] = $data['feedback_message'];}; # text
				$z++;
			}
			$result->close();
			if(isset($_GET["feedback_id"])){
				if(isset($rest_api[0])){
					$rest_api = $rest_api[0];
				}
			}
		}

		break;
	
	// TODO: -+- Listing : talk_to_us
	case "talk_to_us":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["feedback_id"])){
			if($_GET["feedback_id"]!="-1"){
				$_where[] = "`feedback_id` LIKE '%".$mysql->escape_string($_GET["feedback_id"])."%'";
			}
		}
		if(isset($_GET["feedback_email"])){
			if($_GET["feedback_email"]!="-1"){
				$_where[] = "`feedback_email` LIKE '%".$mysql->escape_string($_GET["feedback_email"])."%'";
			}
		}
		if(isset($_GET["feedback_name"])){
			if($_GET["feedback_name"]!="-1"){
				$_where[] = "`feedback_name` LIKE '%".$mysql->escape_string($_GET["feedback_name"])."%'";
			}
		}
		if(isset($_GET["feedback_message"])){
			if($_GET["feedback_message"]!="-1"){
				$_where[] = "`feedback_message` LIKE '%".$mysql->escape_string($_GET["feedback_message"])."%'";
			}
		}
		if(is_array($_where)){
			$where = " WHERE " . implode(" AND ",$_where);
		}
		// TODO: -+----+- orderby
		$order_by = "`feedback_id`";
		$sort_by = "DESC";
		if(!isset($_GET["order"])){
			$_GET["order"] = "`feedback_id`";
		}
		// TODO: -+----+- sort asc/desc
		if(!isset($_GET["sort"])){
			$_GET["sort"] = "desc";
		}
		if($_GET["sort"]=="asc"){
			$sort_by = "ASC";
		}else{
			$sort_by = "DESC";
		}
		if($_GET["order"]=="feedback_id"){
			$order_by = "`feedback_id`";
		}
		if($_GET["order"]=="feedback_email"){
			$order_by = "`feedback_email`";
		}
		if($_GET["order"]=="feedback_name"){
			$order_by = "`feedback_name`";
		}
		if($_GET["order"]=="feedback_message"){
			$order_by = "`feedback_message`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `talk_to_us` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['feedback_id'])){$rest_api[$z]['feedback_id'] = $data['feedback_id'];}; # id
				if(isset($data['feedback_email'])){$rest_api[$z]['feedback_email'] = $data['feedback_email'];}; # text
				if(isset($data['feedback_name'])){$rest_api[$z]['feedback_name'] = $data['feedback_name'];}; # text
				if(isset($data['feedback_message'])){$rest_api[$z]['feedback_message'] = $data['feedback_message'];}; # text
				$z++;
			}
			$result->close();
			if(isset($_GET["feedback_id"])){
				if(isset($rest_api[0])){
					$rest_api = $rest_api[0];
				}
			}
		}

		break;
	
	// TODO: -+- Listing : truck_inbox
	case "truck_inbox":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["id"])){
			if($_GET["id"]!="-1"){
				$_where[] = "`id` LIKE '%".$mysql->escape_string($_GET["id"])."%'";
			}
		}
		if(isset($_GET["msgfrom"])){
			if($_GET["msgfrom"]!="-1"){
				$_where[] = "`msgfrom` LIKE '%".$mysql->escape_string($_GET["msgfrom"])."%'";
			}
		}
		if(isset($_GET["subject"])){
			if($_GET["subject"]!="-1"){
				$_where[] = "`subject` LIKE '%".$mysql->escape_string($_GET["subject"])."%'";
			}
		}
		if(isset($_GET["message"])){
			if($_GET["message"]!="-1"){
				$_where[] = "`message` LIKE '%".$mysql->escape_string($_GET["message"])."%'";
			}
		}
		if(isset($_GET["dep_time"])){
			if($_GET["dep_time"]!="-1"){
				$_where[] = "`dep_time` LIKE '%".$mysql->escape_string($_GET["dep_time"])."%'";
			}
		}
		if(isset($_GET["date"])){
			if($_GET["date"]!="-1"){
				$_where[] = "`date` LIKE '%".$mysql->escape_string($_GET["date"])."%'";
			}
		}
		if(is_array($_where)){
			$where = " WHERE " . implode(" AND ",$_where);
		}
		// TODO: -+----+- orderby
		$order_by = "`id`";
		$sort_by = "DESC";
		if(!isset($_GET["order"])){
			$_GET["order"] = "`id`";
		}
		// TODO: -+----+- sort asc/desc
		if(!isset($_GET["sort"])){
			$_GET["sort"] = "desc";
		}
		if($_GET["sort"]=="asc"){
			$sort_by = "ASC";
		}else{
			$sort_by = "DESC";
		}
		if($_GET["order"]=="id"){
			$order_by = "`id`";
		}
		if($_GET["order"]=="msgfrom"){
			$order_by = "`msgfrom`";
		}
		if($_GET["order"]=="subject"){
			$order_by = "`subject`";
		}
		if($_GET["order"]=="message"){
			$order_by = "`message`";
		}
		if($_GET["order"]=="dep_time"){
			$order_by = "`dep_time`";
		}
		if($_GET["order"]=="date"){
			$order_by = "`date`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `truck_inbox` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['id'])){$rest_api[$z]['id'] = $data['id'];}; # id
				if(isset($data['msgfrom'])){$rest_api[$z]['msgfrom'] = $data['msgfrom'];}; # heading-1
				if(isset($data['subject'])){$rest_api[$z]['subject'] = $data['subject'];}; # heading-2
				if(isset($data['message'])){$rest_api[$z]['message'] = $data['message'];}; # text
				if(isset($data['dep_time'])){$rest_api[$z]['dep_time'] = $data['dep_time'];}; # text
				if(isset($data['date'])){$rest_api[$z]['date'] = $data['date'];}; # text
				$z++;
			}
			$result->close();
			if(isset($_GET["id"])){
				if(isset($rest_api[0])){
					$rest_api = $rest_api[0];
				}
			}
		}

		break;
	
	// TODO: -+- Listing : truck_request
	case "truck_request":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["id"])){
			if($_GET["id"]!="-1"){
				$_where[] = "`id` LIKE '%".$mysql->escape_string($_GET["id"])."%'";
			}
		}
		if(isset($_GET["customer_id"])){
			if($_GET["customer_id"]!="-1"){
				$_where[] = "`customer_id` LIKE '%".$mysql->escape_string($_GET["customer_id"])."%'";
			}
		}
		if(isset($_GET["truck_type"])){
			if($_GET["truck_type"]!="-1"){
				$_where[] = "`truck_type` LIKE '%".$mysql->escape_string($_GET["truck_type"])."%'";
			}
		}
		if(isset($_GET["transit_date"])){
			if($_GET["transit_date"]!="-1"){
				$_where[] = "`transit_date` LIKE '%".$mysql->escape_string($_GET["transit_date"])."%'";
			}
		}
		if(isset($_GET["load_capacity"])){
			if($_GET["load_capacity"]!="-1"){
				$_where[] = "`load_capacity` LIKE '%".$mysql->escape_string($_GET["load_capacity"])."%'";
			}
		}
		if(isset($_GET["purpose"])){
			if($_GET["purpose"]!="-1"){
				$_where[] = "`purpose` LIKE '%".$mysql->escape_string($_GET["purpose"])."%'";
			}
		}
		if(isset($_GET["town_from"])){
			if($_GET["town_from"]!="-1"){
				$_where[] = "`town_from` LIKE '%".$mysql->escape_string($_GET["town_from"])."%'";
			}
		}
		if(isset($_GET["town_to"])){
			if($_GET["town_to"]!="-1"){
				$_where[] = "`town_to` LIKE '%".$mysql->escape_string($_GET["town_to"])."%'";
			}
		}
		if(is_array($_where)){
			$where = " WHERE " . implode(" AND ",$_where);
		}
		// TODO: -+----+- orderby
		$order_by = "`id`";
		$sort_by = "DESC";
		if(!isset($_GET["order"])){
			$_GET["order"] = "`id`";
		}
		// TODO: -+----+- sort asc/desc
		if(!isset($_GET["sort"])){
			$_GET["sort"] = "desc";
		}
		if($_GET["sort"]=="asc"){
			$sort_by = "ASC";
		}else{
			$sort_by = "DESC";
		}
		if($_GET["order"]=="id"){
			$order_by = "`id`";
		}
		if($_GET["order"]=="customer_id"){
			$order_by = "`customer_id`";
		}
		if($_GET["order"]=="truck_type"){
			$order_by = "`truck_type`";
		}
		if($_GET["order"]=="transit_date"){
			$order_by = "`transit_date`";
		}
		if($_GET["order"]=="load_capacity"){
			$order_by = "`load_capacity`";
		}
		if($_GET["order"]=="purpose"){
			$order_by = "`purpose`";
		}
		if($_GET["order"]=="town_from"){
			$order_by = "`town_from`";
		}
		if($_GET["order"]=="town_to"){
			$order_by = "`town_to`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `truck_request` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['id'])){$rest_api[$z]['id'] = $data['id'];}; # id
				if(isset($data['customer_id'])){$rest_api[$z]['customer_id'] = $data['customer_id'];}; # text
				if(isset($data['truck_type'])){$rest_api[$z]['truck_type'] = $data['truck_type'];}; # text
				if(isset($data['transit_date'])){$rest_api[$z]['transit_date'] = $data['transit_date'];}; # text
				if(isset($data['load_capacity'])){$rest_api[$z]['load_capacity'] = $data['load_capacity'];}; # text
				if(isset($data['purpose'])){$rest_api[$z]['purpose'] = $data['purpose'];}; # text
				if(isset($data['town_from'])){$rest_api[$z]['town_from'] = $data['town_from'];}; # text
				if(isset($data['town_to'])){$rest_api[$z]['town_to'] = $data['town_to'];}; # text
				$z++;
			}
			$result->close();
			if(isset($_GET["id"])){
				if(isset($rest_api[0])){
					$rest_api = $rest_api[0];
				}
			}
		}

		break;
	
	// TODO: -+- Listing : truck_schedule
	case "truck_schedule":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["id"])){
			if($_GET["id"]!="-1"){
				$_where[] = "`id` LIKE '%".$mysql->escape_string($_GET["id"])."%'";
			}
		}
		if(isset($_GET["town_from"])){
			if($_GET["town_from"]!="-1"){
				$_where[] = "`town_from` LIKE '%".$mysql->escape_string($_GET["town_from"])."%'";
			}
		}
		if(isset($_GET["town_to"])){
			if($_GET["town_to"]!="-1"){
				$_where[] = "`town_to` LIKE '%".$mysql->escape_string($_GET["town_to"])."%'";
			}
		}
		if(isset($_GET["truck_id"])){
			if($_GET["truck_id"]!="-1"){
				$_where[] = "`truck_id` LIKE '%".$mysql->escape_string($_GET["truck_id"])."%'";
			}
		}
		if(isset($_GET["dep_time"])){
			if($_GET["dep_time"]!="-1"){
				$_where[] = "`dep_time` LIKE '%".$mysql->escape_string($_GET["dep_time"])."%'";
			}
		}
		if(isset($_GET["eta"])){
			if($_GET["eta"]!="-1"){
				$_where[] = "`eta` LIKE '%".$mysql->escape_string($_GET["eta"])."%'";
			}
		}
		if(isset($_GET["transit_date"])){
			if($_GET["transit_date"]!="-1"){
				$_where[] = "`transit_date` LIKE '%".$mysql->escape_string($_GET["transit_date"])."%'";
			}
		}
		if(isset($_GET["date"])){
			if($_GET["date"]!="-1"){
				$_where[] = "`date` LIKE '%".$mysql->escape_string($_GET["date"])."%'";
			}
		}
		if(is_array($_where)){
			$where = " WHERE " . implode(" AND ",$_where);
		}
		// TODO: -+----+- orderby
		$order_by = "`id`";
		$sort_by = "DESC";
		if(!isset($_GET["order"])){
			$_GET["order"] = "`id`";
		}
		// TODO: -+----+- sort asc/desc
		if(!isset($_GET["sort"])){
			$_GET["sort"] = "desc";
		}
		if($_GET["sort"]=="asc"){
			$sort_by = "ASC";
		}else{
			$sort_by = "DESC";
		}
		if($_GET["order"]=="id"){
			$order_by = "`id`";
		}
		if($_GET["order"]=="town_from"){
			$order_by = "`town_from`";
		}
		if($_GET["order"]=="town_to"){
			$order_by = "`town_to`";
		}
		if($_GET["order"]=="truck_id"){
			$order_by = "`truck_id`";
		}
		if($_GET["order"]=="dep_time"){
			$order_by = "`dep_time`";
		}
		if($_GET["order"]=="eta"){
			$order_by = "`eta`";
		}
		if($_GET["order"]=="transit_date"){
			$order_by = "`transit_date`";
		}
		if($_GET["order"]=="date"){
			$order_by = "`date`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `truck_schedule` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['id'])){$rest_api[$z]['id'] = $data['id'];}; # id
				if(isset($data['town_from'])){$rest_api[$z]['town_from'] = $data['town_from'];}; # heading-1
				if(isset($data['town_to'])){$rest_api[$z]['town_to'] = $data['town_to'];}; # heading-1
				if(isset($data['truck_id'])){$rest_api[$z]['truck_id'] = $data['truck_id'];}; # to_trusted
				if(isset($data['dep_time'])){$rest_api[$z]['dep_time'] = $data['dep_time'];}; # text
				if(isset($data['eta'])){$rest_api[$z]['eta'] = $data['eta'];}; # text
				if(isset($data['transit_date'])){$rest_api[$z]['transit_date'] = $data['transit_date'];}; # text
				if(isset($data['date'])){$rest_api[$z]['date'] = $data['date'];}; # text
				$z++;
			}
			$result->close();
			if(isset($_GET["id"])){
				if(isset($rest_api[0])){
					$rest_api = $rest_api[0];
				}
			}
		}

		break;
	// TODO: -+- route
	case "route":		$rest_api=array();
		$rest_api["site"]["name"] = "EJ" ;
		$rest_api["site"]["description"] = "Empty Trips Offers Solutions To Truck Owners To List Their Trucks For Hire" ;
		$rest_api["site"]["imabuilder"] = "rev17.12.11" ;

		$rest_api["routes"][0]["namespace"] = "complains";
		$rest_api["routes"][0]["tb_version"] = "Upd.1801060221";
		$rest_api["routes"][0]["methods"][] = "GET";
		$rest_api["routes"][0]["args"]["feedback_id"] = array("required"=>"false","description"=>"Selecting `complains` based `feedback_id`");
		$rest_api["routes"][0]["args"]["feedback_email"] = array("required"=>"false","description"=>"Selecting `complains` based `feedback_email`");
		$rest_api["routes"][0]["args"]["feedback_name"] = array("required"=>"false","description"=>"Selecting `complains` based `feedback_name`");
		$rest_api["routes"][0]["args"]["feedback_message"] = array("required"=>"false","description"=>"Selecting `complains` based `feedback_message`");
		$rest_api["routes"][0]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `feedback_id`, `feedback_email`, `feedback_name`, `feedback_message`");
		$rest_api["routes"][0]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][0]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=complains";
		$rest_api["routes"][1]["namespace"] = "talk_to_us";
		$rest_api["routes"][1]["tb_version"] = "Upd.1801060151";
		$rest_api["routes"][1]["methods"][] = "GET";
		$rest_api["routes"][1]["args"]["feedback_id"] = array("required"=>"false","description"=>"Selecting `talk_to_us` based `feedback_id`");
		$rest_api["routes"][1]["args"]["feedback_email"] = array("required"=>"false","description"=>"Selecting `talk_to_us` based `feedback_email`");
		$rest_api["routes"][1]["args"]["feedback_name"] = array("required"=>"false","description"=>"Selecting `talk_to_us` based `feedback_name`");
		$rest_api["routes"][1]["args"]["feedback_message"] = array("required"=>"false","description"=>"Selecting `talk_to_us` based `feedback_message`");
		$rest_api["routes"][1]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `feedback_id`, `feedback_email`, `feedback_name`, `feedback_message`");
		$rest_api["routes"][1]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][1]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=talk_to_us";
		$rest_api["routes"][2]["namespace"] = "truck_inbox";
		$rest_api["routes"][2]["tb_version"] = "Upd.1801080815";
		$rest_api["routes"][2]["methods"][] = "GET";
		$rest_api["routes"][2]["args"]["id"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `id`");
		$rest_api["routes"][2]["args"]["msgfrom"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `msgfrom`");
		$rest_api["routes"][2]["args"]["subject"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `subject`");
		$rest_api["routes"][2]["args"]["message"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `message`");
		$rest_api["routes"][2]["args"]["dep_time"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `dep_time`");
		$rest_api["routes"][2]["args"]["date"] = array("required"=>"false","description"=>"Selecting `truck_inbox` based `date`");
		$rest_api["routes"][2]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `id`, `msgfrom`, `subject`, `message`, `dep_time`, `date`");
		$rest_api["routes"][2]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][2]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=truck_inbox";
		$rest_api["routes"][3]["namespace"] = "truck_request";
		$rest_api["routes"][3]["tb_version"] = "Upd.1801070933";
		$rest_api["routes"][3]["methods"][] = "GET";
		$rest_api["routes"][3]["args"]["id"] = array("required"=>"false","description"=>"Selecting `truck_request` based `id`");
		$rest_api["routes"][3]["args"]["customer_id"] = array("required"=>"false","description"=>"Selecting `truck_request` based `customer_id`");
		$rest_api["routes"][3]["args"]["truck_type"] = array("required"=>"false","description"=>"Selecting `truck_request` based `truck_type`");
		$rest_api["routes"][3]["args"]["transit_date"] = array("required"=>"false","description"=>"Selecting `truck_request` based `transit_date`");
		$rest_api["routes"][3]["args"]["load_capacity"] = array("required"=>"false","description"=>"Selecting `truck_request` based `load_capacity`");
		$rest_api["routes"][3]["args"]["purpose"] = array("required"=>"false","description"=>"Selecting `truck_request` based `purpose`");
		$rest_api["routes"][3]["args"]["town_from"] = array("required"=>"false","description"=>"Selecting `truck_request` based `town_from`");
		$rest_api["routes"][3]["args"]["town_to"] = array("required"=>"false","description"=>"Selecting `truck_request` based `town_to`");
		$rest_api["routes"][3]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `id`, `customer_id`, `truck_type`, `transit_date`, `load_capacity`, `purpose`, `town_from`, `town_to`");
		$rest_api["routes"][3]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][3]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=truck_request";
		$rest_api["routes"][4]["namespace"] = "truck_schedule";
		$rest_api["routes"][4]["tb_version"] = "Upd.1801090722";
		$rest_api["routes"][4]["methods"][] = "GET";
		$rest_api["routes"][4]["args"]["id"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `id`");
		$rest_api["routes"][4]["args"]["town_from"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `town_from`");
		$rest_api["routes"][4]["args"]["town_to"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `town_to`");
		$rest_api["routes"][4]["args"]["truck_id"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `truck_id`");
		$rest_api["routes"][4]["args"]["dep_time"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `dep_time`");
		$rest_api["routes"][4]["args"]["eta"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `eta`");
		$rest_api["routes"][4]["args"]["transit_date"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `transit_date`");
		$rest_api["routes"][4]["args"]["date"] = array("required"=>"false","description"=>"Selecting `truck_schedule` based `date`");
		$rest_api["routes"][4]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `id`, `town_from`, `town_to`, `truck_id`, `dep_time`, `eta`, `transit_date`, `date`");
		$rest_api["routes"][4]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][4]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=truck_schedule";
		$rest_api["routes"][5]["namespace"] = "submit/complains";
		$rest_api["routes"][5]["tb_version"] = "Upd.1801060221";
		$rest_api["routes"][5]["methods"][] = "POST";
		$rest_api["routes"][5]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=submit&form=complains";
		$rest_api["routes"][5]["args"]["feedback_email"] = array("required"=>"true","description"=>"Insert data to field `Your Email` in table `complains`");
		$rest_api["routes"][5]["args"]["feedback_name"] = array("required"=>"true","description"=>"Insert data to field `` in table `complains`");
		$rest_api["routes"][5]["args"]["feedback_message"] = array("required"=>"true","description"=>"Insert data to field `Your Message` in table `complains`");
		$rest_api["routes"][6]["namespace"] = "submit/talk_to_us";
		$rest_api["routes"][6]["tb_version"] = "Upd.1801060151";
		$rest_api["routes"][6]["methods"][] = "POST";
		$rest_api["routes"][6]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=submit&form=talk_to_us";
		$rest_api["routes"][6]["args"]["feedback_email"] = array("required"=>"true","description"=>"Insert data to field `Your Email` in table `talk_to_us`");
		$rest_api["routes"][6]["args"]["feedback_name"] = array("required"=>"true","description"=>"Insert data to field `` in table `talk_to_us`");
		$rest_api["routes"][6]["args"]["feedback_message"] = array("required"=>"true","description"=>"Insert data to field `Your Message` in table `talk_to_us`");
		$rest_api["routes"][7]["namespace"] = "submit/truck_request";
		$rest_api["routes"][7]["tb_version"] = "Upd.1801070906";
		$rest_api["routes"][7]["methods"][] = "POST";
		$rest_api["routes"][7]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=submit&form=truck_request";
		$rest_api["routes"][7]["args"]["customer_id"] = array("required"=>"true","description"=>"Insert data to field `customer_id` in table `truck_request`");
		$rest_api["routes"][7]["args"]["truck_type"] = array("required"=>"true","description"=>"Insert data to field `Truck Type` in table `truck_request`");
		$rest_api["routes"][7]["args"]["transit_date"] = array("required"=>"true","description"=>"Insert data to field `Transit Date` in table `truck_request`");
		$rest_api["routes"][7]["args"]["load_capacity"] = array("required"=>"true","description"=>"Insert data to field `Load Capacity` in table `truck_request`");
		$rest_api["routes"][7]["args"]["town_from"] = array("required"=>"true","description"=>"Insert data to field `Town From` in table `truck_request`");
		$rest_api["routes"][7]["args"]["town_to"] = array("required"=>"true","description"=>"Insert data to field `Town To` in table `truck_request`");
		$rest_api["routes"][7]["args"]["purpose"] = array("required"=>"true","description"=>"Insert data to field `Purpose` in table `truck_request`");
		break;
	// TODO: -+- submit

	case "submit":
		$rest_api=array();

		$rest_api["methods"][0] = "POST";
		$rest_api["methods"][1] = "GET";
		switch($_GET["form"]){
			// TODO: -+----+- complains
			case "complains":


				$rest_api["auth"]["basic"] = false;

				$rest_api["args"]["feedback_email"] = array("required"=>"true","description"=>"Receiving data from the input `Your Email`");
				$rest_api["args"]["feedback_name"] = array("required"=>"true","description"=>"Receiving data from the input ``");
				$rest_api["args"]["feedback_message"] = array("required"=>"true","description"=>"Receiving data from the input `Your Message`");
				if(!isset($_POST["feedback_email"])){
					$_POST["feedback_email"]="";
				}
				if(!isset($_POST["feedback_name"])){
					$_POST["feedback_name"]="";
				}
				if(!isset($_POST["feedback_message"])){
					$_POST["feedback_message"]="";
				}
				$rest_api["message"] = "Please! complete the form provided.";
				$rest_api["title"] = "Notice!";
				if(($_POST["feedback_email"] != "") || ($_POST["feedback_name"] != "") || ($_POST["feedback_message"] != "")){
					// avoid undefined
					$input["feedback_email"] = "";
					$input["feedback_name"] = "";
					$input["feedback_message"] = "";
					// variable post
					if(isset($_POST["feedback_email"])){
						$input["feedback_email"] = $mysql->escape_string($_POST["feedback_email"]);
					}

					if(isset($_POST["feedback_name"])){
						$input["feedback_name"] = $mysql->escape_string($_POST["feedback_name"]);
					}

					if(isset($_POST["feedback_message"])){
						$input["feedback_message"] = $mysql->escape_string($_POST["feedback_message"]);
					}

					$sql_query = "INSERT INTO `complains` (`feedback_email`,`feedback_name`,`feedback_message`) VALUES ('".$input["feedback_email"]."','".$input["feedback_name"]."','".$input["feedback_message"]."' )";
					if($query = $mysql->query($sql_query)){
						$rest_api["message"] = "Your request has been sent.";
						$rest_api["title"] = "Successfully";
					}else{
						$rest_api["message"] = "Form input and SQL Column do not match.";
						$rest_api["title"] = "Fatal Error!";
					}
				}else{
					$rest_api["message"] = "Please! complete the form provided.";
					$rest_api["title"] = "Notice!";
				}

				break;

			// TODO: -+----+- talk_to_us
			case "talk_to_us":


				$rest_api["auth"]["basic"] = false;

				$rest_api["args"]["feedback_email"] = array("required"=>"true","description"=>"Receiving data from the input `Your Email`");
				$rest_api["args"]["feedback_name"] = array("required"=>"true","description"=>"Receiving data from the input ``");
				$rest_api["args"]["feedback_message"] = array("required"=>"true","description"=>"Receiving data from the input `Your Message`");
				if(!isset($_POST["feedback_email"])){
					$_POST["feedback_email"]="";
				}
				if(!isset($_POST["feedback_name"])){
					$_POST["feedback_name"]="";
				}
				if(!isset($_POST["feedback_message"])){
					$_POST["feedback_message"]="";
				}
				$rest_api["message"] = "Please! complete the form provided.";
				$rest_api["title"] = "Notice!";
				if(($_POST["feedback_email"] != "") || ($_POST["feedback_name"] != "") || ($_POST["feedback_message"] != "")){
					// avoid undefined
					$input["feedback_email"] = "";
					$input["feedback_name"] = "";
					$input["feedback_message"] = "";
					// variable post
					if(isset($_POST["feedback_email"])){
						$input["feedback_email"] = $mysql->escape_string($_POST["feedback_email"]);
					}

					if(isset($_POST["feedback_name"])){
						$input["feedback_name"] = $mysql->escape_string($_POST["feedback_name"]);
					}

					if(isset($_POST["feedback_message"])){
						$input["feedback_message"] = $mysql->escape_string($_POST["feedback_message"]);
					}

					$sql_query = "INSERT INTO `talk_to_us` (`feedback_email`,`feedback_name`,`feedback_message`) VALUES ('".$input["feedback_email"]."','".$input["feedback_name"]."','".$input["feedback_message"]."' )";
					if($query = $mysql->query($sql_query)){
						$rest_api["message"] = "Your request has been sent.";
						$rest_api["title"] = "Successfully";
					}else{
						$rest_api["message"] = "Form input and SQL Column do not match.";
						$rest_api["title"] = "Fatal Error!";
					}
				}else{
					$rest_api["message"] = "Please! complete the form provided.";
					$rest_api["title"] = "Notice!";
				}

				break;

			// TODO: -+----+- truck_request
			case "truck_request":


				$rest_api["auth"]["basic"] = false;

				$rest_api["args"]["customer_id"] = array("required"=>"true","description"=>"Receiving data from the input `customer_id`");
				$rest_api["args"]["truck_type"] = array("required"=>"true","description"=>"Receiving data from the input `Truck Type`");
				$rest_api["args"]["transit_date"] = array("required"=>"true","description"=>"Receiving data from the input `Transit Date`");
				$rest_api["args"]["load_capacity"] = array("required"=>"true","description"=>"Receiving data from the input `Load Capacity`");
				$rest_api["args"]["town_from"] = array("required"=>"true","description"=>"Receiving data from the input `Town From`");
				$rest_api["args"]["town_to"] = array("required"=>"true","description"=>"Receiving data from the input `Town To`");
				$rest_api["args"]["purpose"] = array("required"=>"true","description"=>"Receiving data from the input `Purpose`");
				if(!isset($_POST["customer_id"])){
					$_POST["customer_id"]="";
				}
				if(!isset($_POST["truck_type"])){
					$_POST["truck_type"]="";
				}
				if(!isset($_POST["transit_date"])){
					$_POST["transit_date"]="";
				}
				if(!isset($_POST["load_capacity"])){
					$_POST["load_capacity"]="";
				}
				if(!isset($_POST["town_from"])){
					$_POST["town_from"]="";
				}
				if(!isset($_POST["town_to"])){
					$_POST["town_to"]="";
				}
				if(!isset($_POST["purpose"])){
					$_POST["purpose"]="";
				}
				$rest_api["message"] = "Please! complete the form provided.";
				$rest_api["title"] = "Notice!";
				if(($_POST["customer_id"] != "") || ($_POST["truck_type"] != "") || ($_POST["transit_date"] != "") || ($_POST["load_capacity"] != "") || ($_POST["town_from"] != "") || ($_POST["town_to"] != "") || ($_POST["purpose"] != "")){
					// avoid undefined
					$input["customer_id"] = "";
					$input["truck_type"] = "";
					$input["transit_date"] = "";
					$input["load_capacity"] = "";
					$input["town_from"] = "";
					$input["town_to"] = "";
					$input["purpose"] = "";
					// variable post
					if(isset($_POST["customer_id"])){
						$input["customer_id"] = $mysql->escape_string($_POST["customer_id"]);
					}

					if(isset($_POST["truck_type"])){
						$input["truck_type"] = $mysql->escape_string($_POST["truck_type"]);
					}

					if(isset($_POST["transit_date"])){
						$input["transit_date"] = $mysql->escape_string($_POST["transit_date"]);
					}

					if(isset($_POST["load_capacity"])){
						$input["load_capacity"] = $mysql->escape_string($_POST["load_capacity"]);
					}

					if(isset($_POST["town_from"])){
						$input["town_from"] = $mysql->escape_string($_POST["town_from"]);
					}

					if(isset($_POST["town_to"])){
						$input["town_to"] = $mysql->escape_string($_POST["town_to"]);
					}

					if(isset($_POST["purpose"])){
						$input["purpose"] = $mysql->escape_string($_POST["purpose"]);
					}

					$sql_query = "INSERT INTO `truck_request` (`customer_id`,`truck_type`,`transit_date`,`load_capacity`,`town_from`,`town_to`,`purpose`) VALUES ('".$input["customer_id"]."','".$input["truck_type"]."','".$input["transit_date"]."','".$input["load_capacity"]."','".$input["town_from"]."','".$input["town_to"]."','".$input["purpose"]."' )";
					if($query = $mysql->query($sql_query)){
						$rest_api["message"] = "Your request has been sent.";
						$rest_api["title"] = "Successfully";
					}else{
						$rest_api["message"] = "Form input and SQL Column do not match.";
						$rest_api["title"] = "Fatal Error!";
					}
				}else{
					$rest_api["message"] = "Please! complete the form provided.";
					$rest_api["title"] = "Notice!";
				}

				break;

		}


	break;

}


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization,X-Authorization');
if (!isset($_GET["callback"])){
	header('Content-type: application/json');
	if(defined("JSON_UNESCAPED_UNICODE")){
		echo json_encode($rest_api,JSON_UNESCAPED_UNICODE);
	}else{
		echo json_encode($rest_api);
	}

}else{
	if(defined("JSON_UNESCAPED_UNICODE")){
		echo strip_tags($_GET["callback"]) ."(". json_encode($rest_api,JSON_UNESCAPED_UNICODE). ");" ;
	}else{
		echo strip_tags($_GET["callback"]) ."(". json_encode($rest_api) . ");" ;
	}

}