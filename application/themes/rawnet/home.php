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

    <section id="about" class="section section--left">
        <div class="section__content">
            <div class="section__wrapper">
                <h2 class="section__title">About</h2>
                <p class="section__copy">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem exercitationem debitis mollitia esse, porro architecto quo! Debitis quibusdam veniam eos porro corrupti obcaecati est recusandae expedita quidem dicta quos ratione in deleniti itaque atque natus delectus distinctio, temporibus accusamus et soluta ut dolorum. Magni obcaecati ut eligendi aut in odio!</p>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        
    </section>

    <section id="contact" class="section section--right section--secondary">
        <div class="section__content">
            <div class="section__wrapper">
                <h2 class="section__title">Contact</h2>
                <p class="section__copy">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quis voluptatibus ut ratione animi, ad minus voluptas dolorum officia reprehenderit labore similique sapiente maiores autem.</p>
                <dl class="contact-details">
                    <dt class="contact-details__title">Mobile</dt>
                    <dd class="contact-details__data"><a href="tel:07765066031">07765066031</a></dd>
                    <dt class="contact-details__title">Email</dt>
                    <dd class="contact-details__data"><a href="mailto:stefanie@peggysuesconfectionery.co.uk">stefanie@...</a></dd>
                </dl>
                <a href="#contact-form" class="button" data-behaviour="launch-modal" data-url="contact/form">Get in touch</a>
            </div>
        </div>
    </section>
    
</main>

<?php 

    $this->inc('includes/footer.php');
    $this->inc('includes/doc_footer.php');

?>