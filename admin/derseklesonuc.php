<?php
if(isset($_SESSION["Yonetici"])){  //

	if (isset($_POST['dersekle'])) {
	if(isset($_POST["Soru"])){
		$GelenSoru		=	Guvenlik($_POST["Soru"]);
	}else{
		$GelenSoru		=	"";
	}

	
	if(($GelenSoru!="")){	
		$IcerikEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO dersler (dersadi) values (?)");
		$IcerikEklemeSorgusu->execute([$GelenSoru]);
		$IcerikEklemeKontrol		=	$IcerikEklemeSorgusu->rowCount();

		if($IcerikEklemeKontrol>0){
			header("Location:index.php?SKD=0&SKI=3"); //başarılı
			exit();
		}else{
			header("Location:index.php?SKD=0&SKI=3"); //hatalı
			exit(); 
		}
	}else{
		header("Location:index.php?SKD=0&SKI=3");
		exit();
	}}
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>