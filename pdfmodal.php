<?php 

if(isset($_SESSION["Kullanici"])){
 
    if (isset($_POST['proje_bak'])) {
      if (is_numeric($_POST['proje_id'])) {
    
            if(isset($_POST["proje_bak"])){
                $Gelenproje_bak		=	Guvenlik($_POST["proje_bak"]);
            }else{
                $Gelenproje_bak		=	"";
            }
            if(isset($_POST["proje_id"])){
                $Gelenproje_id	=	Guvenlik($_POST["proje_id"]);
            }else{
                $Gelenproje_id	=	"";
            }
         $pdfidSorgusu	=	$VeritabaniBaglantisi->prepare("SELECT * FROM pdfler WHERE id = ? LIMIT 1");
            $pdfidSorgusu->execute([$Gelenproje_id]);
            $pdfidSayisi		=	$pdfidSorgusu->rowCount();
            $pdfidBilgisi	=	$pdfidSorgusu->fetch(PDO::FETCH_ASSOC);
           
          $dosyayolu= DonusumleriGeriDondur($pdfidBilgisi["link"]);
    ?>
  <div class="col-md-6" id=deneme>
  <div class="card">
    <div class="card-body">
  <?php if (strlen($dosyayolu)>10) { ?>
                          <div class="form-row mt-2">
                              <div class="col-md-12">
                                  <div class="file-loading">
                                      <input id="projedosyalari"  type="file">
                                  </div>
                              </div>
                          </div>	
                      <?php }}} ?>	
  </div>
  </div>
</div>

<?php
}else{
	header("Location:index.php");
	exit();
}
?>