

<a href="#" class="nav-link" onclick="document.getElementById('id01').style.display='block'">Üye Ol</a>
<!----   Üye ol    Sayfası      --->

<div id="id01" class="modal" >
  
  <form class="modal-content animate" action="index.php?SK=4" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <img src="img/logo-2.png" alt="Avatar" class="avatar">   <!--    -->
    </div>

    <div class="containerform">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="EmailAdresi" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Sifre" required>
        
     <center> <button  name="giris" type="submit" >Giriş Yap</button></center>
      <label>
        <input type="checkbox" checked="checked" name="remember" > Remember me
      </label>
    </div>

    <div class="containerform" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>