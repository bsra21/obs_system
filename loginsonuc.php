<?php

if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}

if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}

$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE IsimSoyisim = ? AND md5sifre = ? AND SilinmeDurumu = ?");
	$KontrolSorgusu->execute([$GelenEmailAdresi, $MD5liSifre, 0]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){
		if($KullaniciKaydi["Durumu"]==1){
			$_SESSION["Kullanici"]	=	$GelenEmailAdresi;
			
			if($_SESSION["Kullanici"]==$GelenEmailAdresi){
				header("Location:ogrenci.php"); //girdi
				exit();
			}else{
				header("Location:index.php"); //hata
				exit();
			}
		}
        else{
				echo("Aktivasyon onay gerek..");
		}
    }
else{
    header("Location:index.php");
}

}
?>