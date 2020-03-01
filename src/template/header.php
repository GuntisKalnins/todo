
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
    <div class="logBox">
        <a href="logout.php" id="logoutBtn">Logout</a>
    </div>
<?php
} else {
    ?>

    <div class="loginForm">
        <form action="login.php" method="post">
            <input class="input" type="text" name="user" placeholder="Username" required>
            <input class="input" type="password" name="pw" placeholder="Password" required>
            <button class="submit" id="loginBtn" type="submit" name="loginBtn">Login</button>
        </form>
    </div> 
    <div class="regBtn">
        <a href="register.php">Register</a>
    </div>
<?php
}
?>
</header>