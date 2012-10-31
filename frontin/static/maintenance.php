<?php if( !is_user_logged_in() ): ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php bloginfo( 'name' ); ?> | Maintenance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
        <style>
            body {
                font-family: sans-serif;
                text-align: center;
            }
        </style>
    </head>
  
    <body>
  
        <p>Maintenance</p>
  
        <p>Please come back in a few minutes</p>

    </body>
</html>
 
<?php die(); ?>

<?php endif; ?>