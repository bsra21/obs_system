<?php  
if(isset($_SESSION["Yonetici"])){
    if(isset($_POST["ogrenciliste"])){ 

     if(isset($_POST["seviye"])){     $GelenSeviye		=	Guvenlik($_POST["seviye"]);
}else{    $GelenSeviye	=	"";}
if(isset($_POST["bolum"])){    $Gelenbolum		=	Guvenlik($_POST["bolum"]);
}else{$Gelenbolum=	"";}
  
          $yenisinif= $GelenSeviye."".$Gelenbolum ;
       
          $IcerikEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO siniflar (sinifadi) values (?)");
          $IcerikEklemeSorgusu->execute([$yenisinif]);
          $IcerikEklemeKontrol		=	$IcerikEklemeSorgusu->rowCount();
  
          if($IcerikEklemeKontrol>0){
              header("Location:index.php?SKD=0&SKI=36"); //başarılı
              exit();
          }else{
              header("Location:index.php?SKD=0&SKI=7"); //hatalı
              exit(); 
          }
        }


}else{   header("Location:index.php?SKD=1");    exit(); }
?>