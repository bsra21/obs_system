<?php

if(isset($_SESSION["Yonetici"])){ 
unset($_SESSION["Yonetici"]);
session_destroy();

}
if(isset($_SESSION["Ogretmen"])){ 
unset($_SESSION["Ogretmen"]);
session_destroy();
}

header("Location:index.php");
exit();
?>