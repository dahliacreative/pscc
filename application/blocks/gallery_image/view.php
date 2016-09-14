<?php
defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\File\File;
use Application\Src\Models\Image;

if($imageFileID) {
    if($layout ==='large') {
        $image = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_LARGE);
    } else {
        $image = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_SMALL);
    }
    $fullimage = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_FULL);
}
?>

<?php echo $categories; ?>

<a href="<?php echo $fullimage; ?>" class="gallery__item gallery__item--<?php echo $layout; ?> <?php #echo implode(' ', $categories); ?>" data-behaviour="show-gallery-image">
    <?php if($image) : ?>
        <img src="<?php echo $image; ?>" alt="" class="gallery__image" />
    <?php endif; ?>
</a>