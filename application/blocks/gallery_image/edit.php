<?php
defined('C5_EXECUTE') or die("Access Denied.");
$al = \Core::make('helper/concrete/asset_library');
use Concrete\Core\File\File;
?>
<div class="form-group">
    <?php echo $form->label('layout', t('Content Position')); ?><br/>
    <input type="radio" name="layout" value="small" id="smalllayout" required <?php if($layout === 'small') echo "checked" ?>/>&nbsp;
    <label for="smalllayout">Small</label>&nbsp;&nbsp;
    <input type="radio" name="layout" value="large" id="largelayout" required <?php if($layout === 'large') echo "checked" ?>/>&nbsp;
    <label for="largelayout">Large</label>
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
    <?php echo $form->text('description', $description); ?>
</div>
<div class="form-group">
    <?php echo $form->label('categories', t('Categories'))?><br>
    <select name="categories[]" multiple style="width: 300px;" required>
        <?php if(isset($categories)) : ?>
            <option value="wedding" <?php if(in_array('wedding', json_decode($categories))) echo 'selected'; ?>>Weddings</option>
            <option value="celebration" <?php if(in_array('celebration', json_decode($categories))) echo 'selected'; ?>>Celebrations</option>
            <option value="confectionery" <?php if(in_array('confectionery', json_decode($categories))) echo 'selected'; ?>>Confectionery</option>
        <?php else : ?>
            <option value="wedding">Weddings</option>
            <option value="celebration">Celebrations</option>
            <option value="confectionery">Confectionery</option>
        <?php endif; ?>
    </select>
</div>