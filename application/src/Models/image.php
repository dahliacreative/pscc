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
    const SIZE_BANNER_IMAGE = 'banner';
    const SIZE_GALLERY_LARGE_IMAGE = 'gallery_large';
    const SIZE_GALLERY_SMALL_IMAGE = 'gallery_small';
    const SIZE_GALLERY_FULL_IMAGE = 'gallery_full';

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