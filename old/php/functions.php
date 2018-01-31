<?php
ob_start();
session_start();
define("database","emptyjou_trucks");
define("dev_mod", true);
define("imagepath", "./img/");
$ndk = "akc_";
$page = end(explode("/",$_SERVER["PHP_SELF"]));



function db(){$db = new mysqli("localhost","emptyjou_mmboss","MAtowil2Boss2",database);
if($db->connect_errno > 0){die(spill($db->connect_error));}elseif($db->error){ error($db->error);}else{return $db;}}


if(isset($_SESSION[$ndk]["inside"])){
    $me =  $_SESSION[$ndk]["inside"]["id"];
    $type =  $_SESSION[$ndk]["inside"]["usertype"];

    switch($type){
        case 1 : $truck_table = "truck_owner";break;
        case 2 : $truck_table = "truck_driver";break;
        case 3 : $truck_table = "truck_customer";break;
        case 4 : $truck_table = "truck_admin";break;
        case 5 : $truck_table = "truck_creator";break;
    }

}


function clean($i){ return mysqli_real_escape_string(db(), $i);}
function rx($i, $j=0){$k=str_replace("_"," ", strtolower($i)); $i = $j==0? ucwords($k) : strtoupper($k); return $i;}
function spill($i){echo "<pre>";print_r($i);echo "</pre>";}


function process($sql){global $ndk; $db = db();if($db->query($sql)){$j = TRUE;}else{error($db->error); 
   $j = FALSE;}$_SESSION[$ndk]["erc"] = $j;return $j;}  
function process2($sql){global $ndk; $db = db();if($d = $db->query($sql)){ $j = TRUE;}else{ spill($db->error);  $j = FALSE; }return $d;}
function get($i=""){if($i !== ""){$l = [];$j = process2($i);  while($k = $j->fetch_assoc()){$l[] = $k;}return $l;}}
function getlist($i,$filter=0,$lj=0){
            $raw = get($i);if(empty($raw)){
            $l = [];}else{
            if(count($raw[0])==2){foreach($raw as $j=>$k){$l[current($k)] = end($k);}}else{
            if(count($raw[0])>2){foreach($raw as $j=>$k){$jl = $lj==0? $j : current($k); $l[$jl] = $k;}}else{foreach($raw as $j=>$k){foreach($k as $m=>$n):$l[] = $n;endforeach;}}}} 
            if(count($raw)==1){$a = $raw[0]; 
            if(count($a) > 2){ $l = $a; }else{$x=array_values($a); $l = [current($x)=>end($x)];}} 
            return $filter ==1 ? array_filter($l) : $l;}


function insert($t){
    $f = implode("`,`",array_keys($_POST)); $v = implode("','",array_values($_POST));
    $sql = "insert into $t (`$f`) values('$v')";
    if(process($sql)){$r = fetch("select max(id) from $t");savefiles($t, $r); return "Save Successful";}
}

function update($tbl,$id){
    $w = " where id =$id";
    $u = "";
    foreach($_POST as $i=>&$v){$v = clean($v); $u .= "`".$i."` = '".$v."', "; }					
    $u = substr($u, 0, -2).$w;			
    echo $str = "update `$tbl` set ".$u;
    $j = process($str);
    savefiles($tbl, $id);   
    return $j; 
}

function savefiles($t, $r){
    if(!empty($_FILES)){
        foreach($_FILES as $i=>$j){
            $p = save_pic($t,$i);
            $sql = "update $t set `$i` = '$p' where id = $r";
            process($sql);
        }
    }
}


function save_pic($table, $fldname, $type=1){
    $uploads = './img';
    $trailer = "";
    $files=$_FILES;
    $time = microtime(1)*10000;
    $name =$files[$fldname]['name'];
    if($name !== ''){
            
    $extension = strtolower(end(explode(".",$name)));		
    $allowed = $type == 1 ? ['jpg','jpeg','png',] : ['jpg','jpeg','png','txt','doc','docx','ppt','pptx','xls','xlsx','accdb','mdb','pdf'];
    if(in_array($extension,$allowed)){		
    $location =$uploads."/".$table."/";
    if (!@mkdir($location, 0777)) {$dh = opendir($location);closedir($dh);}		
    if(move_uploaded_file($files[$fldname]['tmp_name'],$location.$name))
    {   $trailer = $time.".".$extension;rename($location.$name, $location.$trailer);	}
    else{echo("Upload Fail! : ".$location.$name);}
    }else{ echo("Incorrect file format :.".$extension); }}
    return $trailer;
}



function reload($l=""){$h = $l == "" ? $_SERVER["REQUEST_URI"] : $l;$h = $l == "" ? "http://".$_SERVER["SERVER_NAME"].$h :$h;echo "<script>window.location.href='".$h."'</script>";}

	function getimage($i){
		$default = "img/default.jpg";
		$i = $i == '' ? $default : $i;
		$realpath = "img/".$i;
		
		if(file_exists(imagepath.$i)){
			$img = $realpath; /* wild path */
		}elseif(file_exists("../".$realpath)){
			$img = $realpath; /* from pages */
		}elseif(file_exists("../../".$realpath)){
			$img = file_exists($realpath)? $realpath : "../../".$realpath;  /* from models */
		}elseif(file_exists("../../../".$realpath)){
			$img = $realpath;  /* from xhr */
		}else{
			$img = $default; 
		}
		
		$img = strpos($img, ".")? $img : $default;
		
		return $img;
	}
    
    
    function fetch($i){$a = get($i); $b = isset($a[0])?$a[0] : []; $c = current($b); return $c;}

    function success($i){echo ("<span style='color:yellowgreen; padding:5px'>&nbsp&nbsp&nbsp".$i."</span>");}
    function error($i){ if(dev_mod){if(is_string($i)){echo ("<span style='color:red;padding:5px'>&nbsp&nbsp".$i."</span><br>");}}}



    // =====================================================================
      // =====================================================================
    // =====================================================================


    function profile_handler(){
        global $ndk, $truck_table;
        $id = $_SESSION[$ndk]["inside"]["id"];
        $utype = $_SESSION[$ndk]["inside"]["usertype"];
        $account = $utype == 1? "Fleet Manager" : ( $utype == 2? "Driver" : "Customer" );
        switch($utype){
            case 1: $account = "Fleet Manager"; break;
            case 2: $account = "Driver"; break;
            case 3: $account = "Customer"; break;
            case 4: $account = "Admin"; break;
            case 5: $account = "Developer"; break;
        }
        
        // $truck_table = $utype == 1 ? "truck_owner" : ($utype ==2 ? "truck_driver" : "truck_customer");
        if(empty($complete = getlist("select * from `$truck_table` where user_id = '$id'"))){
            echo '<li><a href="complete_reg.php"><button class="btn btn-danger btn-squared btn-xs">Complete your Registration</button></a></li>';
            $ref = " +254 ".$_SESSION[$ndk]["inside"]["tel"];
        }else{
            $ref = fetch("select full_name from `$truck_table` where user_id = '$id' ");
        switch($utype){
            case 1 : //owners
            echo '<li><a href="./trucks.php" ><button class="btn btn-danger btn-squared btn-xs">Manage Fleet</button></a></li>';
            echo '<li><a href="./message.php" ><button class="btn btn-info btn-squared btn-xs">Inbox</button></a></li>';
            break;
            case 2 : //drivers
            echo '<li><a href="./driving.php" ><button class="btn btn-danger btn-squared btn-xs">My Trucks</button></a></li>';
            echo '<li><a href="./message.php" ><button class="btn btn-info btn-squared btn-xs">Inbox</button></a></li>';
            break;
            case 3 : //customers
            echo '<li><a href="./message.php" ><button class="btn btn-danger btn-squared btn-xs">Inbox</button></a></li>';
            break;
            case 4 : //admin
            echo '<li><a href="./clients.php" ><button class="btn btn-danger btn-squared btn-xs">Clients</button></a></li>';
            echo '<li><a href="./truck_towns.php" ><button class="btn btn-danger btn-squared btn-xs">Transit Locations</button></a></li>';
            echo '<li><a href="./truck_ships.php" ><button class="btn btn-danger btn-squared btn-xs">Monitor Shipment</button></a></li>';
            break;
            break;
            case 5 : //creators
            echo '<li><a href="./truck_universe.php" ><button class="btn btn-danger btn-squared btn-xs">Widal Test</button></a></li>';
            break;
        }
        }
            echo "<li> |   Hello ". $ref." ($account Account)</li>";
    }

  
    function message($from, $to, $msg, $subj='>>eTrip Notification'){
        process("insert into truck_inbox (subject, msgfrom,msgto,message) values('$subj','$from','$to','$msg')");
    }

    function table($data){
        if(!empty($data)) {
        $ths = array_keys($data[0]);
        echo "<table class='table table-striped table-bordered'>";
        echo "<tr><thead class='bg-info'>"; foreach($ths as $th){ echo "<th>".rx($th)."</th>"; } echo "</thead></tr>";
        echo "<tbody>";
        foreach($data as $tr=>$tds){
            if(isset($tds["status"])){ $tds["status"] = $tds["status"] == 0 ? "Pending" : "Approved";}
            echo "<tr>";foreach($tds as $td){ echo "<td>".$td."</td>"; } echo "</tr>"; 
        }
        echo "</tbody>";
        echo "</table>";
    }
    }

    function validate_owner(){
        global $ndk;
        if(!isset($_REQUEST["id"])){ header("location:trucks.php");}
        $me = $_SESSION[$ndk]["inside"]["id"];
        $truck_id = $_REQUEST["id"];
        $check_truck_owner = fetch("select user_id from truck where id ='$truck_id'");
        if($check_truck_owner !== $me){header("location:trucks.php"); }
        return $truck_id;
    }


    function sub_status($me){
        $thismonth = date("m");
        return $sub_status = fetch("select status from truck_sub where user_id ='$me' and month(sub_month) = '$thismonth'");
    }


    function truck_table($id){
        $type = fetch("select usertype from truck_users where id = '$id'");
        switch($type){
            case 1 : $t = "truck_owner";break;
            case 2 : $t = "truck_driver";break;
            case 3 : $t = "truck_customer";break;
            case 4 : $t = "truck_admin";break;
            case 5 : $t = "truck_creator";break;
        }
        return $t;
    }