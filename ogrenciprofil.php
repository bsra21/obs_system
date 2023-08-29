<?php
if(isset($_SESSION["Kullanici"])){
?>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Profil Düzenleme</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form  action="ogrenci.php?SK=10" method="POST" >
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bilgilerinizi Giriniz</label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="EmailAdresi" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefon Numarasi</label>
                          <input type="phone" name="TelefonNumarasi" class="form-control">
                        </div>
                      </div>
                    </div>
                
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Şifreniz</label>
                          <input type="text" name="Sifre" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tekrar Şifreniz</label>
                          <input type="text" name="SifreTekrar"   class="form-control">
                        </div>
                      </div>
                    </div>
               <!--     <button class="btn btn-primary btn-block" name="giris" onclick="md.showNotification('top','right')">Profilimi Güncelle</button>
                 -->      
                    <button type="submit" class="btn btn-primary pull-right">Profilimi Güncelle</button>
                  <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>                    

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#">
                    <img class="img" src="img/person.png" />
                  </a>
                </div>
                <div class="card-body">    <!--   TelefonNumarasi  ayar.phpden veriyi çekiyor.-->
                  <h6 class="card-category text-gray">Email Adresi :<?php echo $EmailAdresi; ?></h6>
                  <h4 class="card-title">Adı Soyadı :<?php echo $IsimSoyisim; ?></h4>   
                  <h5 class="card-title">Telefon Numarası :<?php echo $TelefonNumarasi; ?></h5>   
                  <h6 class="card-title">Cinsiyet:<?php echo $Cinsiyet; ?></h6>   
                  <p class="card-description">Kayıt Tarihi :
                  <?php echo TarihBul($KayitTarihi); ?>
                  </p>
                </div> 
              </div>
            </div>
          </div>

          <?php
}else{
	header("Location:index.php");
	exit();
}
?>