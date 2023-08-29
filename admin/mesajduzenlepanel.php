<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){

    ?>

          <form method="post" action="index.php?SKD=0&SKI=24&ID=<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>" enctype="multipart/form-data">
          <div class="form-group form-file-upload form-file-multiple" data-provides="fileinput">
    <input type="file" multiple="" class="inputFileHidden">    <div class="input-group" >
        <span class="input-group-btn">    <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Dosya Yükle</span> <input type="file" name="resim"/>	</span>
      </span> <div class="boyutlandirma">
      <div class="fileinput-preview fileinput-exists"></div>
      </div>
      </div></div>
    <div class="form-group col-md-12">
          <textarea class="ckeditor" name="saat" id="editor"></textarea>
        </div>
  
    <button type="submit"  name="mesajguncelle" class="btn btn-danger">Güncelle</button>     
</form> 
 <!-- <script src="../vendor/jquery/jquery.min.js"></script>

ÇÖPLER 


  <div class="file-preview ">
        <div class=" file-drop-zone"></div></div>



 <a class="btn btn-info btn-fab btn-fab-mini btn-round" title="Detaylar" method="GET" href="#" name=ID
 data-toggle="modal" data-target="#icerik<?php echo DonusumleriGeriDondur($MesajSatirlari["id"]); ?>">
      <i class="material-icons">download</i></a>

<p><a href="download.php?path=../<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>">Download file</a></p>

<div class="file-footer-buttons"></div>


<?php  include($Sayfacikti[2]); ?> 


  Logout Modal     
  <div class="modal fade" id="duzenle<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" tabindex="-1"  role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×
 </span> </button></div>
 <div class="modal-body"><form method="post" action="index.php?SKD=0&SKI=20&ID=<?php echo DonusumleriGeriDondur($DuyurularSatirlari["id"]); ?>" enctype="multipart/form-data">
   <div class="form-group">   <span class="btn btn-raised btn-round btn-info">
       <span class="fileinput-new">Resim Ekle</span> <input type="file" name="resim"/>	</span>
 <img src="../img/<?php echo DonusumleriGeriDondur($DuyurularSatirlari["resim"]); ?>" height="100px"  class="img">
   </div>   <div class="form-group">  <label> Yazısı</label>
  <input  type="text"  class="form-control" name="saat"
  placeholder="<?php echo DonusumleriGeriDondur($DuyurularSatirlari["baslik"]); ?>">   </div>
   <div class="form-group">  <label> Link</label>
  <input type="text"  class="form-control" name="link"  placeholder="<?php echo DonusumleriGeriDondur($DuyurularSatirlari["link"]); ?>">
   </div>   <div class="form-group">
  <button type="submit" name="sliderguncelle" class="btn btn-primary">Güncelle</button>
   </div>     </form> 
</div> </div></div></div>-->
<!---------- GÜNCELLE MODAL BİTİŞ  
 
 -------->




  <?php   }else{	header("Location:index.php?SKD=1");	exit();}   ?>

