<?php


/**
 * @author ET <care@et.com>
 * @copyright ET 2017
 * @package et
 * 
 * 
 * Created using Ionic App Builder
 * http://codecanyon.net/item/ionic-mobile-app-builder/15716727
 */


/** CONFIG:START **/
$config["host"] 		= "localhost" ; 		//host
$config["user"] 		= "root" ; 		//Username SQL
$config["pass"] 		= "" ; 		//Password SQL
$config["dbase"] 		= "et" ; 		//Database
$config["utf8"] 		= true ; 		//turkish charset set false
$config["abs_url_images"] 		= "http://localhost/et/media/image/" ; 		//Absolute Images URL
$config["abs_url_videos"] 		= "http://localhost/et/media/media/" ; 		//Absolute Videos URL
$config["abs_url_audios"] 		= "http://localhost/et/media/media/" ; 		//Absolute Audio URL
$config["abs_url_files"] 		= "http://localhost/et/media/file/" ; 		//Absolute Files URL
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
	// TODO: -+- Listing : truck
	case "truck":
		$rest_api=array();
		$where = $_where = null;
		// TODO: -+----+- statement where
		if(isset($_GET["id"])){
			if($_GET["id"]!="-1"){
				$_where[] = "`id` LIKE '%".$mysql->escape_string($_GET["id"])."%'";
			}
		}
		if(isset($_GET["number_plate"])){
			if($_GET["number_plate"]!="-1"){
				$_where[] = "`number_plate` LIKE '%".$mysql->escape_string($_GET["number_plate"])."%'";
			}
		}
		if(isset($_GET["name"])){
			if($_GET["name"]!="-1"){
				$_where[] = "`name` LIKE '%".$mysql->escape_string($_GET["name"])."%'";
			}
		}
		if(isset($_GET["photo"])){
			if($_GET["photo"]!="-1"){
				$_where[] = "`photo` LIKE '%".$mysql->escape_string($_GET["photo"])."%'";
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
		if($_GET["order"]=="number_plate"){
			$order_by = "`number_plate`";
		}
		if($_GET["order"]=="name"){
			$order_by = "`name`";
		}
		if($_GET["order"]=="photo"){
			$order_by = "`photo`";
		}
		if($_GET["order"]=="date"){
			$order_by = "`date`";
		}
		if($_GET["order"]=="random"){
			$order_by = "RAND()";
		}
		// TODO: -+----+- SQL Query
		$sql = "SELECT * FROM `truck` ".$where."ORDER BY ".$order_by." ".$sort_by." LIMIT 0, 100" ;
		if($result = $mysql->query($sql)){
			$z=0;
			while ($data = $result->fetch_array()){
				if(isset($data['id'])){$rest_api[$z]['id'] = $data['id'];}; # id
				if(isset($data['number_plate'])){$rest_api[$z]['number_plate'] = $data['number_plate'];}; # heading-1
				if(isset($data['name'])){$rest_api[$z]['name'] = $data['name'];}; # heading-2
				
				$abs_url_images = $config['abs_url_images'].'/';
				$abs_url_videos = $config['abs_url_videos'].'/';
				$abs_url_audios = $config['abs_url_audios'].'/';
				if(!isset($data['photo'])){$data['photo']='undefined';}; # images
				if((substr($data['photo'], 0, 7)=='http://')||(substr($data['photo'], 0, 8)=='https://')){
					$abs_url_images = $abs_url_videos  = $abs_url_audios = '';
				}
				
				if(substr($data['photo'], 0, 5)=='data:'){
					$abs_url_images = $abs_url_videos  = $abs_url_audios = '';
				}
				
				if($data['photo'] != ''){
					$rest_api[$z]['photo'] = $abs_url_images . $data['photo']; # images
				}else{
					$rest_api[$z]['photo'] = ''; # images
				}
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
		$rest_api["site"]["name"] = "ET" ;
		$rest_api["site"]["description"] = "ET" ;
		$rest_api["site"]["imabuilder"] = "rev17.12.11" ;

		$rest_api["routes"][0]["namespace"] = "truck";
		$rest_api["routes"][0]["tb_version"] = "Upd.1712190344";
		$rest_api["routes"][0]["methods"][] = "GET";
		$rest_api["routes"][0]["args"]["id"] = array("required"=>"false","description"=>"Selecting `truck` based `id`");
		$rest_api["routes"][0]["args"]["number_plate"] = array("required"=>"false","description"=>"Selecting `truck` based `number_plate`");
		$rest_api["routes"][0]["args"]["name"] = array("required"=>"false","description"=>"Selecting `truck` based `name`");
		$rest_api["routes"][0]["args"]["photo"] = array("required"=>"false","description"=>"Selecting `truck` based `photo`");
		$rest_api["routes"][0]["args"]["date"] = array("required"=>"false","description"=>"Selecting `truck` based `date`");
		$rest_api["routes"][0]["args"]["order"] = array("required"=>"false","description"=>"order by `random`, `id`, `number_plate`, `name`, `photo`, `date`");
		$rest_api["routes"][0]["args"]["sort"] = array("required"=>"false","description"=>"sort by `asc` or `desc`");
		$rest_api["routes"][0]["_links"]["self"] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]."?json=truck";
		break;
	// TODO: -+- submit

	case "submit":
		$rest_api=array();

		$rest_api["methods"][0] = "POST";
		$rest_api["methods"][1] = "GET";

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