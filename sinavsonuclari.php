<?php

if(isset($_SESSION["Kullanici"])){

?>
   <div class="card card-nav-tabs">
  <h4 class="card-header card-header-info">Sınavlar</h4>
  <div class="card-body">



  <div class="container-fluid"  >

<!-- DataTales Giriş -->
<div class="card shadow mb-4" >

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
  </div>


<div class="table-responsive mt-3" style="margin-left: 5px; ">
<table class="table table-bordered" id="musteritablosu" style="width:97%;" >
  <thead>
    <tr>
    <th>Deneme Adı</th>
      <th>Mat-D </th>
      <th>Mat-Y </th>
      <th>Trkc-D </th>
      <th>Trkc-Y </th>
      <th>Fzk-D </th>
      <th>Fzk-Y </th>
      <th>Kmy-D </th>
      <th>Kmy-Y </th>
      <th>Bylj-D </th>
      <th>Bylj-Y </th>
      <th>Geo-D </th>
      <th>Geo-Y </th>
      <th>İnk-D </th>
      <th>İnk-Y </th>
    </tr>
  </thead>
  <tbody>
      <tr>
      <td>Eksen Yayınları</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
        <td>20</td>
        <td>10</td>
      </tr>
       
  </tbody>
</table>
</div>
</div>
</div>
<!--Datatables çıkış-->
</div>





</div>


<?php
}else{
	header("Location:index.php");
	exit();
}
?>
 