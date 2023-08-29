<?php	
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

if(isset($_SESSION["Ogretmen"])){
	if(($yGelenEmailAdresi!="") and ($yGelenSifre!="") and ($yGelenSifreTekrar!="") and ($yGelenYoneticiAdi!="")){
		if($yGelenSifre!=$yGelenSifreTekrar){
			echo("8");
			header("Location:index.php?SKD=0&SKI=1"); //uyuşmayan şifre
			exit();
		}else{
			if($yGelenSifre == "EskiSifre"){$ySifreDegistirmeDurumu			=	0;
			}else{			$ySifreDegistirmeDurumu			=	1;			}
			if($OgretmenEmailAdresi != $yGelenEmailAdresi){
					  $yKontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogretmen WHERE mail= ?");
					  $yKontrolSorgusu->execute([$yGelenEmailAdresi]);
					  $YoneticiSayisi	=	$yKontrolSorgusu->rowCount(); 
					if($YoneticiSayisi>0){
			header("Location:index.php?SKD=0&SKI=1"); 	exit();					}
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
		$_SESSION["Ogretmen"]	=	$yGelenYoneticiAdi;
			echo("1");
		header("Location:index.php?SKD=0&SKI=1"); //kayıt başarılı
		exit();	}
			else{	header("Location:index.php?SKD=0&SKI=1"); 	exit();   			}
		}
	}
	else{
			header("Location:index.php?SKD=0&SKI=1"); //hata
		exit();
	}
}

if(isset($_SESSION["Yonetici"])){
	if(($yGelenEmailAdresi!="") and ($yGelenSifre!="") and ($yGelenSifreTekrar!="") and ($yGelenYoneticiAdi!="")){
		if($yGelenSifre!=$yGelenSifreTekrar){
			header("Location:index.php?SKD=0&SKI=1"); //uyuşmayan şifre
			exit();
		}else{
			if($yGelenSifre == "EskiSifre"){		$ySifreDegistirmeDurumu			=	0;
			}else{				$ySifreDegistirmeDurumu			=	1;			}
	if($YoneticiEmailAdresi != $yGelenEmailAdresi){
				$yKontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM yonetici WHERE mailAdres = ?");
				$yKontrolSorgusu->execute([$yGelenEmailAdresi]);
				$YoneticiSayisi	=	$yKontrolSorgusu->rowCount(); 
				if($YoneticiSayisi>0){
					header("Location:index.php?SKD=0&SKI=1"); //aynı mailde başka kullanıcı var.
					exit();
				}
			}  
			if($ySifreDegistirmeDurumu == 1){
					$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE yonetici SET ad=?, mailAdres = ?, sifre = ?, telefonumarasi = ? WHERE id = ? LIMIT 1");
					$KullaniciGuncellemeSorgusu->execute([$yGelenYoneticiAdi,$yGelenEmailAdresi, $yMD5liSifre,$yGelenTelefonNumarasi, $YoneticiID]);  
			}
			else{
				$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE yonetici SET ad=?, mailAdres = ?,telefonumarasi=? WHERE id = ? LIMIT 1");
				$KullaniciGuncellemeSorgusu->execute([$yGelenYoneticiAdi,$yGelenEmailAdresi, $yGelenTelefonNumarasi, $YoneticiID]);
			}
			$KayitKontrol		=	$KullaniciGuncellemeSorgusu->rowCount();
	if($KayitKontrol>0){
			$_SESSION["Yonetici"]	=	$yGelenYoneticiAdi;	
		header("Location:index.php?SKD=0&SKI=1"); //kayıt başarılı
		exit();
	}
			else{
			header("Location:index.php?SKD=0&SKI=1"); //hata
				exit();   			}
		}
	}
	else{
			header("Location:index.php?SKD=0&SKI=1"); //hata
		exit();
	}
}else{	header("Location:index.php?SKD=0&SKI=0"); 	exit();}
?>