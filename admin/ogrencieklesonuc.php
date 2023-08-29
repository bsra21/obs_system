<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){  //

	if (isset($_POST['ogrekle'])) {
	if(isset($_POST["mail"])){		$Gelenmail		=	Guvenlik($_POST["mail"]);
	}else{		$Gelenmail	=	"";	}
	if(isset($_POST["sifre"])){		$Gelensifre		=	Guvenlik($_POST["sifre"]);
	}else{		$Gelensifre		=	"";	}
    if(isset($_POST["isim"])){		$Gelenisim	=	Guvenlik($_POST["isim"]);
	}else{		$Gelenisim		=	"";	}
    if(isset($_POST["telno"])){		$Gelentelno		=	Guvenlik($_POST["telno"]);
	}else{		$Gelentelno		=	"";	}
    if(isset($_POST["ogrno"])){		$Gelenogrno	=	Guvenlik($_POST["ogrno"]);
	}else{		$Gelenogrno	=	"";	}
    if(isset($_POST["cins"])){		$Gelencins	=	Guvenlik($_POST["cins"]);
	}else{		$Gelencins		=	"";	}
    if(isset($_POST["kimlik"])){		$Gelenkimlik	=	Guvenlik($_POST["kimlik"]);
	}else{		$Gelenkimlik		=	"";	} //kayıt tarihini de unutma
    if(isset($_POST["sinif"])){		$Gelensinif	=	Guvenlik($_POST["sinif"]);
	}else{		$Gelensinif		=	"";	}
$MD5liSifre					=	md5($Gelensifre);
	if(($Gelenisim!="") and ($Gelensinif!="") and ($Gelensifre!="") and ($Gelencins!="") and ($Gelenogrno!="")){	 //$ZamanDamgasi, $IPAdresi
		$IcerikEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO ogrenciler (EmailAdresi,Sifre,md5sifre,IsimSoyisim,TelefonNumarasi,Cinsiyet,Durumu,SilinmeDurumu,KayitTarihi,ogrenciNumarasi,TCKimlik,KayitIpAdresi,sinifID) 
        values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$IcerikEklemeSorgusu->execute([$Gelenmail,$Gelensifre,$MD5liSifre,$Gelenisim,$Gelentelno,$Gelencins,1,0,$ZamanDamgasi,$Gelenogrno,$Gelenkimlik,$IPAdresi,$Gelensinif]);
		$IcerikEklemeKontrol		=	$IcerikEklemeSorgusu->rowCount();

		if($IcerikEklemeKontrol>0){
			header("Location:index.php?SKD=0&SKI=16"); //başarılı
			exit();
		}else{
			header("Location:index.php?SKD=0&SKI=34"); //hatalı
			exit(); 
		}
	}else{
		header("Location:index.php?SKD=0&SKI=34");
		exit();
	}}
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>