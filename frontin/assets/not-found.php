<div class="not-found assets">
  <h2>Not Found</h2>
  
  <?php if ( is_404() ) : ?>								 		
  <p>Sorry, but the page you requested could not be found. Here is a search form to help you in your quest.</p>			 			
  <?php else : /* categories, archives, search */ ?>										
  <p>Sorry, but nothing matched your search. Please try again using different keywords.</p>
  <?php endif; ?>
  
  <?php include 'shared/search-form.php'; ?>
</div><!-- /.not-found -->