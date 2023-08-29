
      <?php 
    //  $EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("select * from pdfler a inner join dersler b on a.dersid=b.id");
      $EnYeniUrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("select * from duyurular");
      $EnYeniUrunlerSorgusu->execute();
      $EnYeniUrunSayisi			=	$EnYeniUrunlerSorgusu->rowCount();
      $EnYeniUrunKayitlari		=	$EnYeniUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);
      
       ?>

<!---
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
--><script src="../vendor/jquery/jquery.min.js"></script>



<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Proje Ekle</h5>
    </div>
    <div class="card-body">
      <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Proje Başlık</label>
            <input type="text" class="form-control" name="proje_baslik" placeholder="Projenin Başlığı">
          </div>
          <div class="form-group col-md-6">
            <label>Bitirme Tarihi</label>
            <input type="date" class="form-control" name="proje_teslim_tarihi" placeholder="Projenin Bitirilmesi Gereken Tarih">
          </div>
        </div>

        <div class="form-row justify-content-center">
         <div class="col-md-6">
          <div class="file-loading">
            <input class="form-control" id="proje_dosya" name="proje_dosya" type="file">
          </div>
        </div>
      </div>
      <div class="form-row mt-2">
        <div class="form-group col-md-12">
          <textarea class="ckeditor" name="proje_detay" id="editor"></textarea>
        </div>
      </div>
      <button type="submit" name="projeekle" class="btn btn-primary">Kaydet</button>
    </form>
  </div>
</div>
</div>







