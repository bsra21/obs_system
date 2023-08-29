
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){

    if (isset($_POST['pdfekle'])) {
//Proje detaylarını veritabanınına kayıt etme
        $projeekle=$VeritabaniBaglantisi->prepare("INSERT INTO pdfler SET
         konu=:baslik,yayintarihi=:tarih,yayinlayankisi=:kisi,dersid=:did ");

        $ekleme=$projeekle->execute(array(
         'baslik' => Guvenlik($_POST['proje_baslik']) ,
         'tarih' => $ZamanDamgasi,
         'kisi' =>$YoneticiKullaniciAdi,
         'did' => Guvenlik($_POST['dersid'])  ));

        if ($_FILES['proje_dosya']['error']=="0") {
          $yuklemeklasoru = '../dosyalar';
          @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
          @$dosya_ismi = $_FILES['proje_dosya']["name"];
          $benzersizsayi1=rand(100000,999999);
          $isim=$benzersizsayi1.$dosya_ismi;
          $resim_yolu=substr($yuklemeklasoru, 3)."/".TumBosluklariSil($isim);
          @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
          $son_eklenen_id=$VeritabaniBaglantisi->lastInsertId();
          $dosyayukleme=$VeritabaniBaglantisi->prepare("UPDATE pdfler SET
           link=:dosya_yolu WHERE id=:proje_id ");

          $yukleme=$dosyayukleme->execute(array(
           'dosya_yolu' => $resim_yolu,
           'proje_id' => $son_eklenen_id
         ));
        }
        
        if ($ekleme) {
            header("Location:index.php?SKD=0&SKI=6");
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