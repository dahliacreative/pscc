<?php 
    defined('C5_EXECUTE') or die("Access Denied.");
    use Application\Src\Helpers\SEOHelper;
?>

<!DOCTYPE html>
<html lang="en" class="no-js no-touch">
    <head>
        <?php Loader::element('header_required');?>
        <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
        <meta property="og:title" content="Peggy Sue's Confectionery Company :: Home" />
        <meta property="og:url" content="http://www.peggysuesconfectionery.co.uk" />
        <meta property="og:description" content="Description of the site here" />
        <meta property="og:image" content="<?php echo $view->getThemePath()?>/app/images/content/banner-01.jpg" />

        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $view->getThemePath()?>/app/stylesheets/application.css">
        <link rel="shortcut icon" type="image/png" href="<?php echo $view->getThemePath()?>/app/images/interface/favicon.png">

    </head>
    <body class="<?php echo $c->getPageWrapperClass()?>">
        <div class="page">