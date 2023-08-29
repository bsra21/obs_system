<!--   
      <div>
    <div class="card-header" role="tab" id="headingTwo">
        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
   <li class="nav-item ">
    <i class="material-icons">notifications</i>  <p>Canlı Ders</p>    </li>
        </a>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="#"  target="mesaj"><i class="material-icons">Anasayfa</i> 1</a>
  </li>
 <li class="nav-item">
    <a class="nav-link" href="#"  target="mesaj"> <i class="material-icons">Home</i> 2</a>
  </li></ul>
    </div>
    </div>
</div>     
--->





 <!--
<div class="container-fluid">

  DataTales Giriş 
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Müşteriler</h6>
    </div>
    <div class="card-body">



      <div class="justify-content-start d-flex text-left">

       <div class="dropdown">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dışa Aktar
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">
            <button type="button" class="btn btn-dark icon-split btn-sm" onclick="tiklama('kopyala');">
             <span class="icon text-white-60">
             <i class="material-icons">Home</i>
            </span> 
            <span class="text">Kopyala</span>
          </button>
        </a>
        <a class="dropdown-item" href="#">
          <button type="button" class="btn btn-success icon-split btn-sm" onclick="tiklama('excel');">
           <span class="icon text-white-60">
            <i class="far fa-file-excel"></i>
          </span> 
          <span class="text">Excel</span>
        </button>
      </a>
      <a class="dropdown-item" href="#">
        <button type="button" class="btn btn-danger icon-split btn-sm" onclick="tiklama('pdf');">
         <span class="icon text-white-60">
          <i class="far fa-file-pdf"></i>
        </span> 
        <span class="text">PDF</span>
      </button>
    </a>
    <a class="dropdown-item" href="#">
      <button type="button" class="btn btn-info icon-split btn-sm" onclick="tiklama('csv');">
       <span class="icon text-white-60">
        <i class="fas fa-file-csv"></i>
      </span> 
      <span class="text">CSV</span>
    </button>
  </a>
 </div>
  </div>



<a href="#" class="ml-2 mb-2"><button type="button" class="btn btn-danger btn-sm">Müşteri Yükle</button></a>

<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
  <button type="submit" class="btn btn-info btn-sm ml-2" name="telefon-aktar">Telefonları Aktar</button>
</form>

<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
  <button type="submit" class="btn btn-success btn-sm ml-2" name="mail-aktar">Mailleri Aktar</button>
</form>

<form action="islemler/ajax.php" method="POST" accept-charset="utf-8">
  <button type="submit" class="btn btn-warning btn-sm ml-2" name="isim-mail-telefon-aktar">İsim-Mail-Telefon Aktar</button>
</form>

</div>

<div class="table-responsive mt-3">
  <table class="table table-bordered" id="musteritablosu">
    <thead>
      <tr>
        <th>No</th>
        <th>Müşteri İsim</th>
        <th>Müşteri Mail</th>
        <th>Müşteri Telefon</th>
        <th>Müşteri Şehir</th>
        <th>Müşteri Meslek</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td>e</td>
          <td>q</td>
          <td>w</td>
          <td>d</td>
          <td>s</td>
          <td>a</td>
          <td>
            <div class="row justify-content-center">
              <form action="musteriduzenle.php" method="POST" accept-charset="utf-8">
                <input type="hidden" name="musteri_id" value="">
                <button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-edit"></i>
                  </span>
                </button>
              </form>
              <form class="mx-1" action="islemler/ajax.php" method="POST" accept-charset="utf-8">
                <input type="hidden" name="musteri_id" value="">
                <button type="submit" name="musterisilme" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-trash"></i>
                  </span>
                </button>
              </form>
              <form action="musteri.php" method="POST" accept-charset="utf-8">
                <input type="hidden" name="musteri_id" value="">
                <button type="submit" name="duzenleme" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-eye"></i>
                  </span>
                </button>
              </form>
            </div>
          </td>
        </tr>
         
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Müşteri İsim</th>
        <th>Müşteri Mail</th>
        <th>Müşteri Telefon</th>
        <th>Müşteri Şehir</th>
        <th>Müşteri Meslek</th>
      </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>-->



<?php

if(isset($_SESSION["Kullanici"])){

?>



<div id='wrap'>
<div id='fullCalendar' style="width: 650px;"></div>
<div style='clear:both'></div>
</div>






<?php
}else{
	header("Location:index.php");
	exit();
}
?>

