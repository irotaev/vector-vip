<?
$APPLICATION->SetTitle("ремонт и отделка квартир в Москве | строительная компания  vector-vip");
$APPLICATION->SetPageProperty("description",  'Строительная компания  vector-vip - ремонт и отделка квартир в Москве');
$APPLICATION->SetPageProperty("keywords", 'ремонт квартир в москве отделка квартир');
?>  

<div class="scrolling-block">
    <header class="h1-header av-block">
        <div class="av-header"><h1>Главная страница строительной компании vector-vip2222</h1></div>
    </header>

    <div class="content-for-edit">
        <div id="container">
            <div id="content">
                <div id="main-img-wrapper"></div>

                <div id="main-search" class="av-block">
                    <div class="av-content">
                        <form name="mainSearch">
                            <input type="text" class="search" placeholder="Введите слова для поиска" />
                            <input type="submit" class="search-btn" value=""/>
                        </form>
                    </div>
                </div><!-- #main-search-->

                <section id="changebleContent" class="p_content">
                    <article id="home-article" class="av-block ">
                        <header class="av-header"><span>О компании</span></header>

                        <div class="av-content">
                            <?=$arResult['article']->detailText?>
                        </div>
                    </article>

                    <div id="home-gallery-preview" class="av-block">  
                        <header class="av-header"><span>Наши работы: <?=$arResult["ourWorksArticle"]->name?></span></header>

                        <div class="av-content photo-gallery">
                                    <?$counter = 1;?>
                                    <?  foreach ($arResult["ourWorksArticle"] as $companyWork):?>
                                    <?$image = $companyWork->imageGallery[array_rand($companyWork->imageGallery)];?>
                                    <?if ($counter == 1 || $counter  % 3 == 0):?>
                                    <!--<tr>-->
                                    <?endif;?>
                                    <div class="gallery-item">   
                                        <a class="fancybox" href="<?=$image->GetUrl()?>" title="<?=$companyWork->SectionName?>" rel="group1"> 
                                            <img src="<?=$image->Crop(206, 140)->GetUrl()?>" alt=""/>
                                        </a></div>
                                    <?$counter ++;?>    
                                    <?if ($counter == 1 || $counter  % 3 == 0):?>
                                    <!--</tr>-->
                                    <?endif;?>
                                    <?  endforeach;?>   

                                    <div class="clear-both"></div>
                        </div>
                    </div>
                </section><!-- #changebleContent-->
            </div><!-- #content-->
        </div><!-- #container-->

        <aside id="sideLeft">
            <div class="scroll-down"></div>
            <div class="scroll-top"></div>
            <div class="menu-open-btn"></div>

            <div class="content">
                <div id="side-left-additional-content">
                    <div class="inner-wrapper">
                        <?$APPLICATION->IncludeComponent('im:block', 'news', array("template" => "aside_news"))?>                        
                    </div>
                </div>
            </div>
        </aside><!-- #sideLeft -->
    </div><!--.content (формирует контент с отступами)-->

    <div class="height-clear"></div>
    </div><!--.scrolling-block-->