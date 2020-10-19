<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
	SimpleRouter::get( '/logOut', 'WebsiteController@logOut' )->name( 'logOut' );

	// Admin page startup and login
	SimpleRouter::get('/admin', 'AdminController@adminLogInPage' )->name( 'adminLogInPage' );
	SimpleRouter::post('/adminLogIn', 'AdminController@adminLogInProcessing' )->name( 'adminLogInProcessing' );
	SimpleRouter::get('/adminHome', 'AdminController@adminDashboard' )->name( 'adminDashboard' );

	// Admin page functionalities ( Projecten )
	SimpleRouter::post('/adminAddProject', 'ProjectController@addProjectContent' )->name( 'adminAddProjectStart' );
	SimpleRouter::post('/adminInsertProject', 'ProjectController@insertProject' )->name( 'adminInsertProject' );
	SimpleRouter::post('/adminToModifyProjectPage', 'ProjectController@toModifyProjectPage' )->name( 'adminToModifyProjectPage' );
	SimpleRouter::post('/adminModifyProject', 'ProjectController@modifyProject')->name( 'modifyProject' );
	SimpleRouter::post('/deleteProject', 'ProjectController@adminDeleteProject')->name( 'deleteProject' );
	SimpleRouter::get( '/projectDetails/{id}', 'ProjectController@toProjectPage' )->name( 'projectDetailPage' );

	// Blog Page 
	SimpleRouter::get('/blogs', 'BlogController@toBlogPage' )->name( 'blogHome' );
	
	// TinyDrive
	SimpleRouter::match(['post', 'get'],'/jwt', 'ProjectController@jwt' )->name( 'jwt' );


	// STOP: Tot hier al je eigen URL's zetten
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

