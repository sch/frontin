<div class="archives assets">
  <?php if ( is_day() ) : ?>
  <h2>Archives:  <?php echo get_the_date( 'F j, Y' ); ?></h2>
  <?php elseif ( is_month() ) : ?>
  <h2>Archives:  <?php echo get_the_date( 'F Y' ); ?></h2>
  <?php elseif ( is_year() ) : ?>
  <h2>Archives:  <?php echo get_the_date( 'Y' ); ?></h2>
  <?php else : ?>
  <h2>Archives</h2>
  <?php endif; ?>

  <?php include 'shared/loop.php'; ?>
  <?php include 'shared/content-nav.php'; ?>
</div><!-- /.archives -->