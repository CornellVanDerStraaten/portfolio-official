<?php

namespace Website\Controllers;

/**
 * 
 *
 * Deze handelt de logica van de blogpage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */

class BlogController {
	public function toBlogPage() {

		$articles = getAllArticles();

		$template_engine = get_template_engine();
		echo $template_engine->render('blogHome', ['articles' => $articles]);
	}

	public function toArticle($article_id) {

		$articles = getArticle($article_id);

		$template_engine = get_template_engine();
		echo $template_engine->render('articleTemplate', ['article_info' => $articles]);
	}

	public function addCat() {

		addCategory($_POST['categoryName']);

		$overviewURL = url('adminDashboard');
		redirect($overviewURL);
	}
	public function deleteCat() {

		deleteCat($_POST['delete_cat_id']);

		$overviewURL = url('adminDashboard');
		redirect($overviewURL);
	}

	public function deleteArticle() {

		deleteArticle($_POST['delete_article_id']);

		$overviewURL = url('adminDashboard');
		redirect($overviewURL);
	}

	public function startArticle() {
		$basic_article_info = processArticleInfo($_POST);

		$template_engine = get_template_engine();
		echo $template_engine->render('adminMakeArticle', ['basic_article_info' => $basic_article_info]);
	}

	public function insertArticle() {
		insertArticleInfo($_POST);

		$overviewURL = url('blogHome');
		redirect($overviewURL);
	}

	public function modifyArticlePage() {
		$article = getArticle($_POST['modify_article']);

		$template_engine = get_template_engine();
		echo $template_engine->render('modifyArticle', ['article_info' => $article,
														'article_id'   => $_POST['modify_article']]);
	}
	public function modifyArticle() {
		modifyArticleDB($_POST);

		$overviewURL = url('blogHome');
		redirect($overviewURL);
	}
	public function searchArticles() {
		$searchTerm = $_POST['blogSearchInput'];

		$articles = getSearchedArticles($searchTerm);

		$template_engine = get_template_engine();
		echo $template_engine->render('blogHome', ['articles' => $articles]);
	}
}

