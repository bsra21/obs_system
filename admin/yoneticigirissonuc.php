<?php
if(empty($_SESSION["Yonetici"]) || (empty($_SESSION["Ogretmen"]))){
	
	if(isset($_POST["YKullanici"])){
		$GelenYKullanici		=	Guvenlik($_POST["YKullanici"]);
	}else{
		$GelenYKullanici		=	"";
	}
	if(isset($_POST["YSifre"])){
		$GelenYSifre			=	Guvenlik($_POST["YSifre"]);
	}else{
		$GelenYSifre			=	"";
	}

	$MD5liSifre					=	md5($GelenYSifre);

	if(($GelenYKullanici!="") and ($GelenYSifre!="")){
		$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM yonetici WHERE ad = ? AND sifre = ?");
		$KontrolSorgusu->execute([$GelenYKullanici, $MD5liSifre]);
		$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
		$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
		
$KontrolSorgusu1		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogretmen WHERE ad = ? AND sifre = ?");
			$KontrolSorgusu1->execute([$GelenYKullanici, $MD5liSifre]);
			$KullaniciSayisi1	=	$KontrolSorgusu1->rowCount();
			$KullaniciKaydi1		=	$KontrolSorgusu1->fetch(PDO::FETCH_ASSOC);
		if($KullaniciSayisi>0){
			$_SESSION["Yonetici"]	=	$GelenYKullanici;
				
			header("Location:index.php?SKD=0&SKI=0"); //giriş başarılı
			exit();
		}	
			if($KullaniciSayisi1>0){
				$_SESSION["Ogretmen"]	=	$GelenYKullanici;
					
				header("Location:index.php?SKD=0&SKI=0"); //giriş başarılı
				exit();
			}
		else{
			header("Location:index.php?SKD=3"); //hata
			exit();
		}
	}else{
		header("Location:index.php?SKD=3"); //giriş sayfası
		exit();
	}
}else{
	header("Location:index.php?SKD=1"); //index
	exit();
}



?>