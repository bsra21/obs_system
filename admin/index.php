<?php
session_start(); ob_start();
/*unset($_SESSION["Yonetici"]) ;
unset($_SESSION["Ogretmen"]) ;
session_destroy();*/
require_once("../Ayarlar/ayar.php");
require_once("../Ayarlar/fonksiyonlar.php");
require_once("../Frameworks/Verot/src/class.upload.php");
require_once("../Ayarlar/yonetimsayfalariic.php");
require_once("../Ayarlar/yonetimsayfalaridis.php");
require_once("../Ayarlar/sayfacikti.php");

if(isset($_REQUEST["SKD"])){
	$DisSayfaKoduDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SKD"]);
}else{
	$DisSayfaKoduDegeri	=	0;
}

if(isset($_REQUEST["SKI"])){
	$IcSayfaKoduDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SKI"]);
}else{
	$IcSayfaKoduDegeri	=	0;
}
if(isset($_REQUEST["SC"])){
	$SayfaCiktiDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SC"]);
}else{
	$SayfaCiktiDegeri	=	0;
}

if(isset($_REQUEST["SYF"])){
	$Sayfalama			=	SayiliIcerikleriFiltrele($_REQUEST["SYF"]);
}else{
	$Sayfalama			=	1;
}
            //      
if( ((empty($_SESSION["Yonetici"])) and empty($_SESSION["Ogretmen"]))){
	if((!$DisSayfaKoduDegeri) or ($DisSayfaKoduDegeri=="") or ($DisSayfaKoduDegeri==0)){
		include($SayfaDis[1]);  //yonetici giriş sayfası
	}else{
		include($SayfaDis[$DisSayfaKoduDegeri]);
	}					
}else{
	if((!$DisSayfaKoduDegeri) or ($DisSayfaKoduDegeri=="") or ($DisSayfaKoduDegeri==0)){
		include($SayfaDis[0]); //admin anasayfası
	}else{
		include($SayfaDis[$DisSayfaKoduDegeri]);
	}					
}


$VeritabaniBaglantisi	=	null;
ob_end_flush();
?>