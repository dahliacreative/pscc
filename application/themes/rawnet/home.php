<?php 

    defined('C5_EXECUTE') or die("Access Denied.");
    $this->inc('includes/doc_header.php');
    $this->inc('includes/header.php');

?>

<main>

    <h1 class="sr-only">Peggy Sue's Confectionery Company</h1>
    <p class="sr-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, repudiandae!</p>

    <div class="banner" data-element="banner-slider">
        <div class="banner__slide">
            <img src="<?php echo $view->getThemePath()?>/app/images/content/banner-01.jpg" alt="Return to nature, white chocolate skull" class="banner__media">
            <div class="banner__content">
               <h3 class="banner__title">Return to nature</h3>
               <p class="banner__copy">White chocolate skull</p> 
            </div>
        </div>
        <div class="banner__slide">
            <img src="<?php echo $view->getThemePath()?>/app/images/content/banner-02.jpg" alt="Shallow graves, sugar cookies" class="banner__media">
            <div class="banner__content">
               <h3 class="banner__title">Shallow Graves</h3>
               <p class="banner__copy">Sugar Cookies</p> 
            </div>
        </div>
        <div class="banner__slide">
            <img src="<?php echo $view->getThemePath()?>/app/images/content/banner-03.jpg" alt="Botanical, vintage wedding cake" class="banner__media">
            <div class="banner__content">
               <h3 class="banner__title">Botanical</h3>
               <p class="banner__copy">Vintage wedding cake</p> 
            </div>
        </div>
    </div>

    <div id="about">
        <?php
            $a = new Area('About');
            $a->display($c);
        ?>    
    </div>

    <div id="gallery">
        <?php
            $a = new Area('Gallery');
            $a->display($c);
        ?>    
    </div>

    <div id="contact">
        <?php
            $a = new Area('Contact');
            $a->display($c);
        ?>
    </div>
    
</main>

<?php 

    $this->inc('includes/footer.php');
    $this->inc('includes/doc_footer.php');

?>