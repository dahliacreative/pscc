<?php
namespace Application\Block\GalleryImage;

use Concrete\Core\Block\BlockController;
use \Database;
use \Core;
use \Config;

/**
 * Class Controller
 * @package Application\Block\Attachment
 */
class Controller extends BlockController
{
    protected $btTable = 'btRawnetGalleryImage';
    protected $btInterfaceWidth = "800";
    protected $btInterfaceHeight = "400";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = false;
    protected $btDefaultSet = 'rawnet';

    /**
     * @return string
     */
    public function getBlockTypeDescription()
    {
        return t("Renders a gallery image");
    }

    /**
     * @return string
     */
    public function getBlockTypeName()
    {
        return t("Gallery Image");
    }

    /**
     * Populate client side content
     */
    public function view()
    {
        
    }

    public function save($args) {
        $args['categories'] = json_encode($args['categories']);
        parent::save($args);
    }
    
    /**
     * Server side validation to ensure required fields are entered
     *
     * @param array $args
     * @return mixed
     */
    public function validate(array $args = [])
    {
        $errors = Core::make('helper/validation/error');

        if($args['imageFileID'] < 1) {
            $errors->add(t('You must select an image file.'));
        }

        return $errors;
    }

    public function create_seo_link($text) {
        $letters = array(
            '–', '—', '"', '"', '"', '\'', '\'', '\'',
            '«', '»', '&', '÷', '>',    '<', '$', '/'
        );

        $text = str_replace($letters, " ", $text);
        $text = str_replace("&", "and", $text);
        $text = str_replace("?", "", $text);
        $text = strtolower(str_replace(" ", "-", $text));

        return ($text);
    }
}