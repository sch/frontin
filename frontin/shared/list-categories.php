<?php foreach( frontin_get_categories( 'ASC' ) as $category): ?> 
<ul class="list-categories">
  <li>
    <a href="<?php echo $category->href; ?>" title="<?php echo $category->title; ?>"><?php echo $category->title; ?></a>
  </li>
</ul>
<?php endforeach; ?>