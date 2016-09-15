<?php
defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\File\File;
use Application\Src\Models\Image;

if($imageFileID) {
    if($layout === 'large') {
        $image = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_LARGE_IMAGE);
    } else {
        $image = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_SMALL_IMAGE);
    }
    $fullimage = Image::getUrlById($imageFileID, Image::SIZE_GALLERY_FULL_IMAGE);
}

$catClasses = implode(' ', json_decode($categories));

?>

<a href="<?php echo $fullimage; ?>" data-title="<?php echo $title; ?>" data-description="<?php echo $description ?>" class="gallery__item all <?php echo $catClasses; ?>" data-behaviour="show-gallery-image" rel="gallery">
    <?php if($image) : ?>
        <img src="<?php echo $image; ?>" alt="" class="gallery__image" />
    <?php endif; ?>
</a>