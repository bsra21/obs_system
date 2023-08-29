<?php
if(isset($_SESSION["Yonetici"])){  //

	if (isset($_POST['ogrekle'])) {
	if(isset($_POST["mail"])){		$Gelenmail		=	Guvenlik($_POST["mail"]);
	}else{		$Gelenmail	=	"";	}
	if(isset($_POST["sifre"])){		$Gelensifre		=	Guvenlik($_POST["sifre"]);
	}else{		$Gelensifre		=	"";	}
    if(isset($_POST["isim"])){		$Gelenisim	=	Guvenlik($_POST["isim"]);
	}else{		$Gelenisim		=	"";	}
    if(isset($_POST["telno"])){		$Gelentelno		=	Guvenlik($_POST["telno"]);
	}else{		$Gelentelno		=	"";	}
    if(isset($_POST["alan"])){		$Gelensinif	=	Guvenlik($_POST["alan"]);
	}else{		$Gelensinif		=	"";	}
$MD5liSifre			=	md5($Gelensifre);

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


	if(($Gelenisim!="") and ($Gelensinif!="") and ($Gelensifre!="")){	 //$ZamanDamgasi, $IPAdresi
		$IcerikEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO ogretmen (ad,sifre,mail,telefonumarasi,dersid,sinifid1,sinifid2,sinifid3,sinifid4,sinifid5) 
        values (?,?,?,?,?,?,?,?,?,?)");
		$IcerikEklemeSorgusu->execute([$Gelenisim,$MD5liSifre,$Gelenmail,$Gelentelno,$Gelensinif,$strategyname0,$strategyname1,$strategyname2,$strategyname3,$strategyname4]);
		$IcerikEklemeKontrol		=	$IcerikEklemeSorgusu->rowCount();

		if($IcerikEklemeKontrol>0){
			header("Location:index.php?SKD=0&SKI=42"); //başarılı
			exit();
		}else{
		//	header("Location:index.php?SKD=0&SKI=7"); //hatalı
		echo("1");
            exit(); 
		}
	}else{
	header("Location:index.php?SKD=0&SKI=7");
    echo("2");
		exit();
	}}
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>