<?php foreach( frontin_get_archives() as $archive ): ?> 
<ul class="list-archives">
  <li>
    <a href="<?php echo $archive->href ?>" title="<?php echo $archive->title; ?>"><?php echo $archive->title; ?></a>
  </li>
</ul>
<?php endforeach; ?>