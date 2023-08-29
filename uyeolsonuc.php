<?php

if(isset($_POST["İsim"])){
	$IsimSoyisim		=	Guvenlik($_POST["İsim"]);
}else{
	$IsimSoyisim		=	"";
}
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
if(($IsimSoyisim!="") and ($GelenSifre!="")){
			$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE IsimSoyisim = ?");
			$KontrolSorgusu->execute([$IsimSoyisim]);
			$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
			
			if($KullaniciSayisi>0){
				header("Location:index.php?SK=3");
				exit();
			}else{
				$UyeEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO ogrenciler (Sifre,md5sifre,IsimSoyisim, Durumu, KayitTarihi, KayitIpAdresi,sinifID) values (?, ?, ?, ?, ?,?,?)");
				$UyeEklemeSorgusu->execute([$GelenSifre, $MD5liSifre,$IsimSoyisim,1,$ZamanDamgasi, $IPAdresi,1]);// sınıfId eklenecek
				$KayitKontrol		=	$UyeEklemeSorgusu->rowCount();
				
				if($KayitKontrol>0){
                    header("Location:index.php?SK=0");
				}else{
					header("Location:index.php?SK=0");
					exit();
				}
            }
}
else{
	header("Location:index.php?SK=3");
	exit();
}
?>