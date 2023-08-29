<?php

if(isset($_SESSION["Kullanici"])){
  $BolumSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM duyurular ORDER BY id DESC LIMIT 8");
  $BolumSorgusu->execute();			$BolumSayisi		=	$BolumSorgusu->rowCount();
  $BolumKaydi		=	$BolumSorgusu->fetchAll(PDO::FETCH_ASSOC);

  $MesajSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM metinpaylasim ORDER BY id DESC LIMIT 10");
	$MesajSorgusu->execute();
	$MesajSayisi		=	$MesajSorgusu->rowCount();
	$MesajKayitlari	=	$MesajSorgusu->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="vendor/jquery/jquery.min.js"></script>
<div class="container">

  <div class="row" >
<div class="col-md-6"> <div class="card">
          <div class="card-header card-header-text card-header-primary">
          <div class="card-text"> <h4 class="card-title">Duyurular</h4></div></div><div class="card-body">
          <div style="height: 350px; overflow-x: hidden; overflow-y: scroll;">
          <?php if($BolumSayisi>0){ foreach($BolumKaydi as $MesajSatirlari){ ?>
          <div class="card" style="margin-bottom:0px ;margin-top:0px ;">
  <div class="card-body " >
        <h6 class="card-title">
            <a href="<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>">
            <span class="material-icons"> info
</span>   <?php echo DonusumleriGeriDondur($MesajSatirlari["yazi"]); ?></a>
        </h6>
    </div>
    <div class="card-footer " style="margin-top:1px ;">
            <div class="stats">
                 <span><?php echo DonusumleriGeriDondur($MesajSatirlari["yayinlayankisi"]); ?></span>
            </div>
            <div class="stats ml-auto">
            <?php echo TarihBul(DonusumleriGeriDondur($MesajSatirlari["yayintarihi"])); ?>
            <a  rel="tooltip"
         title="Download file" href="<?php echo DonusumleriGeriDondur($MesajSatirlari["link"]); ?>" download="" 
         target="_blank"><i class="material-icons">get_app</i>
         </a>  
            </div>
        </div>
      </div>
      <?php	}}else{echo("Kayıtlı duyuru bulunmamaktadır.");}	?>
</div></div> </div>

<div class="alert alert-info" role="alert">
  This is a info alert with <a href="javascript:;" class="alert-link">an example link</a>. Give it a click if you like.
</div>

<div class="alert alert-primary" role="alert">
  This is a primary alert with <a href="javascript:;" class="alert-link">an example link</a>. Give it a click if you like.
</div>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

</div> <!-------- DUYURULAR KISMI BİİTTİİİ----------->


    <div class="col-md-6"> <div style="height: 700px; overflow-x: hidden; overflow-y: scroll;">
<div class="card-body"> 
          <form method="post" action="ogrenci.php?SK=18" enctype="multipart/form-data">
   <div class="form-group"><input class="form-control" id="proje_dosya" name="proje_dosya" type="file">
    <label for="exampleFormControlTextarea1">Anasayfada Metin Yazısı Paylaş</label>
    <textarea class="form-control" name="proje_baslik" id="exampleFormControlTextarea1" rows="3"></textarea> </div> 
    <button type="submit"  name="mesajekle" class="btn btn-info">Paylaş</button>     
</form> </div>

    
      <?php if($MesajSayisi>0){ foreach($MesajKayitlari as $Mesaj){ ?> 
     <div class="card" style="margin-bottom:5px ;margin-top:10px ;">
    
  <div class="card-body">                 
    <h4 class="card-title"><i class="material-icons" style="font-size:48px; float: left;"> account_circle </i>
    <div class="author">   
    <span style="font-weight: bolder;" class="card-title">
  <?php echo DonusumleriGeriDondur($Mesaj["yayinlayankisi"]); ?>
  <p class="card-title"><small class="text-muted"> <i class="material-icons " style="font-size:15px;">query_builder
      </i>   <?php echo TarihBul(DonusumleriGeriDondur($Mesaj["yayintarihi"])); ?> </small></p></span>
<?php   
if(DonusumleriGeriDondur($Mesaj["yayinlayankisi"])==$IsimSoyisim){ //Kullanıcı sadece kendi paylaşımlarını silebilir.
?>
  <a href="ogrenci.php?SK=19&ID=<?php echo DonusumleriGeriDondur($Mesaj["id"]); ?>">
  <button type="button" rel="tooltip" style="float: right;" class="close"  title="Sil">
  <span class="material-icons"> close </span></button></a> <?php   } ?> </div>  </h4>
   
<p class="card-text"> <?php echo DonusumleriGeriDondur($Mesaj["konu"]); ?> </p>
     </div>
  <a href="<?php echo DonusumleriGeriDondur($Mesaj["link"]); ?>">
  <img class="card-img-bottom" style="height: 70%; width: 70%; align:center;margin-bottom: 5%;margin-left: 10%;" src="<?php echo DonusumleriGeriDondur($Mesaj["link"]); ?>" alt="" rel="nofollow">

</a></div> 
<?php  }} ?><!---  --->  
    
    </div></div>
    
    </div>



<?php
}else{
	header("Location:index.php");
	exit();
}
?>