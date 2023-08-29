<?php
if(isset($_SESSION["Yonetici"])){


if (isset($_POST['sliderekleme'])) {

    if(isset($_POST["saat"])){ $saat		=	Guvenlik($_POST["saat"]);    }
    else{$saat	=	"";    }
    if(isset($_POST["link"])){  $link		=	Guvenlik($_POST["link"]);
    }else{       $link	=	"";    }
     $hata = '';    
     if($link==""){      $link="#";   } else{ }
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


else {
header("Location:index.php?SKD=0&SKI=7");    exit();   }
      } 
 else {       header("Location:index.php?SKD=0&SKI=7");     exit();    }


}else{	header("Location:index.php?SKD=1");	exit();}
?>



