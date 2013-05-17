<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$articleMapper = new VV_Articles_ArticleMapper;
$article = $articleMapper->getByIblockID(1, array('pageSize' => 1));

if (current($article) instanceof VV_Articles_Article) 
{
    $article = current($article);
} else 
{
    $article = new VV_Articles_Article;
}

$arResult['article'] = $article; 




