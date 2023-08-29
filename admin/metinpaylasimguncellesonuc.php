
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){

//sliderguncelle   konu--yazı   ,,,link--resim
if(isset($_POST["mesajguncelle"])){

   	$GelenID		=	Guvenlik($_GET["ID"]);
     if(isset($_POST["saat"])){          $saat		=	Guvenlik($_POST["saat"]);
      }else{          $saat	=	"";      }
       $hata = '';

       if ($_FILES['proje_dosya']['error']=="0") {
        $yuklemeklasoru = '../dosyalar';
        @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
        @$dosya_ismi = $_FILES['proje_dosya']["name"];
        $benzersizsayi1=rand(100000,999999);
        $isim=$benzersizsayi1.$dosya_ismi;
        $resim_yolu=substr($yuklemeklasoru, 3)."/".TumBosluklariSil($isim);
        @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
        $son_eklenen_id=$VeritabaniBaglantisi->lastInsertId();
     //   $dosyayukleme=$VeritabaniBaglantisi->prepare("update metinpaylasim set konu='$saat',link='$resim_yolu' , yayintarihi='$ZamanDamgasi'
    //     where id='$GelenID' ");
     //    $durum = $VeritabaniBaglantisi->query ($dosyayukleme); 
  /*      $yukleme=$dosyayukleme->execute(array(
         'dosya_yolu' => $resim_yolu,
         'proje_id' => $son_eklenen_id
       ));*/     
       $sql = "update metinpaylasim set konu='$saat',link='$resim_yolu' , yayintarihi='$ZamanDamgasi' where id='$GelenID'";
    $durum = $VeritabaniBaglantisi->query ($sql); 


       if ($durum>0) { header("Location:index.php?SKD=0&SKI=0"); exit();}


                          else {  header("Location:index.php?SKD=0&SKI=7");  exit();}
   
    }

/*
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
                          ];
  
                          // Veri ekleme sorgumuzu yazıyoruz.
          //UPDATE ders_prog SET ders_adi='$ders_adi',link='$link' WHERE id='$id'           

          $sql = "update metinpaylasim set konu='$saat',link='$dosya_adi' , yayintarihi='$ZamanDamgasi' where id='$GelenID'";
          //  $MenuGuncellemeSorgusu	=	$VeritabaniBaglantisi->prepare("UPDATE slider SET resim = ?,baslik=?,link=? WHERE id = ? LIMIT 1");
	//	$MenuGuncellemeSorgusu->execute([$dosya_adi,$saat,$link, $GelenID]);
                           //   $sql = "insert into slider(baslik,link)values('$saat','$link')"; } 
                          $durum = $VeritabaniBaglantisi->query ($sql); 
                       
               
                   
                  }
              }
          } 
      } 
     }    */  
      else {  
         
        $sql2 = "update metinpaylasim set konu='$saat',yayintarihi='$ZamanDamgasi' where id='$GelenID'";
        $durum2 = $VeritabaniBaglantisi->query ($sql2); 
           if ($durum2) { header("Location:index.php?SKD=0&SKI=0"); exit();}
    else {  header("Location:index.php?SKD=0&SKI=7");  exit();}
        
        
        header("Location:index.php?SKD=0&SKI=7");  exit();}

 }}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>
