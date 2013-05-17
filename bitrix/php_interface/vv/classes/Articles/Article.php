<?php

class VV_Articles_Article
{
    private $_id;
    private $_name;
    private $_detailText;
    
    public function __construct(array $init = array()) 
   {
        $this->_id = isset($init['id']) ? $init['id'] : '';
        $this->_name = isset($init['name']) ? $init['name'] : '';
        $this->_detailText = isset($init['detailText']) ? $init['detailText'] : '';
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