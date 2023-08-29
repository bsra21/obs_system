<?php
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenID	=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID	=	"";
	}

	if($GelenID!=""){
		$MenuSilmeSorgusu		=	$VeritabaniBaglantisi->prepare("DELETE FROM metinpaylasim WHERE id = ? LIMIT 1");
		$MenuSilmeSorgusu->execute([$GelenID]);
		$MenuSilmeKontrol		=	$MenuSilmeSorgusu->rowCount();

		if($MenuSilmeKontrol>0){
			header("Location:ogrenci.php?SK=6"); ////////////////
			exit();
		}else{
			header("Location:ogrenci.php?SK=6");
			exit();
		}
	}else{
		header("Location:ogrenci.php?SK=6");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>