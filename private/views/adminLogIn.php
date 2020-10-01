<?php include 'header.php'  ?>

<div class="admin-login-div">
    <h1 class="admin-login__title">Admin Log in</h1>
    <form class="admin-login__form" action="POST">
        <label for="adminEmailInput"></label>
        <input type="email" name="email" id="adminEmailInput">
        
        <label for="adminWachtwoordInput"></label>
        <input type="password" name="wachtwoord" id="adminWachtwoordInput">
    </form>
</div>

<?php include 'footer.php'  ?>

