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
        
        \CMOdule::includeModule('iblock');
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
        if (isset($sectionID))
            $filter["SECTION_ID"] = $sectionID;
                
        array_push($filter, $sectionFilter);
        
        foreach($this->_db->fetch($filter, $params) as $row) { 
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
    
    public function GetCompanyWorkFromEachSection()
    {
        $sectionArrayIds = \CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>"2")); 
        $companyWorks = array(); 
        
        while($companySection = $sectionArrayIds->GetNext())
        {
            $companyWorkRow = current($this->_db->fetch(array('IBLOCK_ID' => 2, 'SECTION_ID' => $companySection["ID"]), array('pageSize' => 1))); 
            $companyWork = $this->_map($companyWorkRow);
            
            $sectionCompanyWork = new EachSectionCompanyWork();
            $sectionCompanyWork->CompanyWork = $companyWork;
            $sectionCompanyWork->SectionId = $companySection["ID"];
            
            array_push($companyWorks, $sectionCompanyWork);
        }
        
        return $companyWorks;
    }
    
    public function getPaginatorResource()
    {
        return $this->_db->getDBResource();
    }

    protected function _map($row = array())
    {  
        if (empty($row)) {
            return new Article;
        }
        
        $sectionName = null;
        if ($row['IBLOCK_SECTION_ID'])
        {
            $rowSection = \CIBlockSection::GetByID($row['IBLOCK_SECTION_ID'])->GetNext();
            
            if ($rowSection)
            {
                $sectionName = $rowSection['NAME'];
            }
        }
        
        return new NSArticles\Article(array(
            'id' => $row['ID'],
            'name' => $row['NAME'],
            'detailText' => $row['DETAIL_TEXT'],
            'dateActiveFrom' => $row["DATE_ACTIVE_FROM"],
            'previewText'       => $row["PREVIEW_TEXT"],
            'code'                 =>  $row["CODE"],
            'photoGalleryID'  => $row['PROPERTY_PHOTOGALLERY_VALUE'],
            'previewImgID'        => $row["PREVIEW_PICTURE"],
            'SectionName'    => $sectionName
        ));
    }

}

class EachSectionCompanyWork
{
    private $_SectionId;
    private $_CompanyWork;
    
    public function __get($name) 
    {
        switch($name)
        {
            default :
                return $this->{"_".$name};
                break;
        }
    }
    
    public function __set($name, $value) 
    {
        switch($name)
        {
            case "CompanyWork":
                if ($value instanceof Article)
                    $this->_CompanyWork = $value;
                break;
            default :
                $this->{"_".$name} = $value;
                break;
        }
    }
}