<?php

$articleMapper = new VV_Articles_ArticleMapper;

$ourWorksArticles = $articleMapper->getByIblockID(2, array('pageSize' => 10));

if (!(current($ourWorksArticles) instanceof VV_Articles_Article)) 
{
    $ourWorksArticles = array(new VV_Articles_Article);
}

$arResult['ourWorksArticles'] = $ourWorksArticles; 
