
<?php
if(isset($_SESSION["Kullanici"])){

    if (isset($_POST['mesajekle'])) {
//Proje detaylarını veritabanınına kayıt etme
        $projeekle=$VeritabaniBaglantisi->prepare("INSERT INTO metinpaylasim SET
         konu=:baslik,yayintarihi=:tarih,yayinlayankisi=:kisi       ");

        $ekleme=$projeekle->execute(array(
         'baslik' => Guvenlik($_POST['proje_baslik']), 'tarih' => $ZamanDamgasi ,
         'kisi' =>$IsimSoyisim   ));

        if ($_FILES['proje_dosya']['error']=="0") {
          $yuklemeklasoru = 'dosyalar';
          @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
          @$dosya_ismi = $_FILES['proje_dosya']["name"];
          $benzersizsayi1=rand(100000,999999);
          $isim=$benzersizsayi1.$dosya_ismi;
          $resim_yolu=substr($yuklemeklasoru, 0)."/".TumBosluklariSil($isim);
          @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
          $son_eklenen_id=$VeritabaniBaglantisi->lastInsertId();
          $dosyayukleme=$VeritabaniBaglantisi->prepare("UPDATE metinpaylasim SET
           link=:dosya_yolu WHERE id=:proje_id ");

          $yukleme=$dosyayukleme->execute(array(
           'dosya_yolu' => $resim_yolu,           'proje_id' => $son_eklenen_id         ));        }

        if ($ekleme) {    header("Location:ogrenci.php?SK=6");      exit;
       } else {      header("Location:ogrenci.php?SK=6");        exit;
       }    header("Location:ogrenci.php?SK=6");       exit;
     }


/*
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
                       $sql = "insert into slider(resim,baslik,link)values('$dosya_adi','$saat','$link')";
                     $durum = $VeritabaniBaglantisi->query ($sql); 
                      
                        if ($durum) {
                            header("Location:index.php?SKD=0&SKI=15"); 
             
                        }
                    }
                }
            }
        }
    }
*/



      }  else{	header("Location:index.php");	exit();  }
?>