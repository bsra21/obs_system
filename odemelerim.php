<?php   /* 
if(isset($_SESSION["Kullanici"])){
 
  $EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("select a.id,a.konu,a.link,b.dersadi from pdfler a inner join dersler b on a.dersid=b.id");
  $EnYeniUrunlerSorgusu->execute();
  $EnYeniUrunSayisi			=	$EnYeniUrunlerSorgusu->rowCount();
  $EnYeniUrunKayitlari	=	$EnYeniUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);  ?>
<div class="container-fluid"  >
  <div class="card shadow mb-4" ><div class="card-header py-3" >
      <h6 class="m-0 font-weight-bold text-primary">Konu Anlatımlar</h6></div>
 <div class="table-responsive mt-3" style="margin-left: 5px; ">
  <table class="table table-bordered" id="musteritablosu" style="width:97%;" >
    <thead><tr><th>Ders Adı</th><th>Konu </th><th>İşlemler</th></tr></thead>
    <tbody><tr>  <?php  foreach($EnYeniUrunKayitlari as $kayit){ ?> <td>
  <form action="#dosyalama" method="POST">
  <input type="hidden" name="proje_id" value="<?php echo DonusumleriGeriDondur($kayit["id"]); ?>">
  <button type="submit" name="proje_bak" class="btn btn-primary" >
    <span class="icon text-white-60"><i class="material-icons">picture_as_pdf</i></span> </button>
  </form>  </td></tr><?php } ?></tbody> </table></div></div></div>
<div id="dosyalama"> <?php  if (isset($_POST['proje_bak'])) {?>
	<div class="content">  <div class="container-fluid">      <?php	
	if((!$SayfaCiktiDegeri) or ($SayfaCiktiDegeri=="") or ($SayfaCiktiDegeri==0)){ include($Sayfacikti[0]);
	}else{		include($Sayfacikti[0]);	}	?>  </div> </div><?php   }  ?></div>

<?php  }else{	header("Location:index.php");	exit(); }?>*/