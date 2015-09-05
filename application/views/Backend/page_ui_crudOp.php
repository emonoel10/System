<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        //<?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="//<?php echo $file; ?>" />

        //<?php endforeach; ?>
        //<?php foreach ($js_files as $file): ?>

            <script src="//<?php echo $file; ?>"></script>
        //<?php endforeach; ?>
    </head>
    <body>
        <div class="block full" style="margin:0 0 0px;">
            <div class="block-content-full">
                <?php echo $output; ?>
            </div>
        </div>
    </body>
</html>
