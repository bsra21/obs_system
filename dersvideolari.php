	<?php
  if(isset($_SESSION["Kullanici"])){
			$BannerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM dersler");
			$BannerSorgusu->execute();			$BannerSayisi		=	$BannerSorgusu->rowCount();
			$BannerKaydi		=	$BannerSorgusu->fetchAll(PDO::FETCH_ASSOC);
//ders başlıklarını çek
    ?>
    <style>
    .boyut{width: 25%;float: left; }
    .scroolll{height: 420px; overflow-x: hidden; overflow-y: scroll;}
    @media (max-width:765px){
.boyut{width:100%; float: none;}
.videoyon{float: none;margin-right:0px;  margin-top:2px;}
.scroolll{height: 250px;}
.videokutu iframe{ width:400px; height:200px; margin-left:15%;}
    }   </style>
 <div id="accordion" class="boyut" role="tablist">
 <div class="scroolll" >
 <?php   foreach($BannerKaydi as $Ders){     ?>
  <div class="card card-collapse" style="margin-bottom:5px ;margin-top:2px ;">
    <div class="card-header" role="tab" id="heading<?php echo DonusumleriGeriDondur($Ders["id"]); ?>">
      <h5 class="mb-0">
      <a class="collapsed" data-toggle="collapse" href="#collapse<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" aria-expanded="false" aria-controls="collapse<?php echo DonusumleriGeriDondur($Ders["id"]); ?>">
      <?php echo DonusumleriGeriDondur($Ders["dersadi"]); ?>
      <i class="material-icons" style="float: right;">keyboard_arrow_down</i> </a></h5></div>
   
      <div id="collapse<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" data-parent="#accordion">
       <div class="card-body"> <!-- O derse ait konu başlıkları çek    class="fullscreen-icon"-->
       <?php   $ders_id=$Ders["id"]; 
				$EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM videolar WHERE dersid='$ders_id' and (sinifid='$KullanicisinifID' or sinifid2='$KullanicisinifID' or sinif_id3='$KullanicisinifID')");
				$EnYeniUrunlerSorgusu->execute(); //SELECT * FROM videolar WHERE dersid=1 and (sinifid=1 or sinifid2=1 or sinif_id3=1)
				$EnYeniUrunSayisi			=	$EnYeniUrunlerSorgusu->rowCount();
				$EnYeniUrunKayitlari		=	$EnYeniUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);
     foreach($EnYeniUrunKayitlari as $kayit){?>
   <ul class="nav flex-column">  <li class="nav-item">
    <a class="nav-link" href="<?php echo $kayit["link"]; ?>"  target="mesaj"><?php echo $kayit["konu"]; ?></a>
  </li></ul><?php  }  ?>  </div>  </div>  </div>  <?php } ?></div>
 </div>
<div class="videoyon"  style=" margin-right:5%; float:right; margin-top:20px; "> 
<div class="videokutu">
 <iframe name="mesaj" src="https://player.vimeo.com/video/510417210"  width="768" height="460" scrolling=”no”  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
</iframe>
</div> </div>






 <?php
}else{
	header("Location:index.php");
	exit();
}
?>

