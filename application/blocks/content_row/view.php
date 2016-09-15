<?php
defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\File\File;
use Application\Src\Models\Image;

if($imageFileID) {
    $image = Image::getUrlById($imageFileID, Image::SIZE_BANNER_IMAGE);
}

$classNames = ['section'];
if($layout === 'right') {
    $classNames[] = 'section--right';
}
if($color != 'default') {
    $classNames[] = 'section--'.$color;
}

?>

<div class="<?php echo implode(" ", $classNames); ?>">
    <?php if($image) : ?>
        <img src="<?php echo $image; ?>" alt="" class="section__media" />
    <?php endif; ?>
    <div class="section__content">
        <div class="section__wrapper">
            <h2 class="section__title"><?php echo $title; ?></h2>
            <div class="section__copy">
                <?php echo $content; ?>
            </div>
            <?php if(strtolower($title) === 'contact') : ?>
                <dl class="contact-details">
                    <dt class="contact-details__title">Mobile</dt>
                    <dd class="contact-details__data"><a href="tel:07765066031">07765066031</a></dd>
                    <dt class="contact-details__title">Email</dt>
                    <dd class="contact-details__data"><a href="mailto:stefanie@peggysuesconfectionery.co.uk">stefanie@...</a></dd>
                </dl>
                <a href="#contact-form" class="button" data-behaviour="launch-modal" data-url="contact/form">Get in touch</a>
            <?php endif; ?>
            <?php if(strtolower($title) === 'gallery') : ?>
                <select data-behaviour="filter-gallery" data-element="custom-select">
                    <option value="all">View All</option>
                    <option value="wedding">Weddings</option>
                    <option value="celebration">Celebration</option>
                    <option value="confectionery">Confectionery</option>
                </select>
            <?php endif; ?>
        </div>
    </div>
</div>