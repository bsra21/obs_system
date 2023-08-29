<?php
if(isset($_SESSION["Yonetici"])){  //

	if (isset($_POST['ogrekle'])) {
        $GelenID		=	Guvenlik($_GET["ID"]);
	if(isset($_POST["mail"])){		$Gelenmail		=	Guvenlik($_POST["mail"]);
	}else{		$Gelenmail	=	"";	}
    if(isset($_POST["isim"])){		$Gelenisim	=	Guvenlik($_POST["isim"]);
	}else{		$Gelenisim		=	"";	}
    if(isset($_POST["telno"])){		$Gelentelno		=	Guvenlik($_POST["telno"]);
	}else{		$Gelentelno		=	"";	}
    if(isset($_POST["alan"])){		$Gelensinif	=	Guvenlik($_POST["alan"]);
	}else{		$Gelensinif		=	"";	}


$strategylist = $_POST['sinifsecim'];
if(count($strategylist)<6){  
for ($i = 0; $i < count($strategylist); $i++) {
$strategyname = $strategylist[$i];
// echo($i."    ==>".$strategyname);
if($i==0){$strategyname0=$strategyname;}
if($i==1){$strategyname1=$strategyname;}
if($i==2){$strategyname2=$strategyname;}  
if($i==3){$strategyname3=$strategyname;} 
if($i==4){$strategyname4=$strategyname;} 

}

if(count($strategylist)<3){ $strategyname2=0; $strategyname3=0;$strategyname4=0;  }
if(count($strategylist)<2){ $strategyname2=0;$strategyname1=0; $strategyname3=0;$strategyname4=0; }
if(count($strategylist)<4){ $strategyname3=0;$strategyname4=0;  }
if(count($strategylist)<5){ $strategyname4=0;  }
}


	if(($Gelensinif!="")){	 //$ZamanDamgasi, $IPAdresi
		$IcerikEklemeSorgusu		=" update ogretmen set ad='$Gelenisim' , mail='$Gelenmail',telefonumarasi='$Gelentelno',dersid='$Gelensinif' , sinifid1='$strategyname0',sinifid2='$strategyname1', sinifid3='$strategyname2',sinifid4='$strategyname3', sinifid5='$strategyname4' where id='$GelenID'";
        $durum = $VeritabaniBaglantisi->query ($IcerikEklemeSorgusu); 

		if($durum>0){
			header("Location:index.php?SKD=0&SKI=42"); //başarılı
			exit();
		}else{
		//	header("Location:index.php?SKD=0&SKI=7"); //hatalı
		echo("1");
            exit(); 
		}
	}else{
//	header("Location:index.php?SKD=0&SKI=7");
   echo("2");
		exit();
	}}
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>