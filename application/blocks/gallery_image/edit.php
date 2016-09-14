<?php
defined('C5_EXECUTE') or die("Access Denied.");
$al = \Core::make('helper/concrete/asset_library');
use Concrete\Core\File\File;
?>
<div class="form-group">
    <?php echo $form->label('layout', t('Content Position')); ?><br/>
    <input type="radio" name="layout" value="small" id="smalllayout"/>&nbsp;
    <label for="smalllayout">Large</label>&nbsp;&nbsp;
    <input type="radio" name="layout" value="large" id="largelayout"/>&nbsp;
    <label for="largelayout">Small</label>
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
    <?php echo $form->label('description', t('Description'))?>
    <?php echo Core::make("editor")->outputStandardEditor('description', $description); ?>
</div>
<div class="form-group">
    <?php echo $form->label('categories', t('Categories'))?>
    <select name="categories" multiple>
        <option value="wedding">Weddings</option>
        <option value="celebration">Celebrations</option>
        <option value="confectionery">Confectionery</option>
    </select>
</div>
