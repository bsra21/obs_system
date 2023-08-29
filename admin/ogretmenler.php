<?php
if(isset($_SESSION["Yonetici"])){
    $MesajSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ogretmen");
	$MesajSorgusu->execute();
	$MesajSayisi		=	$MesajSorgusu->rowCount();
	$MesajKayitlari	=	$MesajSorgusu->fetchAll(PDO::FETCH_ASSOC);   
  $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM dersler");
  $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
  $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 

  $SinifSorgusu2		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
  $SinifSorgusu2->execute();			$SinifSayisi2		=	$SinifSorgusu2->rowCount();
  $SinifKaydi2		=	$SinifSorgusu2->fetchAll(PDO::FETCH_ASSOC);  ?> 
     
   <table class="table"> <thead><tr>  <th>Alanı</th> <th>Adı Soyadı</th> <th>Email</th>
            <th>Telefon No</th> <th>Sınıfları</th> <th>İşlemler</th>  </tr></thead>  <tbody>
 <?php if($MesajSayisi>0){ foreach($MesajKayitlari as $Ogrtmn){ ?>    <tr>
            <td><?php echo DonusumleriGeriDondur($Ogrtmn["dersid"]); ?></td>
            <td><?php echo DonusumleriGeriDondur($Ogrtmn["ad"]); ?></td>
            <td><?php echo DonusumleriGeriDondur($Ogrtmn["mail"]); ?></td>
            <td> <?php echo DonusumleriGeriDondur($Ogrtmn["telefonumarasi"]); ?></td>
            <td> <?php echo DonusumleriGeriDondur($Ogrtmn["sinifid1"]); ?>, 
            <?php echo DonusumleriGeriDondur($Ogrtmn["sinifid2"]); ?>, 
            <?php echo DonusumleriGeriDondur($Ogrtmn["sinifid3"]); ?>, 
            <?php echo DonusumleriGeriDondur($Ogrtmn["sinifid4"]); ?>, 
            <?php echo DonusumleriGeriDondur($Ogrtmn["sinifid5"]); ?></td>
            <td class="td-actions text-right">
            <a href="index.php?SKD=0&SKI=44&ID=<?php echo DonusumleriGeriDondur($Ogrtmn["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>
              <!---------- GÜNCELLE MODAL    --------->
 <a class="btn btn-success btn-fab btn-fab-mini btn-round" name="ID" title="Düzenle" href="#" data-toggle="modal" data-target="#duzenle<?php echo DonusumleriGeriDondur($Ogrtmn["id"]); ?>">
 <i class="material-icons">edit</i>
</a>
  <!-- Logout Modal-->
  <div class="modal fade" id="duzenle<?php echo DonusumleriGeriDondur($Ogrtmn["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>
 <div class="modal-body">

 <form action="index.php?SKD=0&SKI=45&ID=<?php echo DonusumleriGeriDondur($Ogrtmn["id"]); ?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="mail" class="form-control" id="inputEmail4" value="<?php echo DonusumleriGeriDondur($Ogrtmn["mail"]); ?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">İsim Soyisim</label>
    <input type="text" class="form-control" name="isim" id="inputAddress" value="<?php echo DonusumleriGeriDondur($Ogrtmn["ad"]); ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Telefon Numarası</label>
    <input type="text" class="form-control" name="telno" id="inputAddress2" value="<?php echo DonusumleriGeriDondur($Ogrtmn["telefonumarasi"]); ?>">
  </div> </div>
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
    <button type="submit" name="ogrekle" class="btn btn-primary">Güncelle</button> 
    </div>
 </div>
</form>
 
</div> </div></div></div>
<!---------- GÜNCELLE MODAL BİTİŞ   -------->
            </td>
       </tr>
  <?php }} ?>
    </tbody>
</table>


      <div class="col-md-3" style="float: right;">
<a href="index.php?SKD=0&SKI=46" >
  <button type="button" name="ogrenciekle" class="btn btn-success" style="margin-left: 50px;">
  Yeni Öğretmen <i class="material-icons">add</i></button> </a> </div>   
         
<?php  }else{	header("Location:index.php?SKD=1");	exit();}    ?>