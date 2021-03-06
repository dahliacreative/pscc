<?php
    defined('C5_EXECUTE') or die("Access Denied.");
    use Application\Src\Helpers\SEOHelper;
    $c = Page::getCurrentPage();
    $u = new User();
?>

<!DOCTYPE html>
<html lang="en" class="no-js no-touch">
    <head>
        <?php 
            if($u->IsLoggedIn()) {
                Loader::element('header_required');
            }
        ?>
        <meta property="og:title" content="<?php echo $c->getCollectionAttributeValue('meta_title');?>" />
        <meta property="og:url" content="http://www.peggysuesconfectionery.co.uk" />
        <meta property="og:description" content="<?php echo $c->getCollectionAttributeValue('meta_description'); ?>" />
        <meta property="og:image" content="http://www.peggysuesconfectionery.co.uk/application/files/7314/7455/5703/skull.jpg" />

        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $view->getThemePath()?>/app/stylesheets/application.css">

    </head>
    <body class="<?php echo $c->getPageWrapperClass()?>">
        <div class="page">
