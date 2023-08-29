<?php
if(isset($_SESSION["Kullanici"])){

	if(isset($_POST["EmailAdresi"])){
		$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
	}else{
		$GelenEmailAdresi		=	"";
	}
	if(isset($_POST["TelefonNumarasi"])){
		$GelenTelefonNumarasi	=	Guvenlik($_POST["TelefonNumarasi"]);
	}else{
		$GelenTelefonNumarasi		=	"";
	}

	if(isset($_POST["Sifre"])){
		$GelenSifre				=	Guvenlik($_POST["Sifre"]);
	}else{
		$GelenSifre				=	"";
	}
	if(isset($_POST["SifreTekrar"])){
		$GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
	}else{
		$GelenSifreTekrar		=	"";
	}
	
	$MD5liSifre					=	md5($GelenSifre);
	
	if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenTelefonNumarasi!="")){
		if($GelenSifre!=$GelenSifreTekrar){
			header("Location:ogrenci.php?SK=9"); //uyuşmayan şifre
			exit();
		}else{
			if($GelenSifre == "EskiSifre"){
				$SifreDegistirmeDurumu			=	0;
			}else{
				$SifreDegistirmeDurumu			=	1;
			}
	
			if($EmailAdresi != $GelenEmailAdresi){
				$yKontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE EmailAdresi = ?");
				$yKontrolSorgusu->execute([$GelenEmailAdresi]);
				$KullaniciSayisi	=	$yKontrolSorgusu->rowCount();

				if($KullaniciSayisi>0){
					header("Location:ogrenci.php?SK=6"); //aynı mailde başka kullanıcı var.
					exit();
				}
			}
	
			if($SifreDegistirmeDurumu == 1){
				$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET EmailAdresi = ?, Sifre = ?, TelefonNumarasi = ? WHERE id = ? LIMIT 1");
				$KullaniciGuncellemeSorgusu->execute([$GelenEmailAdresi, $MD5liSifre,$GelenTelefonNumarasi, $KullaniciID]);
			}else{
				$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET EmailAdresi = ?,TelefonNumarasi=? WHERE id = ? LIMIT 1");
				$KullaniciGuncellemeSorgusu->execute([$GelenEmailAdresi,$GelenTelefonNumarasi, $KullaniciID]);
			}
			
			$KayitKontrol		=	$KullaniciGuncellemeSorgusu->rowCount();

			if($KayitKontrol>0){
				$_SESSION["Kullanici"]	=	$GelenEmailAdresi;
				
				header("Location:ogrenci.php?SK=9"); //kayıt başarılı
				exit();
			}else{
				header("Location:ogrenci.php?SK=9"); //hata
				exit();
			}
		}
	}else{
		header("Location:ogrenci.php?SK=9"); //hata
        
		exit();
	}
}else{
	header("Location:ogrenci.php"); //eksik alan
	exit();
}
?>