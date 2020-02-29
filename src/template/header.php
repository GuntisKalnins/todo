
<header>
    <div class="title-cont">
        <h1>My TODO</h1>
    </div>

    <nav>
        <ul>
            <li><a class="nav-el" href="index.php">Home</a></li>
            <li><a class="nav-el" href="about.php">About</a></li>
        </ul>
    </nav>
<?php
if (isset($_SESSION['id'])) {
    ?>
    <a href="logout.php">Logout</a>
<?php
} else {
    ?>

    <div class="loginForm">
        <form action="login.php" method="post">
            <input type="text" name="user" placeholder="Username" required>
            <input type="text" name="pw" placeholder="Password" required>
            <button type="submit" name="loginBtn">Login</button>
        </form>
    </div> 
    <div class="regBtn">
        <a href="register.php">Register</a>
    </div>
<?php
}
?>
</header>