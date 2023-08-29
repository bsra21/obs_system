<!doctype html> <html lang="en"> <head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	<title>OBS-Sistemi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" charset="utf-8"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="bootstrap.min.css" rel="stylesheet"/><script src="https://unpkg.com/scrollreveal"></script>
	<link rel="stylesheet" href="styles.css"><link rel="stylesheet" href="menu.css">
<style>
	@media screen and (max-width: 700px) {.left {	width: 100%;height: 30%;}.slider {width: 100%;height: 70%;margin-top:-100px;}.videokutu iframe{ width:400px; height:200px; margin-left:-10px;}}
</style>
</head>
<body> 
<header id="anasayfa">	<div class="sabitkal"> 	<div class="container" >	<nav class="nav">
<div class="menu-toggle"><i class="fas fa-bars"> </i><i class="fas fa-times"> </i>	</div>	
<a href="index.php" class="logo" style="height: 150px; width: 150px;"> 
<img src="img/logo-2.png" alt="">	</a><ul class="nav-list" style="margin-top: -50px;">
<li class="nav-item"><a href="#anasayfa" class="nav-link active">Anasayfa</a></li>
<li class="nav-item"><a href="http://umitdincerobs.com/" class="nav-link">OBS Giriş</a></li>
<li class="nav-item"><a href="#" class="nav-link" onclick="document.getElementById('id01').style.display='block'">Kullanıcı Giriş</a></li>
<li class="nav-item"><a href="#footer" class="nav-link">İletişim</a></li></ul></nav></div></div>
</header>
<section class="hero" id="hero"><div class="container"><section class="intro">  
<div class="float-right-sm"><div class="left"><h2 class="sub-headline" ><span class="first-letter">M</span>atematik</h2>
<br><h1 class="headline">Her Yerde </h1></div></div><div class="slider"><ul>
	<?php  if($MenuKayitSayisi>0){	foreach($MenuKayitlari as $sonuc){ ?> <li><div class="center-y">
	<a href="<?= $sonuc["link"] ?>"> <img src="img/<?= $sonuc["resim"] ?>" alt="<?= $sonuc["baslik"] ?>"/>
	</a></div> </li> <?php  }}?></ul><ul><nav> <?php for($MenuKayitSayisi;$MenuKayitSayisi>0;$MenuKayitSayisi--) {  ?>   
<a href="#"></a><?php  }?></nav></ul></div>	</section>	</div></section>
<section class="discover-our-story" id="hakkimizda">
			<div class="container">
				<div class="restaurant-info" ><!--    style="margin-left:5%;"     -->
<div class="videokutu" >
<iframe  src="https://player.vimeo.com/video/510417210" width="1000" height="500" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
</div>
				</div>
			</div>
		</section>
<div id="id01" class="modal" ><form class="modal-content animate" action="index.php?SK=4" method="post">
<div class="imgcontainer"><span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <img src="img/logo-2.png" alt="Avatar" class="avatar"></div>
<div class="containerform"><label for="uname"><b>Username</b></label> <input type="text" placeholder="Enter Username" name="EmailAdresi" required>
  <label for="psw"><b>Password</b></label><input type="password" placeholder="Enter Password" name="Sifre" required>
 <center> <button  name="giris" type="submit" >Giriş Yap</button></center><label>
<input type="checkbox" checked="checked" name="remember" > Remember me </label></div>
<div class="containerform" style="background-color:#f1f1f1"> <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  <span class="psw">Forgot <a href="index.php?SK=3">password?</a></span></div>  </form></div>
<script> var modal = document.getElementById('id01');window.onclick = function(event) {if (event.target == modal) {modal.style.display = "none"; }} </script>

<footer><div class="container" id="footer"><div class="back-to-top"><a href="#"><i class="fas fa-chevron-up"></i></a></div>
<div class="footer-content"><div class="footer-content-about animate-top"><h4>Biz Kimiz?</h4><div class="asterisk"><i class="fas fa-asterisk"></i></div>
<p>25 yıllık bilgi, birikim ve tecrübeyi paylaşmak istiyoruz. Kazananlar listemizde yer almak isteyen öğrencileri bekleriz.	</p></div>
<div class="footer-content-divider animate-bottom"><div class="social-media"><h4>Follow</h4><ul class="social-icons">
<li><a href="#"><i class="fab fa-twitter"></i></a></li><li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
<li><a href="#"><i class="fab fa-pinterest"></i></a></li><li><a href="#"><i class="fab fa-linkedin-in"></i></a></li><li><a href="#"><i class="fab fa-tripadvisor"></i></a></li>
</ul></div><div class="newsletter-container"><h4>Sizinle iletişime Geçelim</h4>  
<form action="mail.php" method="post"><div class="newsletter-form" >
<input type="text" name="mesaj" class="newsletter-input" placeholder="Mesajınızı giriniz." style="height:130px;"/> </div>
<div class="newsletter-form" ><input type="text" name="isim" class="newsletter-input" placeholder="Ad-Soyad veya Telefon Numaranızı giriniz." style="height:40px;"/></div>
<div class="newsletter-form" ><input type="text" name="mail" class="newsletter-input" placeholder="Mail adresinizi giriniz." style="height:40px; width:200px;" >
<button name="mailgonder" type="submit" style="float: right;width:50px;"><i class="fas fa-envelope"></i></button></div>
</form></div></div></div></div></footer>
<script type="text/javascript">	$(".owl-carousel").owlCarousel({ items: 2,margin: 20,loop: true, center: true, dots: false }); </script>
<script src="main.js"></script>	<script src="https://use.fontawesome.com/02e491ef33.js"></script> 	<!---->

</body>
</html>