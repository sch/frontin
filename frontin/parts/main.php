<div class="main" role="main">
  <h1 class="visuallyhidden">Main</h1>
  <?php
  if ( is_404() || ( is_category() && !have_posts() ) || ( is_search() && !have_posts() ) || ( is_archive() && !have_posts() ) ) {
      require_once 'assets/not-found.php';
  }

  if ( is_front_page() ) {
      require_once 'assets/front.php';
  }

  if ( is_single() ) {
      require_once 'assets/single.php';
  }

  if ( is_search() && have_posts() ) {
      require_once 'assets/search-results.php';
  }

  if ( is_category() && have_posts() ) {
      require_once 'assets/categories.php';
  }

  if ( is_archive() && have_posts() && ( !is_search() && !is_category() ) ) {
      require_once 'assets/archives.php';
  }

  if ( is_page() ) {
      require_once 'assets/page.php';
  }

  if ( is_page( 'some-static-content' ) ) {
      require_once 'static/some-static-content.html';
  }
  ?>
</div><!-- /.main -->