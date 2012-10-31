<?php if (  $wp_query->max_num_pages > 1 ) : ?>	
<div class="content-nav">
  <?php next_posts_link( '<span class="previous">&larr; Older Articles</span>' ); ?>
  <?php previous_posts_link( '<span class="next">Newer Articles &rarr;</span>' ); ?>			
</div>														
<?php endif; ?>

<?php if ( is_single() ): ?>
<div class="content-nav">
  <?php previous_post_link( '<span class="previous">&larr; %link</span>' ); ?> 
  <?php next_post_link( '<span class="next">%link &rarr;</span>' ); ?>			
</div>														
<?php endif; ?>