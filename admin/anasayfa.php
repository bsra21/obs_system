<?php
if((isset($_SESSION["Yonetici"])) || (isset($_SESSION["Ogretmen"]))){ // 

?>

<!DOCTYPE html>
<html lang="tr-TR">
  
<head> <meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="revisit-after" content="7 Days">
<title><?php echo DonusumleriGeriDondur($SiteTitle); ?></title>
<link type="image/png" rel="icon" href="../img/logo-2.png">
<meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
<meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
 <!----> <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
 <!-----> <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

  <link href='../assets/css/fullcalendar.css' rel='stylesheet' />
<link href='../assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../assets/js/jquery-1.10.2.js' type="text/javascript"></script>
<script src='../assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
<script src='../assets/js/fullcalendar.js' type="text/javascript"></script>
<!----><script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../vendor/datatables/dataTables.bootstrap4.min.css">
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../vendor/datatables/dataTables.buttons.min.js"></script>
<script src="../vendor/datatables/buttons.flash.min.js"></script>
<script src="../vendor/datatables/buttons.html5.min.js"></script>
<script src="../vendor/datatables/buttons.print.min.js"></script>
<script src="../vendor/datatables/jszip.min.js"></script>
<script src="../vendor/datatables/pdfmake.min.js"></script>
<script src="../vendor/datatables/vfs_fonts.js"></script>
<!--<script src="../vendor/jquery/jquery.min.js"></script>---->
<script src="../ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor', {});
</script>

<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script><!--   dropdown -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 <style type="text/css" media="screen">		.file-details-cell {			display: none		}	</style>
<style>
	#wrap {width: 1100px;margin: 0 auto;}#external-events {float: left;width: 150px;padding: 0 10px;text-align: left;}#external-events h4 {font-size: 16px;		margin-top: 0;		padding-top: 1em;		}#external-events p {margin: 1.5em 0;	font-size: 11px;	color: #666;	}#external-events p input {	margin: 0;	vertical-align: middle;		}#calendar5 {margin:0 auto;width:900px;background-color:#FFFFFF;border-radius:6px;box-shadow:0 1px 2px #C3C3C3;}.boyutlandirma img {max-width: 460px; max-height: 500px;}</style>
<style type="text/css" media="screen">   @media only screen and (max-width: 700px) {.mobilgizle { display: none; } .mobilgizleexport { display: none; }.mobilgoster {display: block;}}   @media only screen and (min-width: 700px) {.mobilgizleexport {display: flex;}.mobilgizle {display: block;}.mobilgoster {display: none;}}</style>
<style>
    .scroolll2{height: 560px; overflow-x: hidden; overflow-y: scroll;}
    @media (max-width:760px){.scroolll2{height: 420px;}    }   </style>
</head><!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"-->
<body > <div class="wrapper ">
  <div class="sidebar" data-color="azure" data-background-color="white" data-image="../img/sinif.jpeg">
  <div class="logo"><a href="#" class="simple-text logo-normal" >
  <img src="../img/logo-2.png" alt="" style="height: 150px; width: 150px;"></a></div><div class="sidebar-wrapper"><ul class="nav">
  <div class="scroolll2"><li class="nav-item active">
  <a class="nav-link" href="index.php?SKD=0&SKI=0"><i class="material-icons">home</i><p>Anasafya</p></a></li>
<li class="nav-item ">   <a class="nav-link" href="index.php?SKD=0&SKI=1"><i class="material-icons">Profil</i><p>Profil</p>   </a></li>
<li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=3"><i class="material-icons">video_library</i> <p>Dersler ve Videolar </p> </a></li>
 <li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=6"><i class="material-icons">picture_as_pdf</i> <p>Dokümanlar</p> </a></li>
<li class="nav-item "> <a class="nav-link" href="#"><i class="material-icons">content_paste</i><p>Sınav Raporları</p> </a></li>
<?php //if(DonusumleriGeriDondur($Mesaj["yayinlayankisi"])==$IsimSoyisim)
if(isset($_SESSION["Yonetici"])){ ?>  
<li class="nav-item "> <a class="nav-link" href="index.php?SKD=0&SKI=42"><i class="material-icons">content_paste</i><p>Öğretmenler</p> </a></li>
<li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=15"><i class="material-icons">movie</i> <p>Slider</p> </a></li>

<li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=47"><i class="material-icons">settings</i> <p>Ayarlar</p> </a></li>
<li class="nav-item "><a class="nav-link" href="index.php?SKD=0&SKI=22"><i class="material-icons">date_range</i> <p>Ders Programı</p> </a></li>
<li class="nav-item ">  <a class="nav-link" href="#"><i class="material-icons">euro_symbol</i> <p>Ödemeler</p> </a></li>
 <?php } ?>
 <li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=36"><i class="material-icons">class</i> <p>Sınıflar</p> </a></li>
<li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=16"><i class="material-icons">person</i> <p>Öğrenciler</p> </a></li>
  <li class="nav-item ">  <a class="nav-link" href="#"><i class="material-icons">videocam</i> <p>Canlı Ders</p> </a></li>
<li class="nav-item "><a class="nav-link" href="index.php?SKD=0&SKI=12"><i class="material-icons">square_foot</i><p>Ödevler</p> </a> </li>

 <li class="nav-item ">   <a class="nav-link" href="#"><i class="material-icons">schedule</i>   <p>Online Sınav</p> </a></li>


<li class="nav-item ">  <a class="nav-link" href="index.php?SKD=0&SKI=17"><i class="material-icons">logout</i> <p>Çıkış</p> </a></li>
  </div> </ul> </div> </div>
  <div class="main-panel"><nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top "><div class="container-fluid">
<div class="navbar-wrapper">  <a class="navbar-brand" href="index.php?SKD=0&SKI=0"> YÖNETİM PANELİ</a></div>
<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span> <!---- Mobilde 3 çizgi------->
            <span class="navbar-toggler-icon icon-bar"></span><!---- Menü için gerekli------->
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
<div class="collapse navbar-collapse justify-content-end"><form class="navbar-form"><div class="input-group no-border">
  <input type="text" value="" class="form-control" placeholder="Search...">
  <button type="submit" class="btn btn-white btn-round btn-just-icon"><i class="material-icons">search</i><div class="ripple-container"></div>
  </button> </div> </form><ul class="navbar-nav"><li class="nav-item"><a class="nav-link" href="javascript:;"><i class="material-icons">dashboard</i>
<p class="d-lg-none d-md-block">Stats </p></a></li><li class="nav-item dropdown">
  <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="material-icons">notifications</i><span class="notification">5</span><p class="d-lg-none d-md-block">
Some Actions</p></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="#"></a><a class="dropdown-item" href="#">You have 5 new tasks</a>
<a class="dropdown-item" href="#">You're now friend with Andrew</a></div></li><li class="nav-item dropdown">
  <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="material-icons">person</i><p class="d-lg-none d-md-block">Account</p></a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile"><a class="dropdown-item" href="#">Profile</a>
<a class="dropdown-item" href="#">Settings</a><div class="dropdown-divider"></div><a class="dropdown-item" href="#">Log out</a>
</div></li></ul></div></div></nav><div class="content">  <div class="container-fluid"><!-- İÇERİKLER-->
	<?php	if((!$IcSayfaKoduDegeri) or ($IcSayfaKoduDegeri=="") or ($IcSayfaKoduDegeri==0)){
					include($SayfaIc[0]);	}else{	include($SayfaIc[$IcSayfaKoduDegeri]);	}		?>   </div> </div>
<footer class="footer"><div class="container-fluid"><nav class="float-left">
  <ul><li><a href="#">Ekibimiz</a></li><li><a href="#"> Hakkımızda</a></li>
<li><a href="#">Blog</a></li><li><a href="#">Projelerimiz</a></li></ul></nav>
<div class="copyright float-right">  &copy;  <script> document.write(new Date().getFullYear())
  </script>, made with <i class="material-icons">favorite</i> by
  <a href="#" target="_blank">Design of</a> Engineering.</div></div></footer></div></div>  <!---->
<script>    $(document).ready(function() {    md.initDashboardPageCharts(); });  </script>
<script>
  $(document).ready(function () {    var url1 = '../img/logo-2.png';
    $("#proje_dosya").fileinput({  'theme': 'explorer-fas',      'showUpload': false,      'showCaption': true,      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar","pdf","txt","docx","doc","xls"], }); //istediğin uzantıyı ekle
    $("#proje_dosya2").fileinput({  'theme': 'explorer-fas', 'showUpload': false,  'showCaption': true,  showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar","pdf","txt","docx","doc","xls"], //istediğin uzantıyı ekle
});  });  </script>

 <!--- +++++++++++++++++-->
<script>  //++<!--++++++++++++++++++
  var dataTables = $('#dataTable').DataTable({
   initComplete: function () { this.api().columns([1,2,4,5,6]).every( function () { var column = this;
      var select = $('<select class="filtre"><option value=""></option></select>')
      .appendTo( $(column.footer()).empty() )  .on( 'change', function () {
        var val = $.fn.dataTable.util.escapeRegex(  $(this).val()   );  column
        .search( val ? '^'+val+'$' : '', true, false ) .draw();  });
      column.data().unique().sort().each( function ( d, j ) {  var val = $('<div/>').html(d).text();
          if (val.length>29) { filtremetin =  val.substr(0,30)+"..."; } else {    filtremetin=val;  }
          select.append( '<option value="' + val + '">' + filtremetin + '</option>' )   });    });  },
    "ordering": true,"searching": true,"lengthChange": true, "info": true,////Tabloda sıralamaTabloda arama yapma
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    buttons: [    {      extend: 'copyHtml5',       className: 'kopyalama-buton',  },
    { extend: 'excelHtml5', className: 'excel-buton', }, { extend: 'pdfHtml5', className: 'pdf-buton',},
   {extend: 'csvHtml5',className: 'csv-buton',}]});//Sonradan yapılan butona tıklandığında asıl dışa aktarma butonunun çalışması
  function fnAction(action) {  switch (action) { case "excel":$('.excel-buton').trigger('click'); break;
  case "pdf": $('.pdf-buton').trigger('click');  break;  case "copy":$('.kopyalama-buton').trigger('click');break;
case "csv":$('.csv-buton').trigger('click');   break;    }  } </script><!---  +++++++++++++++++-->
<script>  //++<!--++++++++++++++++++
  var dataTables = $('#dataTable2').DataTable({
   initComplete: function () { this.api().columns([1,2,4,5,6]).every( function () { var column = this;
      var select = $('<select class="filtre"><option value=""></option></select>')
      .appendTo( $(column.footer()).empty() )  .on( 'change', function () {
        var val = $.fn.dataTable.util.escapeRegex(  $(this).val()   );  column
        .search( val ? '^'+val+'$' : '', true, false ) .draw();  });
      column.data().unique().sort().each( function ( d, j ) {  var val = $('<div/>').html(d).text();
          if (val.length>29) { filtremetin =  val.substr(0,30)+"..."; } else {    filtremetin=val;  }
          select.append( '<option value="' + val + '">' + filtremetin + '</option>' )   });    });  },
    "ordering": true,"searching": true,"lengthChange": true, "info": true,////Tabloda sıralamaTabloda arama yapma
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
    buttons: [    {      extend: 'copyHtml5',       className: 'kopyalama-buton',  },
    { extend: 'excelHtml5', className: 'excel-buton', }, { extend: 'pdfHtml5', className: 'pdf-buton',},
   {extend: 'csvHtml5',className: 'csv-buton',}]});//Sonradan yapılan butona tıklandığında asıl dışa aktarma butonunun çalışması
  function fnAction(action) {  switch (action) { case "excel":$('.excel-buton').trigger('click'); break;
  case "pdf": $('.pdf-buton').trigger('click');  break;  case "copy":$('.kopyalama-buton').trigger('click');break;
case "csv":$('.csv-buton').trigger('click');   break;    }  } </script><!---  +++++++++++++++++-->
<script>
  $("#musteritablosu").DataTable({
   initComplete: function () {    this.api().columns().every( function () {      var column = this;
      var select = $('<select><option value=""></option></select>')
      .appendTo( $(column.footer()).empty() )
      .on( 'change', function () {
var val = $.fn.dataTable.util.escapeRegex(  $(this).val()  );
column  
.search( val ? '^'+val+'$' : '', true, false )
.draw();      } );
      column.data().unique().sort().each( function ( d, j ) {
select.append( '<option value="'+d+'">'+d+'</option>' )      } );    } );  },
  dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
  buttons: [
  {    extend: 'copyHtml5',     className: 'kopyalama-buton'  },
  {    extend: 'excelHtml5',     className: 'excel-buton'  },
  {   extend: 'pdfHtml5',   className: 'pdf-buton' },
 {  extend: 'csvHtml5',  className: 'csv-buton'  } ]  });
  function tiklama(islem){
    switch (islem){      case "excel":      $(".excel-buton").trigger("click");      break;
      case "kopyala":      $(".kopyalama-buton").trigger("click");      break;
      case "pdf":      $(".pdf-buton").trigger("click");      break;
      case "csv":      $(".csv-buton").trigger("click");      break;    }  }
</script>  



<link rel="stylesheet" media="all" type="text/css" href="../vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="../vendor/upload/themes/explorer-fas/theme.min.css">
<script src="../vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="../vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>


</body></html>
<?php  }else{	header("Location:index.php?SKD=1");	exit();}   ?>