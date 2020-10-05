<?php include 'header.php'  ?>

<div class="admin-login-div">
    <h1 class="admin-login__title">Admin Log in</h1>
    <form class="admin-login__form" action="<?php echo site_url('/adminLogIn') ?>" method="POST">
        <label class="admin-login__label" for="adminEmailInput">E-mail</label>
        <input class="admin-login__input" type="email" name="email" id="adminEmailInput">
        
        <label class="admin-login__label" for="adminWachtwoordInput">Password</label>
        <input class="admin-login__input" type="password" name="password" id="adminPasswordInput" >

        <input type="submit" value="Log in" class="admin-login__submit">
    </form>
    <!-- If errors -> error message -->
    <?php if ( isset( $errors ) )  { ?>
    <div class="admin-login__error">
        <?php foreach ( $errors as $row ) { ?>
            <p class="admin-login__error-text"><?php echo $row ?></p>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include 'footer.php'  ?>
