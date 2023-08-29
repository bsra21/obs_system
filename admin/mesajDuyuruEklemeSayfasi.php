<?php
if(isset($_SESSION["Yonetici"])  or isset($_SESSION["Ogretmen"])){
?>
<script src="../vendor/jquery/jquery.min.js"></script>
<div class="card card-nav-tabs card-plain">
    <div class="card-header card-header-info">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php?SKD=0&SKI=0">Paylaşım-Duyuru Listesi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#updates" data-toggle="tab">Yeni Paylaşım-Duyuru</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><div class="card-body ">
        <div class="tab-content text-center">
            <div class="tab-pane active" id="updates">
          
            <div class="row">

<div class="col-md-6"><div class="card"> <div class="card-header">
      </div><div class="card-body"> 
          <form method="post" action="index.php?SKD=0&SKI=14" enctype="multipart/form-data">
          <label for="exampleFormControlTextarea1">"jpg", "png", "jpeg", "mp4", "zip", "rar","pdf","txt","docx" uzantılı dosya ekleyebilirsiniz.</label>
    <div class="form-group"><input class="form-control" id="proje_dosya" name="proje_dosya" type="file">
    <label for="exampleFormControlTextarea1">Anasayfada Metin Yazısı Paylaş</label>
    <textarea class="form-control" name="proje_baslik" id="exampleFormControlTextarea1" rows="3"></textarea> </div> 
    <button type="submit"  name="mesajekle" class="btn btn-info">Paylaş</button>     
</form> </div></div> </div>
<!-------EKLE---->
<div class="col-md-6"> <div class="card"><div class="card-header">
       
 </div><div class="card-body"> 
          <form method="post" action="index.php?SKD=0&SKI=5" enctype="multipart/form-data">
          <label for="exampleFormControlTextarea1">"jpg", "png", "jpeg", "mp4", "zip", "rar","pdf","txt","docx" uzantılı dosya ekleyebilirsiniz.</label>
    <div class="form-group"><input class="form-control" id="proje_dosya2" name="proje_dosya2" type="file">
    <label for="exampleFormControlTextarea1">Anasayfada Duyuru Yazısı Paylaş</label>
    <textarea class="form-control" name="proje_baslik" id="exampleFormControlTextarea1" rows="3"></textarea> </div> 
    <button type="submit"  name="duyuruekle" class="btn btn-info">Ekle</button>     
</form> </div></div></div>
  <!------------------------------------------>
</div>

        </div>
           
        </div>
    </div>
  </div>

























          <?php
}else{
	header("Location:index.php?SKD=1");
	exit();
}
?>
