<?php
if(isset($_SESSION["Yonetici"]) || isset($_SESSION["Ogretmen"])){
  $EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("select a.id,a.konu ,a.link,a.yayintarihi,a.yayinlayankisi, b.dersadi from pdfler a inner join dersler b on a.dersid=b.id");
  $EnYeniUrunlerSorgusu->execute();
  $EnYeniUrunSayisi			=	$EnYeniUrunlerSorgusu->rowCount();
  $EnYeniUrunKayitlari		=	$EnYeniUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);

?>   <!--------  <div style="height: 400px; overflow-x: hidden; overflow-y: scroll;"> </div>---------->
<div class="card card-nav-tabs card-plain"> <div class="card-header card-header-danger">
   <!--  colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
 <div class="nav-tabs-navigation">  <div class="nav-tabs-wrapper"><ul class="nav nav-tabs" data-tabs="tabs"> 
<li class="nav-item"> <a class="nav-link active" href="#home" data-toggle="tab">Dokümanlar</a> </li>
<li class="nav-item"><a class="nav-link" href="index.php?SKD=0&SKI=38" >Doküman Ekle</a></li>
</ul>   </div> </div>    </div><div class="card-body "> <div class="tab-content text-center">
    <div class="tab-pane active" id="home"><div class="container-fluid"><div class="card shadow mb-4" >
 <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" style="width:97%;" >
    <thead><tr><th>Dokümanlar</th><th>Ders İsmi</th><th>Yayın Tarihi</th><th>Yayınlayan Kişi</th><th>İşlemler</th></tr></thead><tbody>
  <?php   foreach($EnYeniUrunKayitlari as $kayit){?> 
    <tr><td><a href="../<?php echo DonusumleriGeriDondur($kayit["link"]); ?>"><?php echo DonusumleriGeriDondur($kayit["konu"]); ?></a></td>
    <td><?php echo DonusumleriGeriDondur($kayit["dersadi"]); ?></td>
    <td><?php echo TarihBul(DonusumleriGeriDondur($kayit["yayintarihi"])); ?></td>
    <td><?php echo DonusumleriGeriDondur($kayit["yayinlayankisi"]); ?></td>
    <td><div>
    <a class="btn btn-info btn-fab btn-fab-mini btn-round"   rel="tooltip"
         title="Download file" href="../<?php echo DonusumleriGeriDondur($kayit["link"]); ?>" download="" 
         target="_blank"><i class="material-icons">download</i></a> 
         <a href="index.php?SKD=0&SKI=32&ID=<?php echo DonusumleriGeriDondur($kayit["id"]); ?>">
  <button type="button" class="btn btn-danger btn-fab btn-fab-mini btn-round" title="Sil">
   <i class="material-icons">delete</i></button></a>
</div>  </td></tr><?php } ?> </tbody>
</table></div></div></div></div><!----- PDF BİTTİ----------->
<!---------------->
<!------></div>    </div>  </div>




<?php } else{	header("Location:index.php?SKD=1");	exit();} ?>






