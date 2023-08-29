
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
if (isset($_POST['videoduzenle'])) {
    $GelenID		=	Guvenlik($_GET["ID"]);
if(isset($_POST["Soru"])){$GelenSoru		=	Guvenlik($_POST["Soru"]);
}else{$GelenSoru		=	"";}
if(isset($_POST["dersid"])){   $Gelendersid		=	Guvenlik($_POST["dersid"]);
}else{   $Gelendersid	=	"";}
if(isset($_POST["turid"])){$Gelenturid		=	Guvenlik($_POST["turid"]);
}else{$Gelenturid		=	""; }//konu
if(isset($_POST["konu"])){ $Gelenkonu		=	Guvenlik($_POST["konu"]);
}else{$Gelenkonu	=	"";}

 $strategylist = $_POST['sinifsecim'];   if(count($strategylist)<4){  
for ($i = 0; $i < count($strategylist); $i++) {
$strategyname = $strategylist[$i];  if($i==0){$strategyname0=$strategyname;}
if($i==1){$strategyname1=$strategyname;}  if($i==2){$strategyname2=$strategyname;}  }
if(count($strategylist)<3){ $strategyname2=0;  }
if(count($strategylist)<2){ $strategyname2=0;$strategyname1=0;  }   }
 if(($GelenSoru!="") and ($Gelendersid!="") and ($Gelenturid!="")){	
 /*if($Gelenturid=="1"){ $GelenSoru="https://player.vimeo.com/video/".$_POST["Soru"]."" ; 
  } else{   }*/
$sql = "update videolar set konu='$Gelenkonu',link='$GelenSoru' , yayintarihi='$ZamanDamgasi',goruntulenmesayisi=0,dersid='$Gelendersid',sinifid='$strategyname0', sinifid2='$strategyname1',sinif_id3='$strategyname2' where id='$GelenID'";
$durum = $VeritabaniBaglantisi->query ($sql); 

if ($durum) {header("Location:index.php?SKD=0&SKI=3"); 
exit();}else{
header("Location:index.php?SKD=0&SKI=7"); //hatalı
exit(); }}else{
header("Location:index.php?SKD=0&SKI=7");exit();}   }

}else{	header("Location:index.php?SKD=1");	exit();  }  ?>
