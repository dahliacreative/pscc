<?php
namespace Application\Block\ContentRow;

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
    protected $btTable = 'btRawnetContentRow';
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
        return t("Renders a content row with a background image");
    }

    /**
     * @return string
     */
    public function getBlockTypeName()
    {
        return t("Content Row");
    }

    /**
     * Populate client side content
     */
    public function view()
    {
        
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
}