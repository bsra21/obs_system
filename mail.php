<?php
include("ayar.php");

class User{
    public $text;
    public  $tf;
}
$user=new User();
if (isset($_POST['mailgonder']))  {   
    $mailA=$_POST["mail"];
    $mesaj=$_POST["mesaj"];

    $to="To:bm.busra14@gmail.com";   //info@osmantalhadincer.com
    $subject="Kullanıcı Hesabı Aktifleştirme";
    $text="".$mesaj;
    $from="From:".$mailA;
    mail($to,$subject,$text,$from);
    echo("".$mailA."");
    $user->text="".$mesaj;
    $user->tf=true;
    echo(json_encode($user));

    //header("Location:index.php");
}
?>