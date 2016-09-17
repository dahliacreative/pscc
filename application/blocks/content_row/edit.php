<?php
defined('C5_EXECUTE') or die("Access Denied.");
$al = \Core::make('helper/concrete/asset_library');
use Concrete\Core\File\File;
?>
<div class="form-group">
    <?php echo $form->label('layout', t('Content Position')); ?><br/>
    <input type="radio" name="layout" value="default" id="defaultlayout" required  <?php if($layout === 'default') echo checked ?>/>&nbsp;
    <label for="defaultlayout">Content Left</label>&nbsp;&nbsp;
    <input type="radio" name="layout" value="right" id="rightlayout" required  <?php if($layout === 'right') echo checked ?>/>&nbsp;
    <label for="rightlayout">Content right</label>
</div>
<div class="form-group color-pickers">
    <?php echo $form->label('color', t('Color Scheme')); ?><br/>
    <input type="radio" class="color-pick color-pick--primary" name="color" value="default" id="defaultcolor" required <?php if($color === 'default') echo checked ?>/>
    <label for="defaultcolor">Default colors</label>&nbsp;&nbsp;
    <input type="radio" class="color-pick color-pick--secondary" name="color" value="secondary" id="secondarycolor" required <?php if($color === 'secondary') echo checked ?>/>
    <label for="secondarycolor">Secondary colors</label>&nbsp;&nbsp;
    <input type="radio" class="color-pick color-pick--tertiary" name="color" value="tertiary" id="tertiarycolor" required <?php if($color === 'tertiary') echo checked ?>/>
    <label for="tertiarycolor">Tertiary colors</label>
</div>
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