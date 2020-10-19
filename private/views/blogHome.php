<?php include 'header.php';  ?>
<div class="blog__container">
    <div class="blog-container__blog-header">
        <h1 class="blog-header__title" >Blog</h1>
        <h3 class="blog-header__subtitle" >Writing about things I know or want to know more about</h3>
        <form class="blog-header__search-form" action="<?php echo site_url('/searchBlog'); // TODO ?>" method="POST">
            <input class="blog-header__search-input" type="search" name="blogSearchInput" id="blogSearchInput" placeholder="Search for anything">
            <input class="blog-header__submit-input" type="submit" value="Search">
        </form>
    </div>
    <div class="blog-container__article-list">
        <h3 class="article-list__year">2020</h3>
        <hr class="article-list__line">
        <?php
            // TODO
        ?>
    </div>
</div>

<?php include 'footer.php'  ?>