<?php   if(isset($_SESSION["Yonetici"]) or isset($_SESSION["Ogretmen"])){ 
    
  $EnYeniUrunlerSorgusu3		=	$VeritabaniBaglantisi->prepare("select * from dersler");
  $EnYeniUrunlerSorgusu3->execute();
  $EnYeniUrunSayisi3			=	$EnYeniUrunlerSorgusu3->rowCount();
  $EnYeniUrunKayitlari3	=	$EnYeniUrunlerSorgusu3->fetchAll(PDO::FETCH_ASSOC); 
  
  $EnYeniUrunlerSorgusu4		=	$VeritabaniBaglantisi->prepare("select * from dersler where id=$OgretmenDersID");
  $EnYeniUrunlerSorgusu4->execute();
  $EnYeniUrunSayisi4			=	$EnYeniUrunlerSorgusu4->rowCount();
  $EnYeniUrunKayitlari4	=	$EnYeniUrunlerSorgusu4->fetchAll(PDO::FETCH_ASSOC);
  ?>


<script src="../vendor/jquery/jquery.min.js"></script>
<!-------DOSYA EKLE --------->
   <div class="container">  <div class="card shadow mb-4">    <div class="card-body">
      <form action="index.php?SKD=0&SKI=11" method="POST" enctype="multipart/form-data"  data-parsley-validate>
 <div class="form-row">   <div class="form-group col-md-6">
 <input type="text" class="form-control" name="proje_baslik" placeholder="Dosya İsmi"> </div>
   <div class="form-group" >  <label >Ders Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success" name="dersid" style="margin-left: 20px;">
    <?php if(isset($_SESSION["Yonetici"])){ ?>  
    <?php  foreach($EnYeniUrunKayitlari3 as $Ders){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>"  ><?php echo DonusumleriGeriDondur($Ders["dersadi"]); ?></option>
<?php }?>  <?php } ?>

<?php if(isset($_SESSION["Ogretmen"])){ ?>  

<?php  foreach($EnYeniUrunKayitlari4 as $Ders4){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders4["id"]); ?>"  ><?php echo DonusumleriGeriDondur($Ders4["dersadi"]); ?></option>
<?php }?>
<?php } ?>

</select>


</div> </div>
 <div class="form-row justify-content-center"><div class="col-md-6">   <div class="file-loading">
     <input class="form-control" id="proje_dosya2" name="proje_dosya" type="file">
  </div></div> </div><button type="submit" name="pdfekle" class="btn btn-primary">Kaydet</button>
</form>  </div></div></div>  




<?php }else{ 	header("Location:index.php?SKD=1");	exit(); }  ?>