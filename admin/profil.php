<?php
if(isset($_SESSION["Yonetici"]) || (isset($_SESSION["Ogretmen"]))){
?>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Profil Düzenleme</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form  action="index.php?SKD=0&SKI=2" method="POST">
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
                          <input type="email" name="yEmailAdresi" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefon Numarasi</label>
                          <input type="phone" name="yTelefonNumarasi" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kullanıcı Adı</label>
                          <input type="text" name="yYoneticiAdi" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Şifreniz</label>
                          <input type="text" name="ySifre" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tekrar Şifreniz</label>
                          <input type="text" name="ySifreTekrar"   class="form-control">
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
                    <img class="img" src="../assets/img/faces/avatar.jpg" />
                  </a>
                </div>
                <div class="card-body">   
                <?php if(isset($_SESSION["Yonetici"])){?> 
                  <h6 class="card-category text-gray">Email Adresi :<?php echo $YoneticiEmailAdresi; ?></h6>
                  <h4 class="card-title">Adı Soyadı :<?php echo $YoneticiKullaniciAdi; ?></h4>   
                  <h5 class="card-title">Telefon Numarası :<?php echo $YoneticiTelefonNumarasi; ?></h5>   
               <!--     <h6 class="card-title">Şifresi :<?php echo $YoneticiSifre; ?></h6>   
                   TelefonNumarasi  ayar.phpden veriyi çekiyor.-->
                   <?php       } ?>
<?php if(isset($_SESSION["Ogretmen"])){?>    
                   <h6 class="card-category text-gray">Email Adresi :<?php echo $OgretmenEmailAdresi; ?></h6>
                  <h4 class="card-title">Adı Soyadı :<?php echo $OgretmenKullaniciAdi; ?></h4>   
                  <h5 class="card-title">Telefon Numarası :<?php echo $OgretmenTelefonNumarasi; ?></h5>  
               
                <?php       } ?>
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