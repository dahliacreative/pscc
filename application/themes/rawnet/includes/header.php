<?php
    defined('C5_EXECUTE') or die("Access Denied."); 
    $c = Page::getCurrentPage();
    $pagename = $c->getCollectionName();
?>

<header role="banner" class="site-header" id="home">
    <a href="/"><img src="<?php echo $view->getThemePath()?>/app/images/interface/logo.svg" alt="Peggy Sue's Confectionery Company" class="brand"></a>
</header>
<?php if($pagename !== 'Terms & Conditions') : ?>
    <nav role="navigation" class="site-navigation" data-behaviour="sticky-nav">
        <a href="#home" class="site-navigation__brand" data-behaviour="scroll-to" tabindex="-1" data-url="/#/home">
            Home
            <img src="<?php echo $view->getThemePath()?>/app/images/interface/logo.svg" alt="Peggy Sue's Confectionery Company">
        </a>
        <ul class="site-navigation__list">
            <li class="site-navigation__item">
                <a href="#about" class="site-navigation__link" data-behaviour="scroll-to" data-url="/#/about">About</a>
            </li>
            <li class="site-navigation__item">
                <a href="#gallery" class="site-navigation__link" data-behaviour="scroll-to" data-url="/#/gallery">Gallery</a>
            </li>
            <li class="site-navigation__item">
                <a href="#contact" class="site-navigation__link" data-behaviour="scroll-to" data-url="/#/contact">Contact</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>