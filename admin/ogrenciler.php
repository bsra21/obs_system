<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
  ?>
 <?php    
    if(isset($_POST["sinif"])){     $GelenSeviye		=	Guvenlik($_POST["sinif"]);
    }else{    $GelenSeviye	=	"";}

    
              $ogrenciSorgusu		=	$VeritabaniBaglantisi->prepare(" select * from ogrenciler a inner join siniflar b on a.sinifID=b.id where b.id=?");
              $ogrenciSorgusu->execute([$GelenSeviye]);  $ogrenciSayisi=	$ogrenciSorgusu->rowCount();
              $ogrenciKaydi		=	$ogrenciSorgusu->fetchAll(PDO::FETCH_ASSOC);

 
              if(isset($_SESSION["Ogretmen"])){ 
                $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar where id=$Ogretmensinif1 or id=$Ogretmensinif2 or id=$Ogretmensinif3 or id=$Ogretmensinif4 or id=$Ogretmensinif5");
                $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
                $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 

              } 
              
              if(isset($_SESSION["Yonetici"])){ 
                $SinifSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM siniflar");
                $SinifSorgusu->execute();			$SinifSayisi		=	$SinifSorgusu->rowCount();
                $SinifKaydi		=	$SinifSorgusu->fetchAll(PDO::FETCH_ASSOC); 
                
              }  
 //------------------------------------------------------------//
 ?>      
         <!--- -->  <form action="#ogrenciler" method="POST">  
         <div class="row">
       <div class="col-md-3" style="float: left;">     <div class="form-group" >
    <select class="selectpicker" data-style="btn btn-success"  id="country" name="sinif">
    <option value="">Seçiminizi Yapınız.. </option>
    <?php   foreach($SinifKaydi as $Ders){     ?> 
 <option value="<?php echo DonusumleriGeriDondur($Ders["id"]); ?>" ><?php echo DonusumleriGeriDondur($Ders["sinifadi"]); ?></option>
<?php }?>
    </select>
  </div></div><div class="col-md-3" style="float:left;">
   </div><div class="col-md-3" style="float: right;">
  <button type="submit" name="ogrenciliste" class="btn btn-success" style="margin-left: 50px;">Listele
</button>  </div>
<div class="col-md-3" style="float: right;">
<a href="index.php?SKD=0&SKI=34" >
  <button type="button" name="ogrenciekle" class="btn btn-success" style="margin-left: 50px;">
  Yeni Öğrenci <i class="material-icons">add</i></button> </a> </div>
        </div>
</form>
<div id="ogrenciler">  
                <div class="container-fluid"  >
  <div class="card shadow mb-4" >
  <div class="justify-content-start d-flex text-left">

<div class="dropdown">
 <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Dışa Aktar
 </button>
 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   <a class="dropdown-item" href="#">
     <button type="button" class="btn btn-dark icon-split btn-sm" onclick="tiklama('kopyala');">
      <span class="icon text-white-60">
      <i class="material-icons">Home</i>
     </span> 
     <span class="text">Kopyala</span>
   </button>
 </a>
 <a class="dropdown-item" href="#">
   <button type="button" class="btn btn-success icon-split btn-sm" onclick="tiklama('excel');">
    <span class="icon text-white-60">
     <i class="far fa-file-excel"></i>
   </span> 
   <span class="text">Excel</span>
 </button>
</a>
<a class="dropdown-item" href="#">
 <button type="button" class="btn btn-danger icon-split btn-sm" onclick="tiklama('pdf');">
  <span class="icon text-white-60">
   <i class="far fa-file-pdf"></i>
 </span> 
 <span class="text">PDF</span>
</button>
</a>
<a class="dropdown-item" href="#">
<button type="button" class="btn btn-info icon-split btn-sm" onclick="tiklama('csv');">
<span class="icon text-white-60">
 <i class="fas fa-file-csv"></i>
</span> 
<span class="text">CSV</span>
</button>
</a>
</div>
</div>
  </div>
 <div class="table-responsive " >
 <table class="table table-bordered" id="musteritablosu" width="98%" cellspacing="0" style="margin-left: 5px;">
    <thead><tr><th>Öğrenci Adı</th><th>Email</th><th>Telefon Numarası</th><th>Şifre</th><th>Öğrenci Numarası</th><th>TC Kimlik No</th><th>Kayıt Tarihi</th><th>İşlemler</th></tr></thead><tbody>
  
    <?php   foreach($ogrenciKaydi as $ogr){     ?> 
    <tr><td><?php echo DonusumleriGeriDondur($ogr["IsimSoyisim"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($ogr["EmailAdresi"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($ogr["TelefonNumarasi"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($ogr["Sifre"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($ogr["ogrenciNumarasi"]); ?></td>
    <td><?php echo DonusumleriGeriDondur($ogr["TCKimlik"]); ?></td>
    <td><?php echo TarihBul(DonusumleriGeriDondur($ogr["KayitTarihi"])); ?></td>
    <td style="width: 120px;"><div>
 <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" title="Detaylar">
         <i class="material-icons">remove_red_eye</i> </button>

         <a href="index.php?SKD=0&SKI=28&ID=<?php echo DonusumleriGeriDondur($ogr["id"]); ?>">
  <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>

    <button type="button" class="btn btn-success btn-fab btn-fab-mini btn-round" title="Düzenle">
   <i class="material-icons">edit</i>
        </button></div>
  </td></tr>
<?php } ?> 
</tbody>

</table></div></div>
</div>

 </div>   

     








<script>
 $("#country").change(function(){
  var e = document.getElementById("country");
    var result = e.options[e.selectedIndex].value;
    document.getElementById("result").innerHTML = result;
    
 });
 $("#country2").change(function(){
  var e = document.getElementById("country2");
    var result = e.options[e.selectedIndex].value;
    document.getElementById("result2").innerHTML = result;
 
 });
 
</script> 




          <?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>

