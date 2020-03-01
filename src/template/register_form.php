
<div class="regForm">
    <form action="register.php" method="post" name="regForm">
        <label for="regForm">Please fill out the registration form:</label>
        <input type="text" class="input" name="user" placeholder="User Name" required></input>
        <input type="email" class="input" name="email" placeholder="E-mail" required></input>
        <input type="password" class="input" name="pw1" placeholder="Password (min 8 char)" pattern=".{8,}" id="pw1" required ></input>
        <input type="password" class="input" name="pw2" placeholder="Repeat Password" pattern=".{8,}" id="pw2" required></input>
        <button type="Submit" name="RegBtn" class="submit" id="submit">Register</button>
    </form>
</div>
