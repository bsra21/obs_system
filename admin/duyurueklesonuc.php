
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){

    if (isset($_POST['duyuruekle'])) {
//Proje detaylarını veritabanınına kayıt etme
        $projeekle=$VeritabaniBaglantisi->prepare("INSERT INTO duyurular SET
         yazi=:baslik,yayinlayankisi=:kisi,yayintarihi=:tarih,goruntusayisi=:gor       ");

         if(isset($_SESSION["Yonetici"])){ 
            $ekleme=$projeekle->execute(array(
              'baslik' => Guvenlik($_POST['proje_baslik']) ,
              'tarih' => $ZamanDamgasi ,
              'kisi' =>$YoneticiKullaniciAdi,'gor' => 0  )); 
        }
      
        if(isset($_SESSION["Ogretmen"])){ 
           $ekleme=$projeekle->execute(array(
              'baslik' => Guvenlik($_POST['proje_baslik']) ,
              'tarih' => $ZamanDamgasi ,
              'kisi' =>$OgretmenKullaniciAdi,'gor' => 0  ));
        }

        if ($_FILES['proje_dosya2']['error']=="0") {
          $yuklemeklasoru = '../dosyalar';
          @$gecici_isim = $_FILES['proje_dosya2']["tmp_name"];
          @$dosya_ismi = $_FILES['proje_dosya2']["name"];
          $benzersizsayi1=rand(100000,999999);
          $isim=$benzersizsayi1.$dosya_ismi;
          $resim_yolu=substr($yuklemeklasoru, 3)."/".TumBosluklariSil($isim);
          @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
          $son_eklenen_id=$VeritabaniBaglantisi->lastInsertId();
          $dosyayukleme=$VeritabaniBaglantisi->prepare("UPDATE duyurular SET
           link=:dosya_yolu WHERE id=:proje_id ");

          $yukleme=$dosyayukleme->execute(array(
           'dosya_yolu' => $resim_yolu,
           'proje_id' => $son_eklenen_id
         ));
        }
        
        if ($ekleme) {
            header("Location:index.php?SKD=0&SKI=0");
         exit;
       } else {
        header("Location:index.php?SKD=0&SKI=7");
         exit;
       }
       header("Location:index.php?SKD=0&SKI=7");
       exit;
     }


      }  else{	header("Location:index.php?SKD=1");	exit();  }
?>