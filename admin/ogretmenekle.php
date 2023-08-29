<?php
if(isset($_SESSION["Yonetici"])){
    $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM dersler");
    $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
    $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 

    $SinifSorgusu2		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
    $SinifSorgusu2->execute();			$SinifSayisi2		=	$SinifSorgusu2->rowCount();
    $SinifKaydi2		=	$SinifSorgusu2->fetchAll(PDO::FETCH_ASSOC); 
?>

<form action="index.php?SKD=0&SKI=43" method="POST">
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
<!--------dersid ,,,  sınıfid  ---------->



  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Sınıf</label>
      <select id="inputState" class="form-control" name="alan">
        <option selected>Alan Seçiniz</option>
        <?php   foreach($SinifKaydi as $Ders){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" ><?php echo DonusumleriGeriDondur($Ders["dersadi"]); ?></option>
<?php }?>
      </select>
    </div>

    <div class="col-md-4">
  <div class="form-group" style="float: left;"> <label >Görüntülenecek Sınıfları Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success " id="sec" multiple data-selected-text-format="count" name="sinifsecim[]">
    <?php   foreach($SinifKaydi2 as $Ders2){     ?>  
    <option value="<?php echo DonusumleriGeriDondur($Ders2["id"]); ?>"><?php echo DonusumleriGeriDondur($Ders2["sinifadi"]); ?></option>
<?php }?></select> </div></div>



    <div class="form-group col-md-3">
    <button type="submit" name="ogrekle" class="btn btn-primary">Ekle</button> 
    </div>
 </div>
</form>


 <?php  }else{ 	header("Location:index.php?SKD=1"); 	exit();  }  ?>
