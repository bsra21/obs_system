<?php
if(isset($_SESSION["Ogretmen"])){

	if(isset($_POST["yEmailAdresi"])){
		$yGelenEmailAdresi		=	Guvenlik($_POST["yEmailAdresi"]);
	}else{		$yGelenEmailAdresi		=	"";	}
	if(isset($_POST["yTelefonNumarasi"])){
		$yGelenTelefonNumarasi	=	Guvenlik($_POST["yTelefonNumarasi"]);
	}else{		$yGelenTelefonNumarasi		=	"";	}
	if(isset($_POST["yYoneticiAdi"])){
		$yGelenYoneticiAdi		=	Guvenlik($_POST["yYoneticiAdi"]);
	}else{		$yGelenYoneticiAdi	=	"";	}
	if(isset($_POST["ySifre"])){
		$yGelenSifre				=	Guvenlik($_POST["ySifre"]);
	}else{		$yGelenSifre				=	"";	}
	if(isset($_POST["ySifreTekrar"])){
		$yGelenSifreTekrar		=	Guvenlik($_POST["ySifreTekrar"]);
	}else{		$yGelenSifreTekrar		=	"";	}
	$yMD5liSifre					=	md5($yGelenSifre);
	
	if(($yGelenEmailAdresi!="") and ($yGelenSifre!="") and ($yGelenSifreTekrar!="") and ($yGelenYoneticiAdi!="")){
		if($yGelenSifre!=$yGelenSifreTekrar){

			header("Location:index.php?SKD=0&SKI=1"); //uyuşmayan şifre
			exit();
		}else{
			if($yGelenSifre == "EskiSifre"){
				$ySifreDegistirmeDurumu			=	0;
			}else{
				$ySifreDegistirmeDurumu			=	1;
			}

			if($OgretmenEmailAdresi != $yGelenEmailAdresi){
					  $yKontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogretmen WHERE mail= ?");
					  $yKontrolSorgusu->execute([$yGelenEmailAdresi]);
					  $YoneticiSayisi	=	$yKontrolSorgusu->rowCount(); 
					if($YoneticiSayisi>0){
			
				header("Location:index.php?SKD=0&SKI=1"); //aynı mailde başka kullanıcı var.
						exit();
					}
				}
		


			if($ySifreDegistirmeDurumu == 1){
						
			
					$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE ogretmen SET ad=?,  sifre = ?,mail = ?, telefonumarasi = ? WHERE id = ? LIMIT 1");
					$KullaniciGuncellemeSorgusu->execute([$yGelenYoneticiAdi,$yMD5liSifre,$yGelenEmailAdresi, $yGelenTelefonNumarasi, $OgretmenID]);  
			}
			else{
		
					$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE ogretmen SET ad=?,mail = ?, telefonumarasi = ? WHERE id = ? LIMIT 1");
					$KullaniciGuncellemeSorgusu->execute([$yGelenYoneticiAdi,$yGelenEmailAdresi,$yGelenTelefonNumarasi, $OgretmenID]);  
		
			}
			$KayitKontrol		=	$KullaniciGuncellemeSorgusu->rowCount();

	if($KayitKontrol>0){
	
			$_SESSION["Ogretmen"]	=	$yGelenEmailAdresi;	

		header("Location:index.php?SKD=0&SKI=1"); //kayıt başarılı
		exit();
	}
			else{
			header("Location:index.php?SKD=0&SKI=1"); //hata
		//	echo("1");
				exit();   			}
			
		}
	}
	else{
			header("Location:index.php?SKD=0&SKI=1"); //hata
//echo("2");
		exit();
	}
}else{
	header("Location:index.php?SKD=0&SKI=0"); //eksik alan
	exit();
}
?>