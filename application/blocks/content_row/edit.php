<?php
defined('C5_EXECUTE') or die("Access Denied.");
$al = \Core::make('helper/concrete/asset_library');
use Concrete\Core\File\File;
?>
<div class="form-group">
    <?php echo $form->label('imageFileID', t('Image')); ?>
    <?php echo $al->file('imageFileID', 'imageFileID', t('Choose an image'), (($imageFileID) ? File::getByID($imageFileID) : null)); ?>
</div>
<div class="form-group">
    <?php echo $form->label('title', t('Title'))?>
    <?php echo $form->text('title', $title); ?>
</div>
<div class="form-group">
    <?php echo $form->label('content', t('Content'))?>
    <?php echo Core::make("editor")->outputStandardEditor('content', $content); ?>
</div>