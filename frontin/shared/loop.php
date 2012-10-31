<?php while ( have_posts() ) : the_post(); ?>
<div class="article" role="article">
  <h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink"><?php the_title(); ?></a></h3>
  
  <p class="datetime-<?php echo the_date( 'c' ); ?>">
    <?php the_time( 'F j, Y' ); ?>
  </p>	
  
  <?php echo frontin_clean_code( get_the_content() ); ?>

</div><!-- /.article -->  
<?php endwhile; ?>