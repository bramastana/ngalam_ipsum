<?php 

function getHTMLWeb($data=null){
	$CI =& get_instance();
	
	$CI->load->view('skin/header', $data);
	$CI->load->view('skin/body');
}

function getHTMLWebCms($data=null){
	$CI =& get_instance();
	$CI->load->view('skin/header', $data);
	$CI->load->view($data["filelist"]);
}

function goLogin(){
	$CI =& get_instance();
	$data['title'] = "Login SCMS";
	$CI->load->view('login_cms/login_cms',$data);
}

function goLog(){
	$CI =& get_instance();
	$data['title'] = "login";
	$data['content'] = "login/login";
	$CI->load->view('skin/header');
	$CI->load->view('skin/body_login',$data);
}

function getUserDetailTwitterAPI(){
	require_once APPPATH."libraries/TwitterAPIExchange.php";

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = array(
		'oauth_access_token' => "105065882-diwJWExjkIaGkOUKqFCcCHmEE4OpXUSZba55rKtW",
		'oauth_access_token_secret' => "eqUl6hyaKAxf1b2Y9IASWQks3jCJ3BtqGIuiEPZSA",
		'consumer_key' => "JWgFITCigK1EKeQqdZmg",
		'consumer_secret' => "ofDboo31fNxshQh3MjE3I252iBpNOGdXUFaGgZa2TA"
	);

	/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?username=sahrulmustakim';
	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange($settings);
	$output = $twitter->setGetfield($getfield)
			->buildOauth($url, $requestMethod)
			->performRequest();
	$outDump = json_decode($output,true);
	return $outDump[0]['user'];
}

function getCountFollowerTwitterAPI(){
	$data = getUserDetailTwitterAPI();
	return number_format(intval($data['followers_count']), 0, '.', '');
}

function postSendTweet($oauth_access_token=null,$oauth_access_token_secret=null,$consumer_key=null,$consumer_secret=null,$msg=null){
	require_once APPPATH."libraries/TwitterAPIExchange.php";

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = array(
		'oauth_access_token' => $oauth_access_token,
		'oauth_access_token_secret' => $oauth_access_token_secret,
		'consumer_key' => $consumer_key,
		'consumer_secret' => $consumer_secret
	);

	/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	$url = 'https://api.twitter.com/1.1/statuses/update.json';
	$status = array('status' => $msg);
	$requestMethod = 'POST';
	
	$twitter = new TwitterAPIExchange($settings);
	$send = $twitter->setPostfields($status)
	->buildOauth($url, $requestMethod)
	->performRequest();
	
	if($send){
		return true;
	}else{
		return false;
	}
}

function checkSession($sessName=null){
	$CI =& get_instance();
	
	if(trim($sessName)=="")
		return $CI->session->userdata();
	else 
		return $CI->session->userdata("$sessName");
}

function isLogin(){
	if(checkSession("id")=="")
		return FALSE;
	else
		return TRUE;
}

function isLog(){
	if(checkSession("cms_id")=="")
		return FALSE;
	else
		return TRUE;
}

function escapeStr($str){
	$CI =& get_instance();
	
	return $CI->db->escape_str($str);
}

function postInput($str){
	$CI =& get_instance();
	
	return $CI->input->post("$str");
}

function loadModel($model){
	$CI =& get_instance();
	
	if(is_array($model)){
		foreach ($model as $each){
		loadModel($each);
		}
	}else{	
		return $CI->load->model("$model");
	}
}

function loadLibrary($library){
	$CI =& get_instance();
	
	if(is_array($library)){
		foreach ($library as $each){
			loadLibrary($each);
		}
	}else{	
		return $CI->load->library("$library");
	}
}

function loadView($view,$data=null){
	$CI =& get_instance();
	
	if(is_array($view)){
		foreach ($view as $each){
			loadView($each,$data);
		}
	}else{	
		return $CI->load->view("$view",$data);
	}
}

function getLastId(){
	$CI =& get_instance();
	return $CI->db->insert_id();
}

function setSession($arrayUserData){
	$CI =& get_instance();
	
	return $CI->session->set_userdata($arrayUserData);
}

function sessionValue($sessionName){
	$CI =& get_instance();
	
	return $CI->session->userdata("$sessionName");
}

function ajaxProcessStatus($grid=null,$text="Loading..."){
	$str = "<td colspan='100'>$text</td> />";
	if(trim($grid)==""){
		$str = "<div class='row-fluid'><div class='span12' style='text-align: center;'>$text</div></div>";
	}
	
	return $str;
}

function mysqldatetime(){
	$CI =& get_instance();
	$datestring = "%Y-%m-%d %H:%i:%s";
	$time = time();
	return mdate($datestring, $time);
}

function nama_hari($hari){
	$Hari['Sunday'] = "Minggu";
	$Hari['Monday'] = "Senin";
	$Hari['Tuesday'] = "Selasa";
	$Hari['Wednesday'] = "Rabu";
	$Hari['Thursday'] = "Kamis";
	$Hari['Friday'] = "Jumat";
	$Hari['Saturday'] = "Sabtu";	
	
	echo $Hari[$hari];
}

function nama_bulan($bulan){
	$tmp_bulan['January'] = "Januari";
	$tmp_bulan['February'] = "Februari";
	$tmp_bulan['March'] = "Maret";
	$tmp_bulan['April'] = "April";
	$tmp_bulan['May'] = "Mei";
	$tmp_bulan['June'] = "Juni";
	$tmp_bulan['July'] = "Juli";
	$tmp_bulan['August'] = "Agustus";
	$tmp_bulan['September'] = "September";
	$tmp_bulan['October'] = "Oktober";
	$tmp_bulan['November'] = "November";
	$tmp_bulan['December'] = "Desember";
	
	echo $tmp_bulan[$bulan];
}

function get_yt_subs($username) {

	$xmlData = file_get_contents('http://gdata.youtube.com/feeds/api/users/' . strtolower($username));
	$xmlData = str_replace('yt:', 'yt', $xmlData);

	$xml = new SimpleXMLElement($xmlData);

	$subs = $xml->ytstatistics['subscriberCount'];

	return($subs);

}

function getYouTubeVideoViews($channel, $stat = 'totalUploadViews')
{
	try {
 	   return json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/users/' . $channel . '?v=2&alt=json'))->entry->{'yt$statistics'}->$stat;
	} catch (Exception $e) {
	   return "";
	}
}

function convert_date_to_leter_date($date,$showTime=false){
		$tmp["01"] = "Januari";
		$tmp["02"] = "Februari";
		$tmp["03"] = "Maret";
		$tmp["04"] = "April";
		$tmp["05"] = "Mei";
		$tmp["06"] = "Juni";
		$tmp["07"] = "Juli";
		$tmp["08"] = "Agustus";
		$tmp["09"] = "September";
		$tmp["10"] = "Oktober";
		$tmp["11"] = "November";
		$tmp["12"] = "Desember";
	
		$result = "";
	
		if(empty($date)||$date=='0000-00-00 00:00:00'||$date=='0000-00-00'||$date==NULL)
			return $result = "";
	
		$tmpExp = explode(" ", $date);
		$tmpDate = (!empty($tmpExp[0]))?$tmpExp[0]:"";
		$tmpTime = (!empty($tmpExp[1]))?$tmpExp[1]:"";
	
		$subDate = explode("-", $tmpDate);
		$result = $subDate[2]." ".$tmp[$subDate[1]]." ".$subDate[0];
	
		if($showTime)
			$result .= " ".$tmpTime;
	
		return $result;
	}

function getNewsTagsName($newsID){
	$CI =& get_instance();
	
	$CI->db->select("tag.TAG_NAME");
	$CI->db->join("tag","tag.TAG_ID=news_tag.TAG_ID","INNER");
	$CI->db->where("news_tag.NEWS_ID",$newsID);
	$run = $CI->db->get("news_tag");
	$tags_name = "";
	foreach ($run->result_array() as $tmp){
		$tags_name .= $tmp["TAG_NAME"].", ";
	}
	$tags_name = substr($tags_name, 0, -2);
	return $tags_name;
}

function getArtikelTagsName($newsID){
	$CI =& get_instance();
	
	$CI->db->select("tag.TAG_NAME");
	$CI->db->join("tag","tag.TAG_ID=artikel_tag.TAG_ID","INNER");
	$CI->db->where("artikel_tag.ARTIKEL_ID",$newsID);
	$run = $CI->db->get("artikel_tag");
	$tags_name = "";
	foreach ($run->result_array() as $tmp){
		$tags_name .= $tmp["TAG_NAME"].", ";
	}
	$tags_name = substr($tags_name, 0, -2);
	return $tags_name;
}
