<?
$APPLICATION->SetTitle("ремонт и отделка квартир в Москве | строительная компания  vector-vip");
$APPLICATION->SetPageProperty("description",  'Строительная компания  vector-vip - ремонт и отделка квартир в Москве');
$APPLICATION->SetPageProperty("keywords", 'ремонт квартир в москве отделка квартир');
?>

<div class="scrolling-block">
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
                                <header class="av-header"><span>Наши работы</span></header>

                                <div class="av-content">
                                    <table class="gallery">
                                        <tr>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 1'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 2'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 3'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                        </tr>
                                        <tr>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 4'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 5'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                            <td><div><a rel=”nofollow” href="#" title='пример строительных работ 6'><img src="design/img/content/home-gallery-img.png" alt=""/></a></div></td>
                                        </tr>
                                    </table>
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
                                <section id="aside-news" class="av-block">
                                    <header class="av-header"><span>Новости</span></header>

                                    <div class="av-content">
                                        <article class="news-block">
                                            <header>22.10.2012</header>

                                            <div class="content">
                                                <a rel=”nofollow” href="#">Группа ГАЗ начала продажи автомобилей ГАЗель Бизнес с ГБО</a> <br/>
                                                Российские дилеры ГАЗ начали продажи новых модификаций автомобилей
                                            </div>
                                        </article>
                                        <article class="news-block">
                                            <header>22.10.2012</header>

                                            <div class="content">
                                                <a rel=”nofollow” href="#">Группа ГАЗ начала продажи автомобилей ГАЗель Бизнес с ГБО</a> <br/>
                                                Российские дилеры ГАЗ начали продажи новых модификаций автомобилей
                                            </div>
                                        </article>
                                        <!--<article class="news-block">-->
                                            <!--<header>22.10.2012</header>-->

                                            <!--<div class="content">-->
                                                <!--<a href="">Группа ГАЗ начала продажи автомобилей ГАЗель Бизнес с ГБО</a> <br/>-->
                                                <!--Российские дилеры ГАЗ начали продажи новых модификаций автомобилей-->
                                            <!--</div>-->
                                        <!--</article>-->
                                    </div>
                                </section><!-- #aside-news-->
                            </div>
                        </div>
                    </div>
                </aside><!-- #sideLeft -->

                <div class="height-clear"></div>
            </div><!--.scrolling-block-->