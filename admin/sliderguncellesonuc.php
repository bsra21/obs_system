
<?php
if(isset($_SESSION["Yonetici"])){

//sliderguncelle
if(isset($_POST["sliderguncelle"])){

   	$GelenID		=	Guvenlik($_POST["ID"]);

     if(isset($_POST["saat"])){          $saat		=	Guvenlik($_POST["saat"]);
      }else{          $saat	=	"";      }
      if(isset($_POST["link"])){          $link		=	Guvenlik($_POST["link"]);
      }else{          $link	=	"";      }
       $hata = '';
    if($link==""){          $link="#";  } else{ }
       if (isset($_FILES['resim'])) {

          if ($_FILES['resim']['error'] != 0) {
              $hata .= 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';
          } else {
  
              $dosya_adi = strtolower($_FILES['resim']['name']);
              if (file_exists('images/' . $dosya_adi)) {
                  $hata .= " $dosya_adi diye bir dosya var";
              } else {
                  $boyut = $_FILES['resim']['size'];
                  if ($boyut > (1024 * 1024 * 2)) {
                      $hata .= ' Dosya boyutu 2MB den büyük olamaz.';
                  } else {
                      $dosya_tipi = $_FILES['resim']['type'];
                      $dosya_uzanti = explode('.', $dosya_adi);
                      $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];
  
                      if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg','jpeg'])) {
                          $hata .= ' Hata, dosya türü JPEG veya PNG olmalı.';
                      } else {
                          $foto = $_FILES['resim']['tmp_name'];
                          copy($foto, '../img/' . $dosya_adi);
  
     
                          //Eklencek veriler diziye ekleniyor
                          $satir = [
                              'resim' => $dosya_adi,
                             'saat' => $saat,
                             'link' => $link,
                          ];
  
                          // Veri ekleme sorgumuzu yazıyoruz.
          //UPDATE ders_prog SET ders_adi='$ders_adi',link='$link' WHERE id='$id'           

          $sql = "update slider set resim='$dosya_adi' , baslik='$saat',link='$link' where id='$GelenID'";
          //  $MenuGuncellemeSorgusu	=	$VeritabaniBaglantisi->prepare("UPDATE slider SET resim = ?,baslik=?,link=? WHERE id = ? LIMIT 1");
	//	$MenuGuncellemeSorgusu->execute([$dosya_adi,$saat,$link, $GelenID]);
                           //   $sql = "insert into slider(baslik,link)values('$saat','$link')"; } 
                          $durum = $VeritabaniBaglantisi->query ($sql); 
                          if ($durum>0) { header("Location:index.php?SKD=0&SKI=15"); exit();}


                          else {  header("Location:index.php?SKD=0&SKI=7");  exit();}
                   
                  }
              }
          } 
      } 
     }else {  
        $sql = "update slider set baslik='$saat',link='$link' where id='$GelenID'";
              $durum = $VeritabaniBaglantisi->query ($sql); 
                        if ($durum>0) { header("Location:index.php?SKD=0&SKI=15"); exit();}
        
        else{
        header("Location:index.php?SKD=0&SKI=7");  exit();}
}
 }}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>
