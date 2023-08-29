<?php

if(isset($_SESSION["Kullanici"])){

?>









<?php
}else{
	header("Location:index.php");
	exit();
}
?>