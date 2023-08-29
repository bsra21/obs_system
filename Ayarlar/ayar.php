<?php
try{
	$VeritabaniBaglantisi	=	new PDO("mysql:host=localhost;dbname=obsistem;charset=UTF8", "root", "");
}catch(PDOException $Hata){
	//echo "Bağlantı Hatası<br />" . $Hata->getMessage(); // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
	die();
}
/**/
$AyarlarSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ayarlar LIMIT 1");
$AyarlarSorgusu->execute();
$AyarSayisi			=	$AyarlarSorgusu->rowCount();
$Ayarlar			=	$AyarlarSorgusu->fetch(PDO::FETCH_ASSOC);


if($AyarSayisi>0){ //SİTE GENEL BİLGİLENDİRMELER   İSİM-LOGO-MEDYA LİNK-ANAHTARKELİMELER
	$SiteAdi				=	$Ayarlar["SiteAdi"];
	$SiteTitle				=	$Ayarlar["SiteTitle"];
	$SiteDescription		=	$Ayarlar["SiteDescription"];
	$SiteKeywords			=	$Ayarlar["SiteKeywords"];
	$SiteCopyrightMetni		=	$Ayarlar["SiteCopyrightMetni"];
	$SiteLogosu				=	$Ayarlar["SiteLogosu"];
	$SiteLinki				=	$Ayarlar["SiteLinki"];
	$SiteEmailAdresi		=	$Ayarlar["SiteEmailAdresi"];
	$SiteEmailSifresi		=	$Ayarlar["SiteEmailSifresi"];
	$SiteEmailHostAdresi	=	$Ayarlar["SiteEmailHostAdresi"];	
	$SosyalLinkFacebook		=	$Ayarlar["SosyalLinkFacebook"];
	$SosyalLinkTwitter		=	$Ayarlar["SosyalLinkTwitter"];
	$SosyalLinkLinkedin		=	$Ayarlar["SosyalLinkLinkedin"];
	$SosyalLinkInstagram	=	$Ayarlar["SosyalLinkInstagram"];
	$SosyalLinkPinterest	=	$Ayarlar["SosyalLinkPinterest"];
	$SosyalLinkYouTube		=	$Ayarlar["SosyalLinkYouTube"];
	$DolarKuru				=	$Ayarlar["DolarKuru"];
	$EuroKuru				=	$Ayarlar["EuroKuru"];
	$UcretsizKargoBaraji	=	$Ayarlar["UcretsizKargoBaraji"];
	$ClientID				=	$Ayarlar["ClientID"];	
	$StoreKey				=	$Ayarlar["StoreKey"];	
	$ApiKullanicisi			=	$Ayarlar["ApiKullanicisi"];	
	$ApiSifresi				=	$Ayarlar["ApiSifresi"];	
}else{
	//echo "Site Ayar Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
	die();
}
/* */
if(isset($_SESSION["Kullanici"])){ //KULLANICI GİRİŞİ SORGU
	$KullaniciSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE IsimSoyisim = ? LIMIT 1");
	$KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
	$KullaniciSayisi		=	$KullaniciSorgusu->rowCount();
	$Kullanici				=	$KullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){            //KULLANICI GİRİŞİ BİLGİLERİ
		$KullaniciID		=	$Kullanici["id"];
		$EmailAdresi		=	$Kullanici["EmailAdresi"];
		$Sifre				=	$Kullanici["Sifre"];
		$IsimSoyisim		=	$Kullanici["IsimSoyisim"];
		$TelefonNumarasi	=	$Kullanici["TelefonNumarasi"];
		$Cinsiyet			=	$Kullanici["Cinsiyet"];
		$Durumu				=	$Kullanici["Durumu"];
		$KayitTarihi		=	$Kullanici["KayitTarihi"];
		$KayitIpAdresi		=	$Kullanici["KayitIpAdresi"];
		$KullanicisinifID	=	$Kullanici["sinifID"];
	}else{
	//	echo "Kullanıcı Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
}

/*  //$YoneticiIsimSoyisim		=	$Yonetici["ad"];   */  
if(isset($_SESSION["Yonetici"])){ //YÖNETİCİ GİRİŞİ
	$YoneticiSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM yonetici WHERE ad = ?");
	$YoneticiSorgusu->execute([$_SESSION["Yonetici"]]);
	$YoneticiSayisi			=	$YoneticiSorgusu->rowCount();
	$Yonetici				=	$YoneticiSorgusu->fetch(PDO::FETCH_ASSOC);

	if($YoneticiSayisi>0){
		$YoneticiID					=	$Yonetici["id"];
		$YoneticiKullaniciAdi		=	$Yonetici["ad"];
		$YoneticiEmailAdresi		=	$Yonetici["mailAdres"]; 
		$YoneticiSifre				=	$Yonetici["sifre"];
        $YoneticiTelefonNumarasi	=	$Yonetici["telefonumarasi"];
	}else{
		echo "Yonetici Sorgusu Hatalı";
		die();
	}
}

/* */
if(isset($_SESSION["Ogretmen"])){ //YÖNETİCİ GİRİŞİ
	$OgretmenSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogretmen WHERE ad = ?");
	$OgretmenSorgusu->execute([$_SESSION["Ogretmen"]]);
	$OgretmenSayisi			=	$OgretmenSorgusu->rowCount();
	$Ogretmen				=	$OgretmenSorgusu->fetch(PDO::FETCH_ASSOC);

	if($OgretmenSayisi>0){
		$OgretmenID					=	$Ogretmen["id"];
		$OgretmenKullaniciAdi		=	$Ogretmen["ad"];
		$OgretmenEmailAdresi		=	$Ogretmen["mail"]; 
		$OgretmenSifre				=	$Ogretmen["sifre"];
        $OgretmenTelefonNumarasi	=	$Ogretmen["telefonumarasi"];
		$OgretmenDersID				=	$Ogretmen["dersid"]; 
		$Ogretmensinif1			    =	$Ogretmen["sinifid1"]; 
		$Ogretmensinif2				=	$Ogretmen["sinifid2"]; 
		$Ogretmensinif3				=	$Ogretmen["sinifid3"]; 
		$Ogretmensinif4				=	$Ogretmen["sinifid4"]; 
		$Ogretmensinif5				=	$Ogretmen["sinifid5"]; 

//sinifid1 ,sinifid2    sinifid3	 sinifid4	  sinifid5
	}else{
		echo "Ogretmen Sorgusu Hatalı";
		die();
	}
}


?>
