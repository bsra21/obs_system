<!--
  <iframe src="https://calendar.google.com/calendar/embed?height=500&amp;wkst=2&amp;bgcolor=%23B39DDB&amp;ctz=Europe%2FIstanbul&amp;src=Ym0uYnVzcmExNEBnbWFpbC5jb20&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=aHFvOW9zaGczYnU1YWMyaGtlYzRxcTkzcWNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=dHIudHVya2lzaCNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=Y2xhc3Nyb29tMTAwNDc5OTY3Njg5MTg5NjM5Mjk5QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%2333B679&amp;color=%23009688&amp;color=%230B8043&amp;color=%230047a8" style="border-width:0" width="800" height="500" frameborder="0" scrolling="no">
</iframe>          style="height: 400px;"
-->


<?php

if(isset($_SESSION["Kullanici"])){

?>


<div id='wrap'>
<div id='calendar5' style="width: 650px;"></div>
<div style='clear:both'></div>
</div>






<?php
}else{
	header("Location:index.php");
	exit();
}
?>