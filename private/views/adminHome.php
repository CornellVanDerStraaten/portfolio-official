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

    <div class="addArticle__container addProject__container">
        <h2 class="addProject__title">Add article</h2>
        <form action="<?php echo site_url('/toMakeArticlePage') ?>" class="addProject__form" method="POST">
            <label for="articleName" class="addProject__label">Article name</label>
            <input type="text" class="addProject__text" name="article_name" id="articleName">

            <label for="click" class="addArticle__label">Choose categories</label>
            <input type="checkbox" id="click" class="click-me">
            
            <div class="article-cat__article-overlay">
                
                    <div class="article-overlay__body-header">
                        <h2 class="article-overlay__title">Choose categories</h2>
                        <label for="click" class="fas fa-times article-overlay__close"></label>
                    </div>

                    <div class="article-overlay__body-categories">
                        <?php foreach ($allCategories as $row) { ?>
                        <div class="body-categories__container">
                           <input type="checkbox" class="modifyProject__option" name="article_categories_id[<?php echo $row['id'] ?>]" id="articleCategory<?php echo $row['id'] ?>">
                            <label for="articleCategory<?php echo $row['id']; ?>"><?php echo $row['category_name'] ?></label> 
                        </div>
                            
                        <?php } ?>
                    </div>

            </div>

            <input type="submit" class="addProject__submit addArticle__submit" value="Add article">

        </form>
    </div>

    <div class="addProject__container modifyArticle__container">
        <h2 class="addProject__title">Modify article</h2>
        <form class="addProject__form" action="<?php echo site_url('/adminToModifyArticlePage') ?>" method="POST">
            <label for="projects" class="addProject__label">Choose an article</label>
            <select id="projects" name="modify_article" class="modifyProject__select">
                <option class="modifyProject__option" selected="selected">Choose Article</option>
                <?php foreach ($allArticles as $row) { ?>
                    <option class="modifyProject__option" value="<?php echo $row['id'] ?>"><?php echo $row['id'] . '. ' . $row['article_title'] ?></option>
                <?php } ?>
            </select>
            <input class="addProject__submit" type="submit" value="Modify Article">
        </form>
    </div>

    <div class="addProject__container deleteArticle__container">
        <h2 class="addProject__title">Delete Article</h2>
        <form action="<?php echo site_url('/deleteArticle') ?>" class="addProject__form" method="POST">
            <label for="projects" class="addProject__label">Delete an Article</label>
            <select id="projects" name="delete_article_id" class="modifyProject__select">
                <option class="modifyProject__option" selected="selected">Choose article</option>
                <?php foreach ($allArticles as $row) { ?>
                    <option class="modifyProject__option" value="<?php echo $row['id'] ?>"><?php echo $row['id'] . '. ' . $row['article_title'] ?></option>
                <?php } ?>
            </select>
            <input class="addProject__submit" type="submit" value="Delete Cat">
        </form>
    </div>

    <div class="addProject__container addCategory__container ">
        <h2 class="addProject__title">Add category</h2>
        <form action="<?php echo site_url('/addCategory') ?>" class="addProject__form" method="POST">
            <label class="addProject__label" for="categoryName" class="addProject__label">Category name</label>
            <input class="addProject__text" type="text" name="categoryName" id="categoryName">

            <input class="addProject__submit" type="submit" value="Add category">
        </form>
    </div>

    <div class="addProject__container deleteCat__container">
        <h2 class="addProject__title">Delete Cat</h2>
        <form action="<?php echo site_url('/deleteCat') ?>" class="addProject__form" method="POST">
            <label for="projects" class="addProject__label">Delete a cat</label>
            <select id="projects" name="delete_cat_id" class="modifyProject__select">
                <option class="modifyProject__option" selected="selected">Choose Cat</option>
                <?php foreach ($allCategories as $row) { ?>
                    <option class="modifyProject__option" value="<?php echo $row['id'] ?>"><?php echo $row['id'] . '. ' . $row['category_name'] ?></option>
                <?php } ?>
            </select>
            <input class="addProject__submit" type="submit" value="Delete Cat">
        </form>
    </div>
</div>



<?php include 'footer.php' ?>