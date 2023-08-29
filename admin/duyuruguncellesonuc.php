
<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){

//sliderguncelle   konu--yazı   ,,,link--resim
if(isset($_POST["duyuruguncelle"])){

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
      /*  $dosyayukleme=$VeritabaniBaglantisi->prepare("update duyurular set yazi='$saat',link='$resim_yolu' , yayintarihi='$ZamanDamgasi'
         where id='$GelenID' ");
         $durum = $VeritabaniBaglantisi->query ($dosyayukleme); 
   */

  $sql = "update duyurular set yazi='$saat',link='$resim_yolu' ,yayintarihi='$ZamanDamgasi' where id='$GelenID'";
  $durum = $VeritabaniBaglantisi->query ($sql); 
       if ($durum>0) { header("Location:index.php?SKD=0&SKI=0"); exit(); }

                          else {  header("Location:index.php?SKD=0&SKI=7");  exit();}
   
    }
   else { 
    $sql = "update duyurular set yazi='$saat',yayintarihi='$ZamanDamgasi' where id='$GelenID'";
    $durum = $VeritabaniBaglantisi->query ($sql); 
         if ($durum>0) { header("Location:index.php?SKD=0&SKI=0"); exit(); }
  
                            else {  header("Location:index.php?SKD=0&SKI=7");  exit();}
    
    }

 }}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>
