<?php
namespace Application\Src\Models;

use Concrete\Core\File\File;
use Concrete\Core\File\Image\BasicThumbnailer;
use Concrete\Core\File\Image\Thumbnail\Type\Type;

/**
 * Class Image
 * @package Application\Src\Models
 */
class Image
{
    const SIZE_PRODUCT_LISTING_IMAGE = 'product_listing_image';
    const SIZE_PRODUCT_DETAILS_MAIN_IMAGE = 'product_details_main_image';
    const SIZE_PRODUCT_SLIDER_IMAGE = 'product_slider_image';
    
    const SIZE_NEWS_IMAGE = 'news_image';
    const SIZE_BANNER_L = 'banner_l';
    const SIZE_BANNER_M = 'banner_m';
    const SIZE_BANNER_S = 'banner_s';
    const SIZE_COVER_IMAGE = 'file_cover_image';
    const SIZE_CARD_IMAGE = 'card_image';    
    const SIZE_IMAGE_TEXT_BLOCK = "image_text_block";

    /**
     * Gets an image object by its id
     *
     * @param $fileId
     * @param $imageType
     * @return string
     */
    public static function getPictureArray($file, $sizes)
    {
        $elements = false;
        if($file && is_array($sizes)) {
            foreach($sizes as $key=>$size) {
                $elements[$key] = Image::getUrl($file, $size);
            }
        }
        return $elements;
    }
    
    /**
     * Gets an image object by its id
     *
     * @param $fileId
     * @param $imageType
     * @return string
     */
    public static function getUrlById($fileId, $imageType)
    {
        $type = Type::getByHandle($imageType);
        if(!$type || !$fileId || !$file = File::getByID($fileId)) {
            return "";
        }
        return $file->getThumbnailURL($type->getBaseVersion());        
    }
    
    /**
     * Gets an image object
     *
     * @param $file
     * @param $imageType
     * @return string
     */
    public static function getUrl($file, $imageType)
    {
        $type = Type::getByHandle($imageType);
        if(!$type || !$file) {
            return "";
        }   
        return $file->getThumbnailURL($type->getBaseVersion());  
    }

    /**
     * Generates a thumbnail object
     *
     * @param File $file
     * @param $imageConfig
     * @return \stdClass
     */
    public static function generateThumbnail(File $file, $imageConfig)
    {
        $type = Type::getByHandle($imageConfig);
        $basicThumbnailer = new BasicThumbnailer();
        return $basicThumbnailer->getThumbnail($file, $type->getWidth(), $type->getHeight());
    }

    /**
     * Generates a thumbnail object
     *
     * @param File $file
     * @param $width
     * @param $height
     * @return \stdClass
     */
    public static function getThumbnail(File $file, $width, $height)
    {
        $basicThumbnailer = new BasicThumbnailer();
        return $basicThumbnailer->getThumbnail($file, $width, $height);
    }
    
    /**
     * Creates an image thumbnail type
     *
     * @param $name
     * @param $handle
     * @param $width
     * @param $heigth
     * @return $type
     */
    public static function createThumbnailType($name, $handle, $width, $heigth=false)
    {
        $type = new Type();
        $type->setName($name);
        $type->setHandle($handle);
        $type->setWidth($width);
        if($heigth) {
            $type->setHeight($heigth);
        }
        $type->save();
        return $type;
    }
    
}