<?php include 'header.php'; ?>
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
        <?php if (isset($errors)) { ?>
            <div class="admin-login__error">
                <?php foreach ($errors as $row) { ?>
                    <p class="admin-login__error-text"><?php echo $row ?></p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <div class="addProject__container modifyProject__container">
        <h2 class="addProject__title">Modify project</h2>
        <form class="addProject__form" action="<?php echo site_url('/adminToModifyProjectPage') ?>" method="POST">
            <label for="projects" class="addProject__label">Choose a project</label>
            <select id="projects" name="modify_project" class="modifyProject__select">
                <option class="modifyProject__option" selected="selected">Choose Project</option>
                <?php foreach ($allProjects as $row) { ?>
                    <option class="modifyProject__option" value="<?php echo $row['id'] ?>"><?php echo $row['id'] . '. ' . $row['project_naam'] ?></option>
                <?php } ?>
            </select>
            <input class="addProject__submit" type="submit" value="Modify Project">
        </form>
    </div>

    <div class="addProject__container deleteProject__container">
        <h2 class="addProject__title">Delete Project</h2>
        <form action="<?php echo site_url('/deleteProject') ?>" class="addProject__form" method="POST">
        <label for="projects" class="addProject__label">Delete a project</label>
            <select id="projects" name="delete_project_id" class="modifyProject__select">
                <option class="modifyProject__option" selected="selected">Choose Project</option>
                <?php foreach ($allProjects as $row) { ?>
                    <option class="modifyProject__option" value="<?php echo $row['id'] ?>"><?php echo $row['id'] . '. ' . $row['project_naam'] ?></option>
                <?php } ?>
            </select>
            <input class="addProject__submit" type="submit" value="Delete Project">        
    
        </form>
    </div>
</div>


<?php include 'footer.php' ?>