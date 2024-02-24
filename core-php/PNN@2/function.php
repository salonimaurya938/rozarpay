<?php
$domain = "http://localhost/PNN/"; ////// Root of Domain
$baseurl = "http://localhost/PNN/member"; ////// Member Panel URL
$adminurl = "http://localhost/PNN/admin12"; ////// Admin Panel URL
$fronturl = "http://localhost/PNN/"; ////// Admin Panel URL

date_default_timezone_set("Asia/kolkata");
$tm = time();


error_reporting(E_ALL);
	
$dbname = "newmlm";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";


function connectdb()
{/*
    global $dbname, $dbuser, $dbhost, $dbpass;
    $conms = @mysql_connect($dbhost,$dbuser,$dbpass); //connect mysql
    if(!$conms) return false;
    $condb = @mysql_select_db($dbname);
    if(!$condb) return false;
    return true;*/
  $mysqli=new mysqli("localhost","olgevfum_pavan23erwb","!^!B&Z.e&u#L","olgevfum_newmlm");

}

function attempt($username, $password)
{
$mdpass = md5($password);
include('mysqli.php');
//$data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$username."' and password='".$mdpass."'"));
$d1=$mysqli->query("SELECT COUNT(*) FROM users WHERE email='".$username."' and password='".$mdpass."'");
$data=$d1->fetch_array(MYSQLI_BOTH);

	if ($data[0] == 1) {
		# set session
		$_SESSION['username'] = $username;
		return true;
	} else {
		return false;
	}
}



function attemptadmin($username, $password)
{
$mdpass = md5($password);
include('mysqli.php');
//$data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM admin WHERE username='".$username."' and password='".$mdpass."'"));
$dat=$mysqli->query("SELECT COUNT(*) FROM admin WHERE username='".$username."' and password='".$mdpass."'");
$data =$dat->fetch_array(MYSQLI_BOTH);
	if ($data[0] == 1) {
		# set session
		$_SESSION['username'] = $username;
		return true;
	} else {
		return false;
	}
}



function you_valid($usssr)
{
include('mysqli.php');
//$aa = mysql_fetch_array(mysql_query("SELECT verstat FROM users WHERE mid='".$usssr."'"));
$re=$mysqli->query("SELECT verstat FROM users WHERE mid='".$usssr."'");
$aa=$re->fetch_array(MYSQLI_BOTH);
	if ($aa[0]==0){
		return true;
	}
}




function is_user()
{
	if (isset($_SESSION['username']))
		return true;
}

function redirect($url)
{
	header('Location: ' .$url);
	exit;
}




/////////////-------------PRINT


function printBV($mid)
{
include('mysqli.php');
//$cbv = mysql_fetch_array(mysql_query("SELECT lbv, rbv FROM member_bv WHERE mid='".$mid."'"));
$cb=$mysqli->query("SELECT lbv, rbv FROM member_bv WHERE mid='".$mid."'");
$cbv=$cb->fetch_array(MYSQLI_BOTH);

//$rid = mysql_fetch_array(mysql_query("SELECT refid FROM users WHERE mid='".$mid."'"));
$ri=$mysqli->query("SELECT refid FROM users WHERE mid='".$mid."'");
$rid =$ri->fetch_array(MYSQLI_BOTH);

//$rnm = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$rid[0]."'"));
$rn=$mysqli->query("SELECT username FROM users WHERE mid='".$rid[0]."'");
$rnm=$rn->fetch_array(MYSQLI_BOTH);

echo "<b>Referred By:</b> $rnm[0] <br>";
echo "<b>Current BV:</b> L-$cbv[0] | R-$cbv[1] <br>";
}


function printBelowMember($mid)
{
    include('mysqli.php');
//$bmbr = mysql_fetch_array(mysql_query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$mid."'"));
$bm=$mysqli->query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$mid."'");
$bmbr=$bm->fetch_array(MYSQLI_BOTH);

echo "<b>Paid Member Below:</b> L-$bmbr[0] | R-$bmbr[1] <br>";
echo "<b>Free Member Below:</b> L-$bmbr[2] | R-$bmbr[3] <br>";
}


/////////////-------------PRINT


/////////////////////////// UPDATE BV



    function updateDepositBV($mid='', $deposit_amount=0)
    {
   include('mysqli.php');

   $formid=$mid;
      
      
  while($mid!=""||$mid!="0")
        {
            if(isMemberExists($mid))
            {
                $posid=getParentId($mid);
                if($posid=="0")
                break;
                
                $position=getPositionParent($mid);   

//$currentBV = mysql_fetch_array(mysql_query("SELECT lbv, rbv FROM member_bv WHERE mid='".$posid."'"));
   $curr=$mysqli->query("SELECT lbv, rbv FROM member_bv WHERE mid='".$posid."'");

$currentBV=$curr->fetch_array(MYSQLI_BOTH);
//echo "$posid - $position ----<br/> ";
                        
                if($position=="L")
                {
                    $new_lbv=$currentBV[0]+$deposit_amount; 
                    $new_rbv=$currentBV[1]; 
                }
                else
                {
                    $new_lbv=$currentBV[0]; 
                    $new_rbv=$currentBV[1]+$deposit_amount;
                }   
                


$mysqli->query("UPDATE member_bv SET lbv='".$new_lbv."', rbv='".$new_rbv."' WHERE mid='".$posid."'");





                $mid =$posid;
                
            } else {
                break;
            }
                
        }//while       
        return 0;   
        
    }  









    function isMemberExists($mid='0')
    {
        include('mysqli.php');
//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'"));
$cou=$mysqli->query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'");
$count=$cou->fetch_array(MYSQLI_BOTH);

        if ($count[0] == 1){
         return true;
     }else{
        return false;       
    }

    }  


    function getParentId($mid ="")
    {

include('mysqli.php');
//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'"));
$co=$mysqli->query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'");
$count=$co->fetch_array(MYSQLI_BOTH);

//$posid = mysql_fetch_array(mysql_query("SELECT posid FROM users WHERE mid='".$mid."'"));

$po=$mysqli->query("SELECT posid FROM users WHERE mid='".$mid."'");
$posid=$po->fetch_array(MYSQLI_BOTH);

        if ($count[0] == 1){
         return $posid[0];
     }else{
        return 0;       
    }


        
    } 





    function getPositionParent($mid ="")
    {
      include('mysqli.php');
//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'"));
$cou=$mysqli->query("SELECT COUNT(*) FROM users WHERE mid='".$mid."'");
$count=$cou->fetch_array(MYSQLI_BOTH);

//$position = mysql_fetch_array(mysql_query("SELECT position FROM users WHERE mid='".$mid."'"));

$posi=$mysqli->query("SELECT position FROM users WHERE mid='".$mid."'");
$position=$posi->fetch_array(MYSQLI_BOTH);



        if ($count[0] == 1){
         return $position[0];
     }else{
        return 0;       
    }

        
    }  



############################# LAST CHILD


    
    function getLastChildOfLR($parentUserName="",$position='')
    { 
        include('mysqli.php');

        //$parentid= mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$parentUserName."'"));
         $pare=$mysqli->query("SELECT mid FROM users WHERE username='".$parentUserName."'");
          $parentid=$pare->fetch_array(MYSQLI_BOTH);


        $childid= getTreeChildId($parentid[0], $position); 
        if($childid!="-1"){
           $mid=$childid;
                } else {
           $mid=$parentid[0];
                }
        $flag=0;
        while($mid!=""||$mid!="0")
        {
            if(isMemberExists($mid))
            {   
                $nextchildid= getTreeChildId($mid, $position);
                if($nextchildid=="-1")
                {
                    $flag=1;
                    break;
                } else {
                                    $mid = $nextchildid;
                                }
                 
            }//if
            
            else
                break;
                
        }//while
        return $mid;    
    }  


    function getTreeChildId($parentid="",$position="")
    {
           include('mysqli.php');
    

//$cou = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$parentid."' AND position='".$position."'"));
  $c1=$mysqli->query("SELECT COUNT(*) FROM users WHERE posid='".$parentid."' AND position='".$position."'");
$cou=$c1->fetch_array(MYSQLI_BOTH);

//$cid = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE posid='".$parentid."' AND position='".$position."'"));
     $ci1=$mysqli->query("SELECT mid FROM users WHERE posid='".$parentid."' AND position='".$position."'");
     $cid=$ci1->fetch_array(MYSQLI_BOTH);

        if ($cou[0] == 1){
         return $cid[0];
     }else{
        return -1;       
    }
     
  }  



############################# LAST CHILD




///////////////////////// UPDATE BELOW MEMBER



    function updateMemberBelow($mid='', $type='')
    {
   

 $formid=$mid;
      
      
  while($mid!=""||$mid!="0")
        {
            if(isMemberExists($mid))
            {
                $posid=getParentId($mid);
                if($posid=="0")
                break;
                
                $position=getPositionParent($mid);   

   include('mysqli.php');

//$currentCount = mysql_fetch_array(mysql_query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$posid."'"));
$cu=$mysqli->query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$posid."'");
$currentCount=$cu->fetch_array(MYSQLI_BOTH);


$new_lpaid = $currentCount[0];
$new_rpaid = $currentCount[1];
$new_lfree = $currentCount[2];
$new_rfree = $currentCount[3];

                        
                if($position=="L")
                {

                    if($type=='FREE'){
                            $new_lfree = $new_lfree+1;
                    }else{
                            $new_lpaid = $new_lpaid+1;
                    }

                }
                else
                {

                    if($type=='FREE'){
                            $new_rfree = $new_rfree+1;
                    }else{
                            $new_rpaid = $new_rpaid+1;
                    }
                }   
                


$mysqli->query("UPDATE member_below SET lpaid='".$new_lpaid."', rpaid='".$new_rpaid."', lfree='".$new_lfree."', rfree='".$new_rfree."' WHERE mid='".$posid."'");





                $mid =$posid;
                
            } else {
                break;
            }
                
        }//while       
        return 0;   
        
    }  







///////////////////////// TREE AUTH

    function treeeee($mid='', $uid='')
    {
   

 $formid=$mid;
      
      
  while($mid!=""||$mid!="0")
        {
            if(isMemberExists($mid))
            {
                $posid=getParentId($mid);
                if($posid=="0")
                break;
                
                $position=getPositionParent($mid);   


                if($posid==$uid){
                    return true;
                }




                $mid =$posid;
                
            } else {
                break;
            }
                
        }//while       
        return 0;   
        
    }  



    function updatePaid($mid)
    {
   

 $formid=$mid;
      
      
  while($mid!=""||$mid!="0")
        {
            if(isMemberExists($mid))
            {
                $posid=getParentId($mid);
                if($posid=="0")
                break;
                
                $position=getPositionParent($mid);   
   include('mysqli.php');

//$currentCount = mysql_fetch_array(mysql_query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$posid."'"));
$cur=$mysqli->query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$posid."'");
$currentCount=$cur->fetch_array(MYSQLI_BOTH);

$new_lpaid = $currentCount[0];
$new_rpaid = $currentCount[1];
$new_lfree = $currentCount[2];
$new_rfree = $currentCount[3];

                        
                if($position=="L")
                {

                            $new_lfree = $new_lfree-1;
                            $new_lpaid = $new_lpaid+1;

                }
                else
                {

                            $new_rfree = $new_rfree-1;
                            $new_rpaid = $new_rpaid+1;
                }   
                


$mysqli->query("UPDATE member_below SET lpaid='".$new_lpaid."', rpaid='".$new_rpaid."', lfree='".$new_lfree."', rfree='".$new_rfree."' WHERE mid='".$posid."'");





                $mid =$posid;
                
            } else {
                break;
            }
                
        }//while       
        return 0;   
        
    }  
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
?>