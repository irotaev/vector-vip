<?php
namespace VV\Articles;
use VV\Articles as NSArticles;

/**
 * 
 */
class ArticleMapper
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new NSArticles\ArticleDB;
    }    
    
    public function getAll($params = array())
    {
        $result = array();
        foreach($this->_db->fetch(array(), $params) as $row) { 
            $result[$row['ID']] = $this->_map($row);
        }
        return $result;
    }
    
    public function getByIblockID($iblockID, $params = array(), $sectionID = null)
    {
        $result = array();
        
        $filter = array('IBLOCK_ID' => $iblockID);
        $sectionFilter = isset($sectionID) ? array("SECTION_ID" => $sectionID) : array();
        array_push($filter, $sectionFilter);
        
        foreach($this->_db->fetch(array('IBLOCK_ID' => $iblockID), $params) as $row) { 
            $result[$row['ID']] = $this->_map($row);
        }
        return $result;
    }
    
    public function getByIblockSection($iblockID, $params = array())
    {
        $result = array();
        foreach($this->_db->fetch(array('IBLOCK_ID' => 3, "SECTION_ID" => $iblockID), $params) as $row) { 
            $result[$row['ID']] = $this->_map($row);
        }
        return $result;
    }

    public function getPaginatorResource()
    {
        return $this->_db->getDBResource();
    }

    protected function _map($row = array())
    {  
        if (empty($row)) {
            return new NSArticles\Article;
        }
        return new NSArticles\Article(array(
            'id' => $row['ID'],
            'name' => $row['NAME'],
            'detailText' => $row['DETAIL_TEXT'],
            'dateActiveFrom' => $row["DATE_ACTIVE_FROM"],
            'previewText'       => $row["PREVIEW_TEXT"],
            'code'                 =>  $row["CODE"],
            'photoGalleryID'  => $row['PROPERTY_PHOTOGALLERY_VALUE'],
            'previewImgID'        => $row["PREVIEW_PICTURE"]
        ));
    }

}