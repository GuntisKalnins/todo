<?php
require_once "../src/template/head.php";

echo "<div>";
echo "<h1>Oops something went wrong</h1>";
echo "</div>";
header("Refresh: 5; url= index.php");
require_once "../src/template/footer.php";
