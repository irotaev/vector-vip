<?php
use VV\Articles as NSArticles;

$articleMapper = new NSArticles\ArticleMapper;

$ourWorksArticles = $articleMapper->getByIblockID(2, array('pageSize' => 10));

if (!(current($ourWorksArticles) instanceof NSArticles\Article)) 
{
    $ourWorksArticles = array(new NSArticles\Article);
}

$arResult['ourWorksArticles'] = $ourWorksArticles; 
