<form action="<?php bloginfo('url'); ?>/" class="searchform" method="get" role="search">
  <fieldset>
    <label>
      Search for:
      <input type="text" name="s" value="<?php the_search_query(); ?>" />
    </label>
    <button type="submit">Go</button>
  </fieldset>
</form>