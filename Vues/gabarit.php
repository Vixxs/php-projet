<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Wegroup</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="/Vues/standard/css/style.css" >
        <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>