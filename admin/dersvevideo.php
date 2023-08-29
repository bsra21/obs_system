
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
      if(isset($_SESSION["Ogretmen"])){  //$OgretmenDersID
        $BannerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM dersler where id=$OgretmenDersID");
        $BannerSorgusu->execute();			$BannerSayisi		=	$BannerSorgusu->rowCount();
        $BannerKaydi		=	$BannerSorgusu->fetchAll(PDO::FETCH_ASSOC);
        $EnYeniUrunlerSorgusu2		=	$VeritabaniBaglantisi->prepare("select a.id,a.dersid,b.dersadi,a.konu,a.link,a.yayintarihi,a.goruntulenmesayisi,a.sinifid,a.sinifid2,a.sinif_id3 from videolar a inner join dersler b on a.dersid=b.id where a.dersid=$OgretmenDersID");
        $EnYeniUrunlerSorgusu2->execute();
        $EnYeniUrunSayisi2			=	$EnYeniUrunlerSorgusu2->rowCount();
        $EnYeniUrunKayitlari2		=	$EnYeniUrunlerSorgusu2->fetchAll(PDO::FETCH_ASSOC);
      }

      $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
      $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
      $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 
      if(isset($_SESSION["Yonetici"])){
      $EnYeniUrunlerSorgusu2		=	$VeritabaniBaglantisi->prepare("select a.id,a.dersid,b.dersadi,a.konu,a.link,a.yayintarihi,a.goruntulenmesayisi,a.sinifid,a.sinifid2,a.sinif_id3 from videolar a inner join dersler b on a.dersid=b.id");
      $EnYeniUrunlerSorgusu2->execute();
      $EnYeniUrunSayisi2			=	$EnYeniUrunlerSorgusu2->rowCount();
      $EnYeniUrunKayitlari2		=	$EnYeniUrunlerSorgusu2->fetchAll(PDO::FETCH_ASSOC);
    		$BannerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM dersler");
			$BannerSorgusu->execute();			$BannerSayisi		=	$BannerSorgusu->rowCount();
			$BannerKaydi		=	$BannerSorgusu->fetchAll(PDO::FETCH_ASSOC);  }
    ?>
<div class="card card-nav-tabs card-plain" >
    <div class="card-header card-header-success">
   <!--  style="margin-top:800px;" colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
  <div class="nav-tabs-navigation"><div class="nav-tabs-wrapper"><ul class="nav nav-tabs" data-tabs="tabs">
  <li class="nav-item"> <a class="nav-link active" href="#updates" data-toggle="tab">Videolar</a> </li>
  <?php if(isset($_SESSION["Yonetici"])){ ?>  
<li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Dersler</a></li>
   <li class="nav-item"><a class="nav-link " href="#home" data-toggle="tab">Ders Ekle</a> </li>

<?php  } ?>
   <li class="nav-item"><a class="nav-link" href="#updates2" data-toggle="tab">Video Ekle</a> </li>
  </ul></div></div></div><div class="card"><div class="card-body "><div class="tab-content text-center">
  <div class="tab-pane active" id="updates"> <!---VİDEOLAR---><div class="container-fluid"  >
  <div class="card shadow mb-4" > <div class="table-responsive">
 <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
    <thead><tr><th>Video Başlık</th><th>Ders İsmi</th><th>Yayın Tarihi</th><th>Video Link</th><th>İşlemler</th></tr></thead><tbody>
  <?php    foreach($EnYeniUrunKayitlari2 as $kayit2){?> 
    <tr><td><?php echo DonusumleriGeriDondur($kayit2["konu"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($kayit2["dersadi"]); ?></td>
    <td><?php echo TarihBul(DonusumleriGeriDondur($kayit2["yayintarihi"])); ?></td>
    <td><?php echo DonusumleriGeriDondur($kayit2["link"]); ?></td><td>    <div>
    <a href="index.php?SKD=0&SKI=39&ID=<?php echo DonusumleriGeriDondur($kayit2["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>

 <!---------- GÜNCELLE MODAL    --------->
 <a class="btn btn-success btn-fab btn-fab-mini btn-round" name="ID" title="Düzenle" href="#" data-toggle="modal" data-target="#duzenlevideo<?php echo DonusumleriGeriDondur($kayit2["id"]); ?>">
 <i class="material-icons">edit</i>
</a>
  <!-- Logout Modal-->
  <div class="modal fade bd-example-modal-lg" id="duzenlevideo<?php echo DonusumleriGeriDondur($kayit2["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>
 <div class="modal-body"><form  action="index.php?SKD=0&SKI=41&ID=<?php echo DonusumleriGeriDondur($kayit2["id"]); ?>" method="POST"><div class="row"><div class="col-md-4">
   <div class="form-group" style="float: left;"><label >Ders Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success" name="dersid" style="margin-left: 20px;">
	  <?php   foreach($BannerKaydi as $Ders){  ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>"  ><?php echo DonusumleriGeriDondur($Ders["dersadi"]); ?></option>
<?php }?>    </select>  </div>	   </div>   <div class="col-md-4">
  <div class="form-group" style="float: left;"> <label >Video Türü Seçiniz :</label><!------> 
    <select class="selectpicker" data-style="btn btn-success "  name="turid"  style="margin-left: 20px;">
      <option value="1">Vimeo</option> <option value="2">Youtube</option>  </select>  </div>   </div>
    <script>$('#sec').on('change', function() {    var values = $(this).val();  });</script>
    <div class="col-md-4">
  <div class="form-group" style="float: left;"> <label >Görüntülenecek Sınıfları Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success " id="sec" multiple data-selected-text-format="count" name="sinifsecim[]">
    <?php   foreach($SinifKaydi as $Ders2){     ?>  
    <option value="<?php echo DonusumleriGeriDondur($Ders2["id"]); ?>"><?php echo DonusumleriGeriDondur($Ders2["sinifadi"]); ?></option>
<?php }?></select> </div></div></div> 
<div class="row"><div class="col-md-6">	<div class="form-group" style="float: left;">
 <label class="bmd-label-floating" >Video Linki Ekleyiniz :</label>
 <input type="text" name="Soru" class="form-control" value="<?php echo DonusumleriGeriDondur($kayit2["link"]); ?>">   </div></div>
<div class="col-md-6"> <div class="form-group" style="float: left;">
         <label class="bmd-label-floating" >Video Konu Başlığı Ekleyiniz :</label> 
		 <input type="text" name="konu" class="form-control" value="<?php echo DonusumleriGeriDondur($kayit2["konu"]); ?>">  </div> </div>
<button type="submit" name="videoduzenle" class="btn btn-success" style="margin-left: 50px;">Güncelle</button>  
</form>
</div> </div></div></div>
<!---------- GÜNCELLE MODAL BİTİŞ   -------->
  
  </div>  </td></tr><?php } ?></tbody>
</table></div></div></div> </div> <!-------------  DERSLER LİSTESİ   -------------->
<div class="tab-pane" id="history"><!----------------> <div class="container-fluid"  >
  <div class="card shadow mb-4" > <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
    <thead><tr><th>Ders İsmi</th><th>İşlemler</th></tr></thead><tbody>
  <?php  foreach($BannerKaydi as $kayit3){?> 
    <tr><td><?php echo DonusumleriGeriDondur($kayit3["dersadi"]); ?></td> <td>  
  <div>
  <a href="index.php?SKD=0&SKI=40&ID=<?php echo DonusumleriGeriDondur($kayit3["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>
  </div>  
</td></tr><?php } ?></tbody> 
</table></div></div></div>
</div>
 <!-------------  DERS EKLE   -------------->
<div class="tab-pane" id="home"><div class="card-body">
<form  action="index.php?SKD=0&SKI=4" method="POST">              
   <div class="row"><div class="col-md-6"> <div class="form-group">
         <label class="bmd-label-floating">Ders Adı :</label>
         <input type="text" name="Soru" class="form-control"></div> </div> <div class="col-md-6">
   <button type="submit" name="dersekle" style="float: left;" class="btn btn-success pull-right">Ders Ekle</button></div>
<div class="clearfix"></div></div> </form> </div></div>
        <!-------------  VİDEO EKLE   -------------->
<div class="tab-pane" id="updates2"><div class="card-body">
<form  action="index.php?SKD=0&SKI=8" method="POST"><div class="row"><div class="col-md-4">
   <div class="form-group" style="float: left;"><label >Ders Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success" name="dersid" style="margin-left: 20px;">
	  <?php   foreach($BannerKaydi as $Ders){  ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>"  ><?php echo DonusumleriGeriDondur($Ders["dersadi"]); ?></option>
<?php }?>    </select>  </div>	   </div>   <div class="col-md-4">
  <div class="form-group" style="float: left;"> <label >Video Türü Seçiniz :</label><!------> 
    <select class="selectpicker" data-style="btn btn-success "  name="turid"  style="margin-left: 20px;">
      <option value="1">Vimeo</option> <option value="2">Youtube</option>  </select>  </div>   </div>
    <script>$('#sec').on('change', function() {    var values = $(this).val();  });</script>
    <div class="col-md-4">
  <div class="form-group" style="float: left;"> <label >Görüntülenecek Sınıfları Seçiniz :</label>
    <select class="selectpicker" data-style="btn btn-success " id="sec" multiple data-selected-text-format="count" name="sinifsecim[]">
    <?php   foreach($SinifKaydi as $Ders2){     ?>  
    <option value="<?php echo DonusumleriGeriDondur($Ders2["id"]); ?>"><?php echo DonusumleriGeriDondur($Ders2["sinifadi"]); ?></option>
<?php }?></select> </div></div></div> 
<div class="row"><div class="col-md-6">	<div class="form-group" style="float: left;">
 <label class="bmd-label-floating" >Video Linki Ekleyiniz :</label>
 <input type="text" name="Soru" class="form-control">  </div></div>
<div class="col-md-6"> <div class="form-group" style="float: left;">
         <label class="bmd-label-floating" >Video Konu Başlığı Ekleyiniz :</label> 
		 <input type="text" name="konu" class="form-control">  </div> </div>
<button type="submit" name="videoekle" class="btn btn-success" style="margin-left: 50px;">Video Ekle</button>  
</form></div></div></div></div></div></div>



  <?php  }else{ 	header("Location:index.php?SKD=1"); 	exit();   }   ?>