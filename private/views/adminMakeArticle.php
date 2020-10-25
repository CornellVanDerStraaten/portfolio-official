<?php include 'header.php' ?>

<div class="article-template__container">
    <div class="article-container">
        <h1 class="article-container__title">TITEL<?php // echo $basic_article_info['article_name'] 
                                                ?>
        </h1>

        <form class="article__form" method="POST" action="<?php echo site_url('/adminInsertArticle') ?>">
            <textarea name="articleIntro" id="articelIntro" cols="60" rows="10"></textarea>

            <textarea class="TLDR__textarea" id="mytextarea" name="TLDR"></textarea>
            <input type="submit" value="Publish Article">
        </form>

    </div>
    <div class="article-info__container">
        <div class="article-info">
            <div class="article-info__author">
                <img src="<?php echo site_url() . '/img/article_author_portret_2.jpg' ?>" alt="Cornell van der Straaten">
                <p>Tekst over mijzelf</p>
            </div>

            <div class="article-info__tags">
                <h3 class="article-info__title">Tags</h3>
                <hr class="article-info__line">
                <div class="article-tags">

                </div>
            </div>

            <div class="article-info__date">
                <h3 class="article-info__title">Published</h3>
                <hr class="article-info__line">
                <p class="article-info__date"><?php // echo $date 
                                                ?></p>
            </div>

            <div class="article-info__date">
                <h3 class="article-info__title">More me</h3>
                <hr class="article-info__line">
                <div class="article-info__social-links">
                    <p class="article-info__social-link">Github:<a href="https://github.com/CornellVanDerStraaten" target="_blank">@CornellVanDerStraaten</a></p>
                    <p class="article-info__social-link">Github:<a href="https://www.linkedin.com/in/cornell-van-der-straaten-865519192/" target="_blank">@CornellvanderStraaten</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src='https://cdn.tiny.cloud/1/tzm3w2o3juzjq71ip92kwtit6fvnmz7xqqutxiq219xaw7o5/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 1000,
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker tinydrive image imagetools code link',
        toolbar: "insertfile image link | code" + 'undo redo | formatselect | ' + 'bold italic backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help',
        menu: {
            insert: {
                title: "Insert",
                items: "insertfile"
            }
        },
        insert_button_items: "insertfile",
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Cornell van der Straaten',
        tinydrive_token_provider: '<?php echo site_url('/jwt') ?>',
        tinydrive_upload_path: "<?php echo site_url('/uploads/projectImages') ?>"
    });
</script>
<?php include 'footer.php' ?>