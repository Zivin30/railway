<?php
const
p = "\033[1;97m",
m = "\033[1;31m",
h = "\033[01;38;5;35m",
k = "\033[1;33m",
c = "\033[1;36m",
b = "\033[1;34m",
mp = "\033[101m\033[1;37m",
o = "\033[01;38;5;214m",
d = "\033[0m",
t = "\t",
n = "\n",
r = "\r                                   \r",
Error= h." [".p."Error | 0".h."]",
name = "xxxx",
version = "xxxx",
cook = "cookie.".name,
user = "user-agent";

Function Menu_Api(){
    apikey:
    cl();
    ban();
    print n;
    print k." Menu Apikey".n.n;
    print NoLi(1,"Multibot").n;
    print NoLi(2,"Xevil").n.n;
    print k." No-Apikey".n.n;
    print NoLi(3,"Free".n.n);
    $pilih =readline(p." Input : ");
    if($pilih == 2){
        define("api_url","http://sctg.xyz");
        SaveXevil("ApikeyXevil");
        define("apikey",file_get_contents("ApikeyXevil"));
    }elseif($pilih == 1){
        define("api_url","http://api.multibot.in");
        Save("ApikeyMulti");
        define("apikey",file_get_contents("ApikeyMulti"));
    }elseif($pilih == 3){

    }
     else{
        print m."Bad Number";sleep(3);goto apikey;
    }
  }
Function cl(){if(PHP_OS_FAMILY == "Linux" ){system('clear');}else{pclose(popen('cls','w'));}}
Function Line($len = 65){print p.str_repeat('─',$len).n;}
Function NoLi($no,$menu){return  h." [".p.$no.h."] ".p.$menu;}
Function Api_Bal(){$r = json_decode(file_get_contents(api_url."/res.php?action=userinfo&key=".apikey),1);if(!$r["balance"]){Error;}return $r["balance"];}
Function Ambil($res,$depan,$belakang,$nomor){$data=explode($belakang,explode($depan,$res)[$nomor])[0];return $data;}
Function ip(){$r = json_decode(file_get_contents("http://ip-api.com/json"));return $r;}
Function Save($namaData){
    if(file_exists($namaData)){
        $data = file_get_contents($namaData);
    }else{
        $data = readline('Input '.$namaData.' : ');
        file_put_contents($namaData, $data);
    }
    return $data;
}
Function SaveXevil($namaData){
    if(file_exists($namaData)){
        $data = file_get_contents($namaData);
    }else{
        $data = readline('Input '.$namaData.' : ');
        file_put_contents($namaData, $data."|SOFTID1926406083");
    }
    return $data;
}
Function res_api($id){$delay=7;while(true){load();$r = json_decode(file_get_contents(api_url."/res.php?key=".apikey."&action=get&id=".$id."&json=1"),1);$status = $r["status"];if($r["request"] == "CAPCHA_NOT_READY"){print r;load();sleep($delay);print r;continue;}if($status == 1){print r;print bps_cap();return $r["request"];}return 0;}}
Function bps_cap(){
    print r;
    print p." Bypass captcha [".h." √ ".p."]";
    sleep(1);
    print r;
}
Function msg($str, $j = 15){
    $simbol = ['-', '\\', '|', '/'];
    for($i = $j; $i > 0; $i--){
        foreach($simbol as $n => $s){
            print p." [".k.$s.p."] ".p.$str." ".m.str_repeat(".", $n)."\r";
            usleep(100000);
        }
    }
    print "                                \r";
}
function Tmr($tmr){
    date_default_timezone_set("UTC");
    $sym = [' . ',' .. ',' ... ',' .... ',];
    $timr = time()+$tmr;
    $a = 0;
    while(true){
        $a +=1;$res=$timr-time();
        if($res < 1) {break;}
        print k." Wait".p." [ ".date('H',$res).":".p.date('i',$res).":".p.date('s',$res)." ] ".h.$sym[$a % 4]."\r";
        usleep(300000);
    }
    print r;
}
function load(){
    print r;
    print p." Bypass captcha [".h.".  ".p."]";
    sleep(1);
    print r;
    print p." Bypass captcha [".h.".. ".p."]";
    sleep(1);
    print r;
    print p." Bypass captcha [".h."...".p."]";
    sleep(1);
}
print ban();
function ban(){
    $r = ip();
    $cou = $r->country;
    $cit = $r->city;
    $que = $r->query;
    $isp = $r->isp;
    line();
    print $r = p." $cou │ ".o."IP: $que ".p."│ $isp".n;
    line();
    print p." ┌─┐┌┐ ┌──┬──┐ Script : ".name.n;
    print p." ┌─┘├┴┐┌─┐│    version: ".version.n;
    print p." └─┘└─┘└─┘┴    Channel: ".h."https://t.me/official_zerobot ".n;
    line().n;
}
function widgetId(){
    $uuid = '';
    for ($n = 0; $n < 32; $n++){
        if ($n == 8 || $n == 12 || $n == 16 || $n == 20){
            $uuid .= '-';
        }
        $e = mt_rand(0, 15);
        if ($n == 12){$e = 4;}
        elseif ($n == 16){
            $e = ($e & 0x3) | 0x8;
        }
        $uuid .= dechex($e);
    }
    return $uuid;
}
function icaptcha($token,$theme,$icon_path){
    $h = h();
	$h[] = "origin: ".host;
	$h[] = "x-iconcaptcha-token: ".$token;
	$h[] = "x-requested-with: XMLHttpRequest";
	$ts = round(microtime(true) * 1000);
	$its= $ts - 2000;
	$wid = widgetId();
	$data = ["payload" => 
		base64_encode(json_encode([
		    "widgetId"	=> $wid,
			"action" 	=> "LOAD",
			"theme" 	=> $theme,
			"token" 	=> $token,
			"timestamp"	=> $ts,
			"initTimestamp"	=> $its
		]))
	];
	print r;
	print(' Bypass captcha ['.h.'.  '.p.']');
	sleep(1);
	$r = json_decode(base64_decode(Bypass(host.$icon_path,$h,$data)),1);
	$b64i = $r["challenge"];
	$chID = $r["identifier"];
	$ts = round(microtime(true) * 1000);
	$its = $ts - 2000;
	$data = ["payload" => 
		base64_encode(json_encode([
			"widgetId"		=> $wid,
			"challengeId"	=> $chID,
			"action"		=> "SELECTION",
			"x"				=> 160,
			"y"				=> 24,
			"width"			=> 320,
			"token" 		=> $token,
			"timestamp"		=> $ts,
			"initTimestamp"	=> $its
		]))
	];
	print r;
	print(' Bypass captcha ['.h.'.. '.p.']');
	sleep(2);
	$r = json_decode(base64_decode(Bypass(host.$icon_path,$h,$data)),1);
	if(!$r['completed'])return;
	print r;
	print(' Bypass captcha ['.h.'...'.p.']');
	sleep(1);
	print r;
	$data = [];
	$data['ic-rq']=1;
	$data['ic-wid'] = $wid;
	$data['ic-cid'] = $chID;
	$data['ic-hp'] = '';
	return $data;
}
function captcha_emot(){
    $rs= [];
    $h = [
        "cookie: ".save(cook),
	    "user-agent: ".save(user),
	    "x-requested-with: XMLHttpRequest"
	    ];
	emot:
	$r = json_decode(Bypass(host."ecaptcha/get_token",$h),1);
	print r;
	print p." Bypass captcha [".h.".  ".p."]";
	sleep(0.5);
	if(!$r["token"]){
	    exit(h." [".k."Captcha:: ".p."token expired".n);
	}
	$rs["captcha_token"] = $r["token"];
    $r = json_decode(Bypass(host."ecaptcha/get_captcha",$h),1);
    $rs["captcha_key"] = $r["captcha_key"];
    print r;
	print p." Bypass captcha [".h.".. ".p."]";
	sleep(0.5);
	$ques = strtolower(trim(explode(':', $r["question"])[1]));
	$data = http_build_query([
		"selected" => "$ques.gif",
		"key"	=> $rs["captcha_key"],
		"token"	=> $rs["captcha_token"]
	]);
	$r = json_decode(Bypass(host."ecaptcha/validate_icon",$h, $data),1);
	print r;
	print p." Bypass captcha [".h."...".p."]";
	sleep(0.5);
	print r;
	print p." Bypass success [".h." √ ".p."]";
	sleep(1);
	print r;
	if($r["status"] == "valid"){
		$rs["captcha"] = "emoji_captcha";
		$rs["selected_icon"] = "$ques.gif";
		return $rs;
	}
	goto emot;
}
function captcha($source,$pageurl){
    if(preg_match('/data-sitekey="/',$source)){
      $sitekey= Ambil($source,'data-sitekey="','"',1);
    }elseif(preg_match("/data-sitekey='/",$source)){
        $sitekey= Ambil($source,"data-sitekey='","'",1);
    }elseif(preg_match("/const siteKey/",$source)){
        $sitekey= Ambil($source,"const siteKey = '","'",1);
    }elseif(preg_match("/const sitekey/",$source)){
        $sitekey= Ambil($source,"const siteKey = '","'",1);
    }else{
        print ("sitekey Error");
        sleep(2);
        print r;
    }
    $captcha = Ambil($source,'id="selectCaptcha" name="captcha"><option value="','">',1);
    
    if($captcha == "recaptchav2"){
        $method = "userrecaptcha&googlekey="; goto gas;
    }
    if($captcha == "hcaptcha"){
        $method = "hcaptcha&sitekey="; goto gas;
    }
    if($captcha == "turnstile"){
        $method = "turnstile&sitekey="; goto gas;
    }
    if($captcha == "authkong"){
        $method = "authkong&sitekey="; goto gas;
    }
    gas:
    $r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=".$method.$sitekey."&pageurl=".$pageurl."&json=1"),1);
    $status = $r["status"];
    if($status == 0){Error;return 0;}
    $id = $r["request"];
    return res_api($id);
    Err:
}
function Bypass($url, $headers, $data = 0) {
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
    if ($data){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_COOKIE,TRUE);
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}