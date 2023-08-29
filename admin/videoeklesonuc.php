
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){ 

    if (isset($_POST['videoekle'])) {
        if(isset($_POST["Soru"])){
            $GelenSoru		=	Guvenlik($_POST["Soru"]);
        }else{
            $GelenSoru		=	"";
        }
        if(isset($_POST["dersid"])){
            $Gelendersid		=	Guvenlik($_POST["dersid"]);
        }else{
            $Gelendersid	=	"";
        }
        if(isset($_POST["turid"])){
            $Gelenturid		=	Guvenlik($_POST["turid"]);
        }else{
            $Gelenturid		=	""; //konu
        }
        if(isset($_POST["konu"])){
            $Gelenkonu		=	Guvenlik($_POST["konu"]);
        }else{
            $Gelenkonu	=	"";
        }

     /*   */      
        $strategylist = $_POST['sinifsecim'];
      if(count($strategylist)<4){  
for ($i = 0; $i < count($strategylist); $i++) {
    $strategyname = $strategylist[$i];
   // echo($i."    ==>".$strategyname);
if($i==0){$strategyname0=$strategyname;}
if($i==1){$strategyname1=$strategyname;}
if($i==2){$strategyname2=$strategyname;}  
}

if(count($strategylist)<3){ $strategyname2=0;  }
if(count($strategylist)<2){ $strategyname2=0;$strategyname1=0;  }
   }
         
     
   
         if(($GelenSoru!="") and ($Gelendersid!="") and ($Gelenturid!="")){	
if($Gelenturid=="1"){ $GelenSoru="https://player.vimeo.com/video/".$GelenSoru."" ; 
echo("hata");
}
else{   }
            $IcerikEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO videolar (konu,link,yayintarihi,goruntulenmesayisi,dersid,sinifid,sinifid2,sinif_id3) values (?,?,?,?,?,?,?,?)");
            $IcerikEklemeSorgusu->execute([$Gelenkonu,$GelenSoru,$ZamanDamgasi,0, $Gelendersid,$strategyname0,$strategyname1,$strategyname2]);
            $IcerikEklemeKontrol		=	$IcerikEklemeSorgusu->rowCount();
    
            if($IcerikEklemeKontrol>0){
                header("Location:index.php?SKD=0&SKI=3"); //başarılı
                exit();
            }else{
                header("Location:index.php?SKD=0&SKI=7"); //hatalı
                exit(); 
            }
        }else{
            header("Location:index.php?SKD=0&SKI=7");
            exit();
        }   }
}else{ 
	header("Location:index.php?SKD=1");
	exit();
}
?>     