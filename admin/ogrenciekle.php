<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
  if(isset($_SESSION["Yonetici"])){ 
    $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
    $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
    $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 
}
    if(isset($_SESSION["Ogretmen"])){ 
      $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar where id=$Ogretmensinif1 or id=$Ogretmensinif2 or id=$Ogretmensinif3 or id=$Ogretmensinif4 or id=$Ogretmensinif5 ");
       $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
       $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC);         } //$OgretmenDersID
    

?>

<form action="index.php?SKD=0&SKI=29" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="mail" class="form-control" id="inputEmail4" placeholder="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Şifre</label>
      <input type="password" name="sifre" class="form-control" id="inputPassword4" placeholder="">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">İsim Soyisim</label>
    <input type="text" class="form-control" name="isim" id="inputAddress" placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Telefon Numarası</label>
    <input type="text" class="form-control" name="telno" id="inputAddress2" placeholder="">
  </div> </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Öğrenci Numarası</label>
      <input type="text" class="form-control" name="ogrno" id="inputCity">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Cinsiyet</label>
      <select id="inputState" class="form-control" name="cins">
        <option selected>Seçiniz...</option>
        <option>Kadın</option>
        <option>Erkek</option>
      </select>
    </div>
    <div class="form-group col-md-2 ml-auto">
      <label for="inputZip">TC Kimlik No</label>
      <input type="text" class="form-control" id="inputZip" name="kimlik">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Sınıf</label>
      <select id="inputState" class="form-control" name="sinif">
        <option selected>Seçiniz</option>
        <?php   foreach($SinifKaydi as $Ders){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" ><?php echo DonusumleriGeriDondur($Ders["sinifadi"]); ?></option>
<?php }?>
      </select>
    </div>
    <div class="form-group col-md-3">
    <button type="submit" name="ogrekle" class="btn btn-primary">Ekle</button> 
    </div>
 </div>
</form>








 <?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>
