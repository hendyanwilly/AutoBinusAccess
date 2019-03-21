<?php
/* Binus Access Login */
$username = "";
$password = "";

do{
echo "
---------------------------------------------------------------------------------
AutoBinusAccess
Binus Access Auto Connect for Binusian
by willhendyan (willhendyan.lim@gmail.com)
---------------------------------------------------------------------------------
1. Login
2. Logout
Select Features: ";
$menu = trim(fgets(STDIN));
}while($menu!=1 AND $menu!=2);
if($menu==1){
     while(1){
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "http://hotspot.apps.binus.ac.id/login");
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         "Host: hotspot.apps.binus.ac.id",
         "Connection: keep-alive",
         "Content-Length: 119",
         "Cache-Control: max-age=0",
         "Origin: http://hotspot.apps.binus.ac.id/",
         "Upgrade-Insecure-Requests: 1",
         "Content-Type: application/x-www-form-urlencoded",
         "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36",
         "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
         "Referer: http://hotspot.apps.binus.ac.id/login",
         "Accept-Encoding: gzip, deflate",
         "Accept-Language: en-US,en;q=0.9"
                             ));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, "dst=http%3A%2F%2Fwww.msftconnecttest.com%2Fredirect&popup=true&username=$username&password=$password&x=51&y=14");
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     $result = curl_exec($ch);
     curl_close($ch);
 
     if(strpos($result, "You are logged in") == true){
         echo "[Message] You are logged in as $username";
         break;
     }else if(strpos($result, "RADIUS server") == true){
         echo "[Message] RADIUS server is not responding!\n";
     }else{
         echo "[Message] Failed to connect!\n";   
     }
     }
}else if($menu==2){
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "http://hotspot.apps.binus.ac.id/logout");
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         "Host: hotspot.apps.binus.ac.id",
         "Connection: keep-alive",
         "Cache-Control: max-age=0",
         "Upgrade-Insecure-Requests: 1",
         "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36",
         "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
         "Accept-Encoding: gzip, deflate",
         "Accept-Language: en-US,en;q=0.9"
                             ));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     $result = curl_exec($ch);
     curl_close($ch);
 
     if(strpos($result, "you have just logged out") == true){
         echo "[Message] You have just logged out.";
     }else{
         echo "[Message] You are not logged in.";   
     }
}
?>