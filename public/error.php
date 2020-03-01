<?php
 require_once "../src/template/head.php";
echo "<div class='error-page'>";
echo "<h1>Can't register your username and/or email</h1>";
echo "</div>";
header("Refresh: 5; url= register.php");
require_once "../src/template/footer.php";


