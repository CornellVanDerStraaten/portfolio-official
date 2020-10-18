<?php include 'header.php' ?>
<div class="adminHome__container">
    <div class="addProject__container">
        <h2 class="addProject__title">Add Project</h2>
        <form class="addProject__form" action="<?php echo site_url('/adminAddProject') ?>" method="POST" enctype="multipart/form-data">
            <label class="addProject__label" for="pNaam">Project Name</label>
            <input class="addProject__text" type="text" name="project_naam" id="pNaam">

            <label class="addProject__label" for="keywords">Keywords</label>
            <input class="addProject__text" type="text" name="project_keywords" id="keywords">
            
            <input class="addProject__file" type="file" name="project_image" accept="image/*">

            <input class="addProject__submit" type="submit" value="Maak project aan">
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
</div>


<?php include 'footer.php' ?>