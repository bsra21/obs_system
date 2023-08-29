<?php
if(isset($_SESSION["Yonetici"])){

	$DuyurularSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM slider");
	$DuyurularSorgusu->execute();
	$DuyurularSayisi		=	$DuyurularSorgusu->rowCount();
	$DuyurularKayitlari	=	$DuyurularSorgusu->fetchAll(PDO::FETCH_ASSOC);
  //resim, baslik, link
?>
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="content">
<div class="container-fluid">
  <div class="row">
 <div class="col-md-12">
   <div class="card">
 <div class="card-body"><div style="height: 500px; overflow-x: hidden; overflow-y: scroll;">
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead>
<th>Resim     </th>  
<th>   Başlık</th><th>   Yayın Tarihi</th>
<th>   Link     </th>
<th>    İşlemler    </th>
    </thead>
    <tbody>
    <?php 
	if($DuyurularSayisi>0){
		foreach($DuyurularKayitlari as $DuyurularSatirlari){
?>
<tr><td>  <img src="../img/<?php echo DonusumleriGeriDondur($DuyurularSatirlari["resim"]); ?>" height="60px"  class="img"></td>
<td>  <?php echo DonusumleriGeriDondur($DuyurularSatirlari["baslik"]); ?></td>
<td>  <?php echo TarihBul(DonusumleriGeriDondur($DuyurularSatirlari["yayintarihi"])); ?></td>
<td>  <?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?> </td>
<td> <div>
<!---------- DETAYLAR MODAL    --------->
<a class="btn btn-success btn-fab btn-fab-mini btn-round" title="Detaylar" href="#" data-toggle="modal" data-target="#icerik<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>">
      <i class="material-icons">remove_red_eye</i>
</a>
  <!-- Logout Modal-->
  <div class="modal fade" id="icerik<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div><div class="modal-body">
 <!---  <?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?>
 <?php echo DonusumleriGeriDondur($DuyurularSatirlari["baslik"]); ?>
 <button class="btn btn-secondary" type="button" data-dismiss="modal">Kapat </button>-->
 <img src="../img/<?php echo DonusumleriGeriDondur($DuyurularSatirlari["resim"]); ?>" width="400px"/></div> <div class="modal-footer">
 </div> </div></div></div>
<!----------DETAYLAR MODAL BİTİŞ---------->


<a href="index.php?SKD=0&SKI=19&ID=<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>">
  <button type="button" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>
<!---------- GÜNCELLE MODAL    --------->
 <a class="btn btn-success btn-fab btn-fab-mini btn-round" name="ID" title="Düzenle" href="#" data-toggle="modal" data-target="#duzenle<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>">
 <i class="material-icons">edit</i>
</a>
  <!-- Logout Modal-->
  <div class="modal fade" id="duzenle<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>
 <div class="modal-body"><form method="post" action="index.php?SKD=0&SKI=20&ID=<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" enctype="multipart/form-data">
   <div class="form-group">   <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Resim Ekle</span> 
<input type="file" name="resim" value="../img/<?php echo DonusumleriGeriDondur($DuyurularSatirlari["resim"]); ?>"/>	</span>
 <img src="../img/<?php echo DonusumleriGeriDondur($DuyurularSatirlari["resim"]); ?>" height="100px"  class="img">
   </div>   <div class="form-group">  <label> Yazısı</label>
  <input  type="text"  class="form-control" name="saat"
  value="<?php echo DonusumleriGeriDondur($DuyurularSatirlari["baslik"]); ?> ">  </div>
   <div class="form-group">  <label> Link</label>
  <input type="text"  class="form-control" name="link"  value="<?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?>">
   </div>   <div class="form-group">
  <button type="submit" name="sliderguncelle" class="btn btn-primary">Güncelle</button>
   </div>     </form> 
</div> </div></div></div>
<!---------- GÜNCELLE MODAL BİTİŞ   -------->

  </div> </td> </tr> <?php		}	}else{echo("Kayıtlı slider bulunmamaktadır."); } 	?>
    </tbody>          </table> </div></div>     </div>   </div> </div></div> </div></div>
<!---------- EKLE MODAL    --------->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
 Slider Ekle   </button>
<!-- Modal -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">    <div class="modal-content"> <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Slider Ekleme Paneli</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span> </button></div><div class="modal-body">
 <form method="post" action="index.php?SKD=0&SKI=18" enctype="multipart/form-data">
   <div class="form-group">
 <!---<label for="resim">Resim Ekle</label>
 <input type="file" name="resim" class="form-control-file" id="resim">--->
 <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Resim Ekle</span> <input type="file" name="resim"/>	</span>   </div>
   <div class="form-group">
  <label> Yazısı</label>
  <input required type="text"  class="form-control" name="saat"  placeholder="Slider başlık ekleyiniz..">   </div>
   <div class="form-group">
  <label> Link</label>
  <input type="text"  class="form-control" name="link"  placeholder="URL Link ekleyiniz..">   </div>
   <div class="form-group">
  <button type="submit" name="sliderekleme" class="btn btn-primary">Ekle</button>   </div>
     </form>
     </div>
    </div>
  </div>
</div> <!----Modal bitiş    GET-POST kontrol et


<?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>

