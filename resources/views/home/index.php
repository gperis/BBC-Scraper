<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test project</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="content">
        <h1><?php echo $tagCount; ?></h1>

        <h2>Is the number of <?php echo $tag; ?> tags on <a href="<?php echo $urlToScrape; ?>" target="_blank"><?php echo $urlToScrape; ?></a></h2>

        <h3>(It may vary depending on dynamically loaded content)</h3>
    </div>
</div>
</body>
</html>