<?php
header("Refresh: 5; url= index.php");
require_once "../src/template/head.php";

?>

<div class="bad-login">
    <h1>Incorrect login or password</h1>
    <h2>Did you try to register new account?</h2>
</div>
<?php
require_once "../src/template/footer.php";
?>
