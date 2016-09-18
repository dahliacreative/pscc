<?php 

    defined('C5_EXECUTE') or die("Access Denied.");
    $this->inc('includes/doc_header.php');
    $this->inc('includes/header.php');
    $c = Page::getCurrentPage();
?>

<main>

    <section class="row">
        <?php
            $a = new Area('Title');
            $a->display($c);
        ?>    
    </section>

    <div class="row wysiwyg">
        <?php
            $a = new Area('Terms');
            $a->display($c);
        ?>
    </div>
    
</main>

<?php 

    $this->inc('includes/footer.php');
    $this->inc('includes/doc_footer.php');

?>