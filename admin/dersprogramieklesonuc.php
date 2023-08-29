
<?php
if(isset($_SESSION["Yonetici"])){
/* 
  $BolumSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sinifbolum");
    $BolumSorgusu->execute();			$BolumSayisi		=	$BolumSorgusu->rowCount();
    $BolumKaydi		=	$BolumSorgusu->fetchAll(PDO::FETCH_ASSOC);
// sinifları çekeceğiz ....   // burayı sınıf oluştururken yapacağız.. 
$SeviyeSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sinifseviye");
$SeviyeSorgusu->execute();			$SeviyeSayisi		=	$SeviyeSorgusu->rowCount();
$SeviyeKaydi		=	$SeviyeSorgusu->fetchAll(PDO::FETCH_ASSOC);

     if(isset($_POST["seviye"])){     $GelenSeviye		=	Guvenlik($_POST["seviye"]);
}else{    $GelenSeviye	=	"";}
if(isset($_POST["bolum"])){    $Gelenbolum		=	Guvenlik($_POST["bolum"]);
}else{$Gelenbolum=	"";}
        $SiniflarSorgusu	 =	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar WHERE seviyeID=? and bolumID=?");
          $SiniflarSorgusu->execute([$GelenSeviye,$Gelenbolum]);
            $SiniflarSayisi=	$SiniflarSorgusu->rowCount();
          $SiniflarKaydi		=	$SiniflarSorgusu->fetch(PDO::FETCH_ASSOC);
          $sinifidal= DonusumleriGeriDondur($SiniflarKaydi["id"]);

          $ogrenciSorgusu		=	$VeritabaniBaglantisi->prepare(" select * from ogrenciler a inner join siniflar b on a.sinifID=b.id where b.id=?");
          $ogrenciSorgusu->execute([$sinifidal]);  $ogrenciSayisi=	$ogrenciSorgusu->rowCount();
          $ogrenciKaydi		=	$ogrenciSorgusu->fetchAll(PDO::FETCH_ASSOC);
*/


?>

<div class="row">
       <div class="col-md-3" style="float: left;">     <div class="form-group" >
    <select class="selectpicker" data-style="btn btn-success"  id="country" name="seviye">
    <option value="">Seçiminizi Yapınız.. </option>
    <?php   foreach($SeviyeKaydi as $Ders){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" ><?php echo DonusumleriGeriDondur($Ders["seviye"]); ?></option>
<?php }?>
    </select>
  </div></div><div class="col-md-3" style="float:left;">
  <div class="form-group" >
    <select class="selectpicker" data-style="btn btn-success"  id="country2" name="bolum">
    <option value="">Seçiminizi Yapınız.. </option>
    <?php   foreach($BolumKaydi as $Ders2){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders2["id"]); ?>" ><?php echo DonusumleriGeriDondur($Ders2["bolum"]); ?></option>
<?php }?>
    </select>
  </div>  </div><div class="col-md-3" style="float: right;">
  <button type="submit" name="ogrenciliste" class="btn btn-success" style="margin-left: 50px;">Listele
</button>  </div>
<div class="col-md-3" style="float: right;">
<a href="index.php?SKD=0&SKI=34" >
  <button type="button" name="ogrenciekle" class="btn btn-success" style="margin-left: 50px;">
  Yeni Öğrenci <i class="material-icons">add</i></button> </a> </div>
         </div>






<?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>