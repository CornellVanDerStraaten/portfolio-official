<?php include 'header.php'  ?>

<div class="admin-login-div">
    <h1 class="admin-login__title">Admin Log in</h1>
    <form class="admin-login__form" action="<?php echo url('admin') ?>" method="POST">
        <label class="admin-login__label" for="adminEmailInput"></label>
        <input class="admin-login__input" type="email" name="email" id="adminEmailInput" placeholder="Email here">
        
        <label class="admin-login__label" for="adminWachtwoordInput"></label>
        <input class="admin-login__input" type="password" name="password" id="adminPasswordInput" placeholder="Password please">

        <input type="submit" value="Log in">
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
