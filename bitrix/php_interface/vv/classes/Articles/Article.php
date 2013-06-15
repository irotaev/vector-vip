<?php

class VV_Articles_Article
{
    private $_id;
    private $_name;
    private $_detailText;
    private $_dateActiveFrom;
    private $_previewText;
    private $_code;     
    private $_previewImage;
    private $_imageGallery;
    
    private $_imageMapper;
    private $_articleMapper;
    private $_photoGalleryID;
    private $_previewImgID;
    
    public function __construct(array $init = array()) 
   {
        $this->_id = isset($init['id']) ? $init['id'] : '';
        $this->_name = isset($init['name']) ? $init['name'] : '';
        $this->_detailText = isset($init['detailText']) ? $init['detailText'] : '';
        $this->_dateActiveFrom = isset($init['dateActiveFrom']) ? $init['dateActiveFrom'] : '';
        $this->_previewText = isset($init["previewText"]) ? $init['previewText'] : '';
        $this->_code = isset($init["code"]) ? $init['code'] : '';
        $this->_previewImgID = isset($init["previewImgID"]) ? $init['previewImgID'] : '';
        
        if (isset($init['photoGalleryID']))
        {  
            $this->_articleMapper = new VV_Articles_ArticleMapper;
            $this->_imageMapper = new VV_Image_Local;
            
            $imagesID = $this->_articleMapper->getByIblockID(5, array(), (int)$init['photoGalleryID']);
                        
            $images = array();
            foreach ($imagesID as $imageID)
            {
                $imagePath = CFile::GetPath((int)$imageID->previewImgID);                
                $image = new VV_Image_Local($imagePath);
                array_push($images, $image);
            }
            $this->_imageGallery = $images;
        }        
    }
    
    public function __get($name)
    {
        switch($name)
        {
            default:
                return $this->{'_'.$name};
                break;
        }
    }
}