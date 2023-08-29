<?php
if(isset($_SESSION["Yonetici"])){
	if(isset($_GET["ID"])){
		$GelenID	=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID	=	"";
	}

	if($GelenID!=""){
		$MenuSilmeSorgusu		=	$VeritabaniBaglantisi->prepare("DELETE FROM dersler WHERE id = ? LIMIT 1");
		$MenuSilmeSorgusu->execute([$GelenID]);
		$MenuSilmeKontrol		=	$MenuSilmeSorgusu->rowCount();

		if($MenuSilmeKontrol>0){
			$VSilmeSorgusu		=	$VeritabaniBaglantisi->prepare("DELETE FROM videolar WHERE dersid = ?");
			$VSilmeSorgusu->execute([$GelenID]);
			$VSilmeKontrol		=	$VSilmeSorgusu->rowCount();
			if($VSilmeKontrol>0){

			header("Location:index.php?SKD=0&SKI=3");
			exit();
		}
		}else{
			header("Location:index.php?SKD=0&SKI=21");
			exit();
		}
	}else{
		header("Location:index.php?SKD=0&SKI=21");
		exit();
	}
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>