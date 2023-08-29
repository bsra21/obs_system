<?php
session_start(); ob_start();
//unset($_SESSION["Yonetici"]);unset($_SESSION["Kullanici"]);
//session_destroy();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");

if(isset($_REQUEST["SK"])){
	$SayfaKoduDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SK"]);
}else{
	$SayfaKoduDegeri	=	0;
}

if(isset($_REQUEST["SYF"])){
	$Sayfalama			=	SayiliIcerikleriFiltrele($_REQUEST["SYF"]);
}else{
	$Sayfalama			=	1;
}

$MenulerSorgusu		=	$VeritabaniBaglantisi->prepare("select * from slider");
$MenulerSorgusu->execute();
$MenuKayitSayisi	=	$MenulerSorgusu->rowCount();
$MenuKayitlari		=	$MenulerSorgusu->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
					
					if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="") or ($SayfaKoduDegeri==0)){
						include($Sayfa[0]);
					}else{
						include($Sayfa[$SayfaKoduDegeri]);
					}
					?>




