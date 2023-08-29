<?php
if(isset($_SESSION["Yonetici"]) || (isset($_SESSION["Ogretmen"]))){  // 
	$DuyurularSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM duyurular ORDER BY id DESC");
	$DuyurularSorgusu->execute();
	$DuyurularSayisi		=	$DuyurularSorgusu->rowCount();
	$DuyurularKayitlari	=	$DuyurularSorgusu->fetchAll(PDO::FETCH_ASSOC);

  $MesajSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM metinpaylasim ORDER BY id DESC");
	$MesajSorgusu->execute();
	$MesajSayisi		=	$MesajSorgusu->rowCount();
	$MesajKayitlari	=	$MesajSorgusu->fetchAll(PDO::FETCH_ASSOC);
?>  
<div class="card card-nav-tabs card-plain"> <div class="card-header card-header-info">
  <div class="nav-tabs-navigation">  <div class="nav-tabs-wrapper">
  <ul class="nav nav-tabs" data-tabs="tabs"> <li class="nav-item">
     <a class="nav-link active" href="#home" data-toggle="tab">Paylaşım-Duyuru Listesi</a>   </li>
      <li class="nav-item"><a class="nav-link" href="index.php?SKD=0&SKI=25" >Yeni Paylaşım-Duyuru</a></li>
  </ul></div></div></div> <div class="card-body "> <div class="tab-content text-center"><!------->
<div class="tab-pane active" id="home"><!----- MESAJ LİSTE------>
<div class="row">  <!------------------------------------------>
<div class="col-md-6"><div class="card"><div class="card-body"><div class="table-responsive">
 <div style="height: 470px; overflow-x: hidden; overflow-y: scroll;"> 
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead class=" text-primary"><th>Yazılar</th><th>Ekler</th><th>Yayın Tarihi</th>
   <th>Yayınlayan Kişi</th><th style="width:120px;"> İşlemler </th></thead><tbody>
   <?php if($MesajSayisi>0){ foreach($MesajKayitlari as $MesajSatirlari){ ?>  <tr>
 <td> <?php echo DonusumleriGeriDondur($MesajSatirlari["konu"]); ?> </td>
 <td> <img src="../<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>" height="60px"  class="img"></td>
 <td> <?php echo TarihBul(DonusumleriGeriDondur($MesajSatirlari["yayintarihi"])); ?> </td>
 <td> <?php echo DonusumleriGeriDondur($MesajSatirlari["yayinlayankisi"]); ?> </td>
 <td><div>   <!---- style="width: 120px;"---> 
 <?php   if(DonusumleriGeriDondur($MesajSatirlari["yayinlayankisi"])==$OgretmenKullaniciAdi){ ?>
         <a class="btn btn-info btn-fab btn-fab-mini btn-round"   rel="tooltip"
         title="Download file" href="../<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>" download="" 
         target="_blank"><i class="material-icons">download</i></a>  
 <a href="index.php?SKD=0&SKI=23&ID=<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>

<a class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" name="ID" title="Düzenle" href="#" data-toggle="modal" data-target="#duzenle<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>">
 <i class="material-icons">edit</i> </a>
  <!-- Logout Modal        -->
  <div class="modal fade" id="duzenle<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>  <div class="modal-body">  
 <form method="post" action="index.php?SKD=0&SKI=24&ID=<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>" enctype="multipart/form-data">
          <div class="form-group form-file-upload form-file-multiple" data-provides="fileinput">
    <input type="file" multiple="" class="inputFileHidden">    <div class="input-group" >
        <span class="input-group-btn">    <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Dosya Yükle</span> 
       <input type="file" class="form-control" id="projedosya" name="proje_dosya" value="<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?> ">	</span>
      </span> <div class="boyutlandirma"> <div class="fileinput-preview fileinput-exists" value=""> 
      <?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>     </div></div>
    </div></div><div class="form-group col-md-12">
          <textarea class="ckeditor" name="saat" id="editor"><?php echo DonusumleriGeriDondur($MesajSatirlari["konu"]); ?> </textarea> </div>
    <button type="submit"  name="mesajguncelle" class="btn btn-danger">Güncelle</button> </form> 
</div> </div></div></div>
<!---------- GÜNCELLE MODAL BİTİŞ ---<input type="file" name="resim"/>----->
<?php  } ?>
</div></td></tr> 
</tbody><?php	}}else{echo("Kayıtlı mesaj bulunmamaktadır.");}	?></table></div></div>  </div>
 </div>  </div>
  <!---Paylaşımların eklendiği ve listelendiği   PAYLAŞIMLAR BİTTİ -->

 <!--- DUYURULAR KISMI---->  <div class="col-md-6"> 
<div class="card"><div class="card-body"> <div class="table-responsive">
 <div style="height: 470px; overflow-x: hidden; overflow-y: scroll;"> 
  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
   <thead class=" text-danger"><th>Duyuru Yazı</th><th>Yayınlayan Kişi</th><th>Ek Uzantıları</th><th>Yayın Tarihi </th><th style="width: 120px;"> İşlemler </th></thead><tbody>
    <?php if($DuyurularSayisi>0){	foreach($DuyurularKayitlari as $DuyurularSatirlari){?>  <tr>
 <td>  <?php echo DonusumleriGeriDondur($DuyurularSatirlari["yazi"]); ?></td>
 <td>  <?php echo DonusumleriGeriDondur($DuyurularSatirlari["yayinlayankisi"]); ?></td>
 <td><img src="../<?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?>" height="60px"  class="img">
 </td>
 <td> <?php echo TarihBul(DonusumleriGeriDondur($DuyurularSatirlari["yayintarihi"])); ?></td>
 <td><div>   <!---- style="width: 120px;"---> 
 <?php   
if(DonusumleriGeriDondur($DuyurularSatirlari["yayinlayankisi"])==$OgretmenKullaniciAdi){ //Kullanıcı sadece kendi paylaşımlarını silebilir.
?>
 <a class="btn btn-info btn-fab btn-fab-mini btn-round"   rel="tooltip"
         title="Download file" href="../<?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?>" download="" 
         target="_blank"><i class="material-icons">download</i></a>  

         <a href="index.php?SKD=0&SKI=26&ID=<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>

   <a class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" name="ID" title="Düzenle" href="#" data-toggle="modal" data-target="#duzenle1<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>">
 <i class="material-icons">edit</i></a>
  <!-- Logout Modal        -->
  <div class="modal fade" id="duzenle1<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>
 <div class="modal-body">  
 <form method="post" action="index.php?SKD=0&SKI=27&ID=<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" enctype="multipart/form-data">
          <div class="form-group form-file-upload form-file-multiple" data-provides="fileinput">
    <input type="file" multiple="" class="inputFileHidden">    <div class="input-group" >
        <span class="input-group-btn">    <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Dosya Yükle</span> 
       <input type="file" class="form-control" id="projedosya" name="proje_dosya" >	</span>
      </span> <div class="boyutlandirma"> <div class="fileinput-preview fileinput-exists"> <?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?></div></div>
      </div></div><div class="form-group col-md-12">
          <textarea class="ckeditor" name="saat" id="editor"> <?php echo DonusumleriGeriDondur($DuyurularSatirlari["yazi"]); ?></textarea> </div>
    <button type="submit"  name="duyuruguncelle" class="btn btn-danger">Güncelle</button> </form> 
</div> </div></div></div>
<!---------- GÜNCELLE MODAL BİTİŞ ---<input type="file" name="resim"/>----->
<?php  } ?>

</div></td></tr> <?php	}}else{echo("Kayıtlı duyuru bulunmamaktadır.");}	?>
</tbody></table></div></div></div></div> </div> </div></div> </div></div>

<?php  }else{	header("Location:index.php?SKD=1");	exit();}   ?>

