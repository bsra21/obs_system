<?php
if(isset($_SESSION["Kullanici"])){
  $EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("select a.id,a.konu,a.link,b.dersadi,a.yayintarihi, a.yayinlayankisi from pdfler a inner join dersler b on a.dersid=b.id");
  $EnYeniUrunlerSorgusu->execute();  $EnYeniUrunSayisi			=	$EnYeniUrunlerSorgusu->rowCount();
  $EnYeniUrunKayitlari		=	$EnYeniUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-fluid"  >  <div class="card shadow mb-4" ><div class="card-header py-3" >
 <h6 class="m-0 font-weight-bold text-primary">Konu Anlatımlar</h6></div>
 <div class="table-responsive mt-3" style="margin-left: 5px; ">
  <table class="table table-bordered" id="musteritablosu" style="width:97%;" >
    <thead><tr><th>Ders Adı</th><th>Konu </th><th>Yayın Tarihi</th><th>Yayınlayan kişi </th><th>İşlemler</th></tr></thead> <tbody>
  <?php  foreach($EnYeniUrunKayitlari as $kayit){?> 
<tr><td><?php echo DonusumleriGeriDondur($kayit["dersadi"]); ?></td>
<td><?php echo DonusumleriGeriDondur($kayit["konu"]); ?></td>
<td><?php echo TarihBul(DonusumleriGeriDondur($kayit["yayintarihi"])); ?></td>
<td><?php echo DonusumleriGeriDondur($kayit["yayinlayankisi"]); ?></td><td> 
<a class="btn btn-info btn-fab btn-fab-mini btn-round"   rel="tooltip"
         title="Download file" href="<?php echo DonusumleriGeriDondur($kayit["link"]); ?>" download="" 
         target="_blank"><i class="material-icons">download</i></a>         
 </td></tr><?php } ?></tbody> </table></div></div></div>

<!----
 <?php   if (isset($_POST['proje_bak'])) {  if (is_numeric($_POST['proje_id'])) {
if(isset($_POST["proje_id"])){ $Gelenproje_id	=	Guvenlik($_POST["proje_id"]); }else{$Gelenproje_id=""; }
  $pdfidSorgusu	=	$VeritabaniBaglantisi->prepare("SELECT * FROM pdfler WHERE id = ? LIMIT 1");
$pdfidSorgusu->execute([$Gelenproje_id]);$pdfidSayisi	=	$pdfidSorgusu->rowCount();
$pdfidBilgisi	=	$pdfidSorgusu->fetch(PDO::FETCH_ASSOC); $dosyayolu= DonusumleriGeriDondur($pdfidBilgisi["link"]);   ?>
<div class="col-md-6" id=deneme> <div class="card"> <div class="card-body">
<?php if (strlen($dosyayolu)>10) { ?> <div class="form-row mt-2"><div class="col-md-12"><div class="file-loading">
<input class="form-control" id="projedosyalari" name="proje_dosya" type="file"></div></div></div>	<?php }}} ?>	</div> </div></div>
--->
<?php  }else{ 	header("Location:index.php");	exit();  }  ?>