<?php 
defined('C5_EXECUTE') or die("Access Denied.");
use Application\Src\Models\Image;
$c = Page::getCurrentPage();
?>

<?php if ($c->isEditMode()) :  ?>
  <div class="banner banner--is-in-edit-mode">
    <div class="banner__slide">
        <div class="banner__content">
           <h3 class="banner__title">Image slider is disabled in edit mode</h3>
           <p class="banner__copy">Click to edit the image slider</p> 
        </div>
    </div>
  </div>
<?php elseif(count($rows) > 0) : ?>
  <div class="banner" data-element="banner-slider">
    <?php foreach($rows as $row) : ?>
      <div class="banner__slide">
          <?php $f = File::getByID($row['fID']); ?>
          <?php if(is_object($f)) : ?>
            <img src="<?php echo Image::getUrl($f, Image::SIZE_PRODUCT_SLIDER_IMAGE); ?>" alt="<?php echo $row['title'] ?>" class="banner__media">
          <?php endif; ?>
          <div class="banner__content">
             <h3 class="banner__title"><?php echo $row['title']; ?></h3>
             <div class="banner__copy">
               <?php echo $row['description']; ?>
             </div> 
          </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>