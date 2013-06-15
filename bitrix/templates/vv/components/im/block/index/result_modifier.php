<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$articleMapper = new VV_Articles_ArticleMapper;

// Статья на главной (о компании)
$article = $articleMapper->getByIblockID(4, array('pageSize' => 1));

if (current($article) instanceof VV_Articles_Article) 
{
    $article = current($article);
} else 
{
    $article = new VV_Articles_Article;
}

$arResult['article'] = $article; 

// Блок наши работы
$ourWorksArticles = $articleMapper->getByIblockID(2, array('pageSize' => 15));

if (!is_array($ourWorksArticles))
{
    $ourWorksArticle = new VV_Articles_Article;
}
else 
{
    $elemNum = array_rand($ourWorksArticles);
    $ourWorksArticle = $ourWorksArticles[$elemNum];
}

$arResult['ourWorksArticle'] = $ourWorksArticle; 





