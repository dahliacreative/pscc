<?php
    defined('C5_EXECUTE') or die("Access Denied."); 
    $c = Page::getCurrentPage();
    $p = new Permissions($c);
?>

        </div>
    
        <?php if(!$p->canViewToolbar()) : ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <?php endif; ?>
        <?php View::element('footer_required'); ?>
        <script src="<?php echo $view->getThemePath()?>/app/javascript/application.js"></script>
        <script> 
            var $buoop = {c:2};function $buo_f(){var e = document.createElement("script");e.src = "//browser-update.org/update.min.js"; document.body.appendChild(e);};
            try {document.addEventListener("DOMContentLoaded", $buo_f,false)};catch(e){window.attachEvent("onload", $buo_f)};
        </script> 
    
    </body>
</html>