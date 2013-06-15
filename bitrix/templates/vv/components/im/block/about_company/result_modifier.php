<?php
$articleMapper = new VV_Articles_ArticleMapper;

$article = $articleMapper->getByIblockID(4, array('pageSize' => 1));

if (current($article) instanceof VV_Articles_Article) 
{
    $article = current($article);
} else 
{
    $article = new VV_Articles_Article;
}

$arResult['abouCompany'] = $article; 
