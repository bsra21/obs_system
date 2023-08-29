<?php
$IPAdresi				=	$_SERVER["REMOTE_ADDR"];
$ZamanDamgasi			=	time();
$TarihSaat				=	date("d.m.Y H:i:s", $ZamanDamgasi);
$SiteKokDizini			=	$_SERVER["DOCUMENT_ROOT"];
$ResimKlasoruYolu		=	"/img/";
$VerotIcinKlasorYolu	=	$SiteKokDizini.$ResimKlasoruYolu;

function TarihBul($Deger){
	$Cevir				=	date("d.m.Y ", $Deger); //H:i:s
	$Sonuc				=	$Cevir;     
	return $Sonuc;
}

function UcGunIleriTarihBul(){
	global $ZamanDamgasi;
	$BirGun				=	86400;
	$Hesapla			=	$ZamanDamgasi+(3*$BirGun);
	$Cevir				=	date("d.m.Y", $Hesapla);
	$Sonuc				=	$Cevir;
	return $Sonuc;
}

function RakamlarHaricTumKarakterleriSil($Deger){
	$Islem				=	preg_replace("/[^0-9]/", "", $Deger);
	$Sonuc				=	$Islem;
	return $Sonuc;
}

function TumBosluklariSil($Deger){ //iban no yazılırken boşluklar sıkıntı olmasın
	$Islem				=	preg_replace("/\s|&nbsp;/", "", $Deger);
	$Sonuc				=	$Islem;
	return $Sonuc;
}

function DonusumleriGeriDondur($Deger){
	$GeriDondur			=	htmlspecialchars_decode($Deger, ENT_QUOTES);
	$Sonuc				=	$GeriDondur;
	return $Sonuc;
}

function Guvenlik($Deger){  //ilk bu fonksiyonu yazdı. Boşluk ve tagları silme
	$BoslukSil			=	trim($Deger);
	$TaglariTemizle		=	strip_tags($BoslukSil);
	$EtkisizYap			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	$Sonuc				=	$EtkisizYap;
	return $Sonuc;
}

function SayiliIcerikleriFiltrele($Deger){ //filtreleme fonksiyonu.
	$BoslukSil			=	trim($Deger); //urlde yazılan SK=32 gibi değeri sadece 32 olarak gözüksün gibiisnden
	$TaglariTemizle		=	strip_tags($BoslukSil);
	$EtkisizYap			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	$Temizle			=	RakamlarHaricTumKarakterleriSil($EtkisizYap);
	$Sonuc				=	$Temizle; //RakamlarHaricTumKarakterleriSil yukarıda function var
	return $Sonuc;
}

function ResimAdiOlustur(){
	$Sonuc			=	substr(md5(uniqid(time())), 0, 25);
	return $Sonuc;
}

/* 
function guvenlik($gelen){
	$giden = addslashes($gelen);
	$giden = htmlspecialchars($giden);
	$giden = htmlentities($giden);
	$giden = strip_tags($giden);
	return $giden;
};*/

function fnk(){
	echo "<script language=javascript>document.write(unescape('%3C%66%6F%6F%74%65%72%20%63%6C%61%73%73%3D%22%73%74%69%63%6B%79%2D%66%6F%6F%74%65%72%20%62%67%2D%77%68%69%74%65%22%3E%0A%09%3C%64%69%76%20%63%6C%61%73%73%3D%22%63%6F%6E%74%61%69%6E%65%72%20%6D%79%2D%61%75%74%6F%22%3E%0A%09%09%3C%64%69%76%20%63%6C%61%73%73%3D%22%63%6F%70%79%72%69%67%68%74%20%74%65%78%74%2D%63%65%6E%74%65%72%20%6D%79%2D%61%75%74%6F%22%3E%0A%09%09%09%3C%73%70%61%6E%3E%43%6F%70%79%72%69%67%68%74%20%26%63%6F%70%79%3B%20%3C%61%20%68%72%65%66%3D%22%26%23%31%30%34%3B%26%23%31%31%36%3B%26%23%31%31%36%3B%26%23%31%31%32%3B%26%23%31%31%35%3B%26%23%35%38%3B%26%23%34%37%3B%26%23%34%37%3B%26%23%31%31%39%3B%26%23%31%31%39%3B%26%23%31%31%39%3B%26%23%34%36%3B%26%23%39%37%3B%26%23%31%30%37%3B%26%23%31%31%35%3B%26%23%31%31%31%3B%26%23%31%32%31%3B%26%23%31%30%34%3B%26%23%31%30%38%3B%26%23%39%39%3B%26%23%34%36%3B%26%23%31%31%30%3B%26%23%31%30%31%3B%26%23%31%31%36%3B%22%3E%26%23%36%35%3B%26%23%31%30%37%3B%26%23%31%31%35%3B%26%23%31%31%31%3B%26%23%31%32%31%3B%26%23%31%30%34%3B%26%23%31%30%38%3B%26%23%39%39%3B%3C%2F%61%3E%20%26%23%33%30%34%3B%26%23%33%35%31%3B%26%23%34%35%3B%26%23%38%30%3B%26%23%31%31%34%3B%26%23%31%31%31%3B%26%23%31%30%36%3B%26%23%31%30%31%3B%26%23%33%32%3B%26%23%38%34%3B%26%23%39%37%3B%26%23%31%30%37%3B%26%23%31%30%35%3B%26%23%31%31%32%3B%26%23%33%32%3B%26%23%38%33%3B%26%23%39%39%3B%26%23%31%31%34%3B%26%23%31%30%35%3B%26%23%31%31%32%3B%26%23%31%31%36%3B%26%23%31%30%35%3B%3C%2F%73%70%61%6E%3E%0A%09%09%3C%2F%64%69%76%3E%0A%09%3C%2F%64%69%76%3E%0A%3C%2F%66%6F%6F%74%65%72%3E'))</script>
	";
}

function sifreleme($kul_mail) {
	$gizlianahtar = '05a8acd63ecadfc55842804bc537f76e';
	return md5(sha1(md5($_SERVER['REMOTE_ADDR'] . $gizlianahtar . $kul_mail . "xxx" . date('d.m.Y H:i:s') . $_SERVER['HTTP_USER_AGENT'])));
};



?>

