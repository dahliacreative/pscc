<?php 

    defined('C5_EXECUTE') or die("Access Denied.");
    $this->inc('includes/doc_header.php');
    $this->inc('includes/header.php');
    $c = Page::getCurrentPage();
?>

<main>

    <h1 class="sr-only">Peggy Sue's Confectionery Company</h1>
    <p class="sr-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, repudiandae!</p>

    <?php
        $a = new Area('Banner');
        $a->display($c);
    ?> 

    <section id="about">
        <?php
            $a = new Area('About');
            $a->display($c);
        ?>    
    </section>

    <section id="gallery">
        <?php
            $a = new Area('Gallery');
            $a->display($c);
        ?>  
        <?php if ($c->isEditMode()) :  ?>
            <div class="gallery">
        <?php else : ?>
            <div class="gallery" data-behaviour="gallery">
        <?php endif; ?>
            <?php
                $a = new Area('Gallery Images');
                $a->display($c);
            ?>
        </div>  
    </section>

    <section id="contact">
        <?php
            $a = new Area('Contact');
            $a->display($c);
        ?>
    </section>
    
</main>

<?php 

    $this->inc('includes/footer.php');
    $this->inc('includes/doc_footer.php');

?>