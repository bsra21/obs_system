<?php   if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){ 
    
    $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
    $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
    $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 
 
    $BolumSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sinifbolum");
    $BolumSorgusu->execute();			$BolumSayisi		=	$BolumSorgusu->rowCount();
    $BolumKaydi		=	$BolumSorgusu->fetchAll(PDO::FETCH_ASSOC);
// sinifları çekeceğiz ....   // burayı sınıf oluştururken yapacağız.. 
$SeviyeSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sinifseviye");
$SeviyeSorgusu->execute();			$SeviyeSayisi		=	$SeviyeSorgusu->rowCount();
$SeviyeKaydi		=	$SeviyeSorgusu->fetchAll(PDO::FETCH_ASSOC);
  if(isset($_SESSION["Ogretmen"])){ 
   $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar where id=$Ogretmensinif1 or id=$Ogretmensinif2 or id=$Ogretmensinif3 or id=$Ogretmensinif4 or id=$Ogretmensinif5 ");
    $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
    $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC);         } //$OgretmenDersID
 
 ?>


<?php   if(isset($_SESSION["Yonetici"])){   ?>

<h3>YENİ SINIF OLUŞTUR</h3>
<form action="index.php?SKD=0&SKI=35" method="POST">
<div class="row">

       <div class="col-md-4" style="float: left;">     <div class="form-group" >
    <select class="selectpicker" data-style="btn btn-success"  id="country" name="seviye">
    <option value="">Seçiminizi Yapınız.. </option>
    <?php   foreach($SeviyeKaydi as $Ders){     ?> 
 <option><?php echo DonusumleriGeriDondur($Ders["seviye"]); ?></option>
<?php }?>
    </select>
  </div></div>
  <div class="col-md-4">
  <div class="form-group" >
    <select class="selectpicker" data-style="btn btn-success"  id="country2" name="bolum">
    <option value="">Seçiminizi Yapınız.. </option>
    <?php   foreach($BolumKaydi as $Ders2){     ?> 
 <option><?php echo DonusumleriGeriDondur($Ders2["bolum"]); ?></option>
<?php }?>
    </select>
  </div>  </div><div class="col-md-4" style="float: right;">
  <button type="submit" name="ogrenciliste" class="btn btn-success" style="margin-left: 50px;">Oluştur
</button>  </div>

</div></form>
<?php   } ?>
<h2>SINIFLAR</h2>
<div class="col-md-4">
<ul class="nav flex-column">
 <?php   foreach($SinifKaydi as $Ders){     ?> 
  <li class="nav-item">
    <a class="nav-link" style="float: left;">
    <form action="index.php?SKD=0&SKI=16" method="POST">  
    <button type="submit" name="sinif" value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>"><?php echo DonusumleriGeriDondur($Ders["sinifadi"]); ?>
</button>
</form>
<?php   if(isset($_SESSION["Yonetici"])){   ?>
    <a href="index.php?SKD=0&SKI=37&ID=<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" style="float: right;">
  Sil      <i class="material-icons">clear</i></a> 
  <?php   } ?>
  <!---- clear  delete--></a>
  </li>
<?php }?>
</ul></div>



<?php }else{ 	header("Location:index.php?SKD=1");	exit(); }  ?>