<?php 
    defined('C5_EXECUTE') or die("Access Denied.");
    use Application\Src\Helpers\SEOHelper;
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <?php Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : ''));?>
        <?php print SEOHelper::canonicalURL(); ?>
        <?php print SEOHelper::metaOpenGraph($view->getThemePath()."/app/images/interface/logo.svg"); ?>
        <?php print SEOHelper::metaRobotsTag(); ?>

        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $view->getThemePath()?>/app/stylesheets/application.css">
        <link rel="shortcut icon" type="image/png" href="<?php echo $view->getThemePath()?>/app/images/interface/favicon.png">


    </head>
    <body class="<?php echo $c->getPageWrapperClass()?>">
        <div class="page">