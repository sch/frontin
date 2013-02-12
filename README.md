# Frontin: get ready to use Wordpress in an unconventional way

* Wordpress Used As A Front Controller
* Minimal, Neutral Markup
* Consistent Outline


## What?


Frontin is a simple, lightweight template which advocates using Wordpress as a Front Controller. The concept is quite simple: Wordpress has the ability to call the index.php file of a given template every time a page is requested, thus mimicking the Front Controller Pattern.

Frontin embraces this idiosyncrasy of Wordpress to both minimize code repetition and emancipate your projects from usual Wordpress behaviors. Therefore, in Frontin you will not find specific Wordpress files such as single.php (at least not in the traditional way). That's also because static content plays an important role in Frontin's philosophy.

## Install
Download Frontin and upload the "frontin" directory on your WP project like any other regular WP template.

## Granular Control

Frontin was built to give you granular control over your Wordpress project. The index.php file makes it easy to detect a specific page/post/category (you name it) and associate a specific action to it.</p>

	if ( is_page( 'send-tweet' ) ) {
		// Connect to Twitter API
	}

	if ( is_page( 'pull-request' ) ) {
		// Connect to Github API
	}

	// etc.

## Static Content

Behind Frontin lies a philosophy of static content. Create a page or a post in your adminCP, leave it empty, catch it in index.php and load a static file instead of content stored in a db.


	// This code assumes you have created
	// a page named some_static_page in
	// your adminCP.

	if ( is_page( "some_static_page" ) ) {
		include static/some_static_page.html;
	}
    
You can write static content *and* benefit from Wordpress stats, plugins etc.

## Beyond Wordpress: __config.php

The __config.php lets you easily configure include paths to use your favourite PHP libraries in your projects. Here's an example with the Zend Framework:

Directory structure:

	frontin
	    __config.php
	    library
	        Zend
	        ...

In __config.php:

	// Friendly Include
	define( 'PROJECT_PATH', realpath( dirname( __FILE__ ) ) );

	set_include_path( implode( PATH_SEPARATOR, array(
	    realpath( PROJECT_PATH ),
	    realpath( PROJECT_PATH . 'parts' ),
	    realpath( PROJECT_PATH . 'assets' ),
	    realpath( PROJECT_PATH . 'shared' ),
	    realpath( PROJECT_PATH . 'static' ),
	    realpath( PROJECT_PATH . 'library' ),
	    realpath( PROJECT_PATH . 'library/Zend' ),
	    get_include_path() 
	) ) );
    

All ZF components are now available in your project:

	require_once 'Zend/Whatever/You/Want.php';

Empowering Wordpress with other powerful tools should be made a lot easier.


## As Little Markup As Possible

Frontin provides very little markup and tries to keep it as neutral possible. Although you are going to find some common layout elements (a banner, a footer etc.), you can easily remove such elements from your whole project by editing your index.php file. 


	<?php include 'parts/banner.php'; ?>
	<?php include 'parts/main.php'; ?>
	<?php //include 'parts/complementary.php'; /* no longer used */ ?>
	<?php //include 'parts/contentinfo.php'; /* no longer used */ ?>


Including a new layout element is as easy as removing one: add whatever you want in index.php and you will see it appear everywhere on your project.</p>

	<?php include 'parts/mynav.php'; ?>


## A "From Structure To Content" Outline

Frontin's markup does its best to remain neutral (you will not find any semantic statements in this project). The only opinionated code is a [from structure to content outline](http://www.bitspushedaround.com/of-html-document-outlines/). Here again, if this approach doesn't fit your project or your own peculiar to coding, it can easily be removed.

## Yet, A Conventional Approach Is Possible

All the familiar Wordpress pages are located in the assets directory (the only difference with a casual template is that they're not called directly by Wordpress, but through index.php). If you want to use Wordpress in a more conventional way, you can edit those pages as if you were working with a typical template. If you go that way, you still have the benefits of Frontin: little markup and little code repetition.


## Change Log

### 0.1.0

Initial release