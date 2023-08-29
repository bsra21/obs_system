
<?php

if(isset($_SESSION["Kullanici"])){

?>
<script src="vendor/jquery/jquery.min.js"></script>
  <div class="col-md-12">
      <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">language</i>
            </div>
          </div>
          <div class="card-body">
              <h4 class="card-title">Ödev Gönder</h4>
          <!--       <div class="form-group form-file-upload form-file-multiple" data-provides="fileinput">
    <input type="file" multiple="" class="inputFileHidden">
    <div class="input-group" style="width: 300px;">
     <span class="input-group-btn">
       <span class="btn btn-raised btn-round btn-info">
      <i class="material-icons">attach_file</i> <input type="file" />	</span>
        </span> 
        
      

        <input type="text" class="form-control inputFileVisible" placeholder="Single File" multiple> 
        <div class="fileinput-preview fileinput-exists">
       </div>
    </div>
  </div>--->  <div class="form-row justify-content-center">
         <div class="col-md-6">
          <div class="file-loading">
            <input class="form-control" id="proje_dosya" name="proje_dosya" type="file">
          </div>
        </div>
      </div> 
    
    </div>
      </div>
  </div>


  <!---  <i class="material-icons">attach_file</i>   ---->    <!---           ---->
    <!---   <div class="fileinput fileinput-new text-center" data-provides="fileinput">
       <div class="fileinput-preview fileinput-exists thumbnail img-raised">

       </div>
       <div>   <span class="input-group-btn">   <span class="btn btn-raised btn-round btn-info btn-file">
    <i class="material-icons">attach_file</i>      <input type="file" />  </span>  	</span>
            <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
            <i class="fa fa-times"></i> Remove</a>    </div>    </div>           ---->
         <!---     <span class="fileinput-new">Select image</span>       ---->
<!------ Burada resim yükle ve remote özelliği aktif.   
<span class="btn btn-raised btn-round btn-sm btn-file">
    <i class="material-icons">attach_file</i> <input type="file" />	</span>  ---->




<?php  }else{	header("Location:index.php");	exit(); }   ?>