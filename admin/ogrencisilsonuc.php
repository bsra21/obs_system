<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
	if(isset($_GET["ID"])){
		$GelenID	=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID	=	"";
	}

	if($GelenID!=""){
		$MenuSilmeSorgusu		=	$VeritabaniBaglantisi->prepare("DELETE FROM ogrenciler WHERE id = ? LIMIT 1");
		$MenuSilmeSorgusu->execute([$GelenID]);
		$MenuSilmeKontrol		=	$MenuSilmeSorgusu->rowCount();

		if($MenuSilmeKontrol>0){
			header("Location:index.php?SKD=0&SKI=16");
			exit();
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