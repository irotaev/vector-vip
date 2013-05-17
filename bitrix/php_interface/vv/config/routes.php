<?php
$sAdvertisingSections = 'obrati_vnimanie|promotion';

/* rule         - регулярка для определения физического месторасположения скрипта отрубает все после знака ?
 * query_rule   - тоже что rule но с get параметрами.
 * template     - шаблон url
 * module       - шаблон компонента im:block
 * rule_params  - параметры для скрипта, получаемые регуляркой из rule или query_rule
 * fixed_params - дополнительные параметры не меняющиеся для данного модуля.
 * ajax         - тип ответа, если задан этот параметр то подключается prolog_before.php вместо header.php см. dispatcher.php
 *
 * Используется  одно из rule или query_rule
 * rule_params и fixed_params объединяются и передаются в качестве $arParams в шаблон, указанный в module
 */
$routes = array(
    // из-за СУЩЕСТВУЮЩЕЙ папки /services/ пришлось закоментить -d  на правиле в
    // htaccess, из-за этого не вызывался index.php в корне
    'index'         => array(
        'rule'          => '^/(index_banner(2)?\.php)?$',
        'module'        => 'index',
    ),

    'about_company'     => array(
        'rule'          => '^/about-company/$',
        'module'    => 'about_company'
    ),
    
    
    
    
    
    // теги - должны стоять первыми!
    'tag_list'      => array(
        'rule'          => '/tag/$',
        'template'      => '/tag/',
        'module'        => 'tags',
    ),
    'tag_detail'    => array(
        'rule'          => '/tag/([a-z0-9\-]+)/$',
        'template'      => '/tag/#ELEMENT#/',
        'module'        => 'tags',
        'rule_params'   => array(1 => 'ELEMENT'),
    ),

    // тиды и рефы
    'tid'           => array(
        'rule'          => '^/tid/ref/(\d+)/$',
        'module'        => 'tid',
        'rule_params'   => array(1 => 'ELEMENT'),
        'ajax'          => 'text/html',
    ),

    // аяксовый запрос рейтинга (относительно любого урла)
    'rating_ajax'   => array(
        'query_rule'=> '\?setrating&id=(\d+)&val=(\d+)&type=(\w+)',
        'module'    => 'block_sharebar_rating',
        'fixed_params'  => array('SETRATING' => true),
        'rule_params'   => array(1 => 'OBJECT', 2 => 'VALUE', 3 => 'OBJECT_TYPE'),
        'ajax'   => 'application/json',
    ),

    // видео должно быть раньше статей и разделов, чтобы /section/video/ не обработалось
    'video'     => array(
        'rule'          => '^/video/$',
        'template'      => '/video/',
        'module'        => 'video',
    ),
    'video_section'     => array(
        'rule'          => '^/(form|sex|health|diet|life|fashion|technics)/video/$',
        'template'      => '/#SECTION#/video/',
        'module'        => 'video',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'license' => array(
        'rule'        => '^/licenzionnoe-soglasheniye/$',
        'template'    => '/licenzionnoe-soglasheniye/',
        'module'      => 'license',
        'rule_params' => array( ),
    ),
    // статьи
    // аяксовый запрос рекомендуемых статей
    'ajax' => array(
        'query_rule'=> '\?recommended',
        'module' => 'articles',
        'fixed_params' => array('RECOMMENDED_REQUEST' => true),
        'rule_params' => array(),
        'ajax' => 'application/json; charset=UTF-8',
    ),
    'articles_section'=> array(
        'rule'          => '^/(form|sex|health|diet|life|fashion|technics|workout)/$',
        'template'      => '/#SECTION#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'articles_subsection'       => array(
        'rule'          => '^/(form|sex|health|diet|life|fashion|technics|workout)/([\w\-\d]+)/$',
        'template'      => '/#SECTION#/#SUBSECTION#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'SECTION', 2 => 'SUBSECTION'),
    ),
    'articles_article'       => array(
        'rule'          => '^/(form|sex|health|diet|life|fashion|technics|workout)/([\w\-\d]+)/([\d\w+\-]+)/$',
        'template'      => '/#SECTION#/#SUBSECTION#/#ARTICLE#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'SECTION', 2 => 'SUBSECTION', 3 => 'ARTICLE'),
    ),
    'articles_article_page'       => array(
        'rule'          => '^/(form|sex|health|diet|life|fashion|technics|workout)/([\w\-\d]+)/([\d\w+\-]+)/(\d+)/$',
        'template'      => '/#SECTION#/#SUBSECTION#/#ARTICLE#/#PAGE#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'SECTION', 2 => 'SUBSECTION', 3 => 'ARTICLE', 4 => 'PAGE'),
    ),
    // статьи, не имеющие подраздела (рекламные типа)
    'advertising_articles_section'=> array(
        'rule'          => '^/('.$sAdvertisingSections.')/$',
        'template'      => '/#ADV_SECTION#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'ADV_SECTION'),
    ),
    'advertising_articles_article'       => array(
        'rule'          => '^/('.$sAdvertisingSections.')/([\d\w+\-]+)/$',
        'template'      => '/#ADV_SECTION#/#ARTICLE#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'ADV_SECTION', 2 => 'ARTICLE'),
    ),
    'advertising_articles_article_page'       => array(
        'rule'          => '^/('.$sAdvertisingSections.')/([\d\w+\-]+)/(\d+)/$',
        'template'      => '/#ADV_SECTION#/#ARTICLE#/#PAGE#/',
        'module'        => 'articles',
        'rule_params'   => array(1 => 'ADV_SECTION', 2 => 'ARTICLE', 3 => 'PAGE'),
    ),
    // новости
    'news'      => array(
        'rule'          => '^/news/$',
        'template'      => '/news/',
        'module'        => 'news',
    ),

    // блог редакции
    'blogs_editorial'     => array(
        'rule'          => '^/blog_redakcii/$',
        'template'      => '/blog_redakcii/',
        'module'        => 'blogs',
        'fixed_params' => array('EDITORIAL_BLOG' => true),
        'rule_params'   => array(),
    ),
    'blogs_editorial_post'     => array(
        'rule'          => '^/blog_redakcii/([\w\-\d]+)\.php$',
        'template'      => '/blog_redakcii/#POST#.php',
        'module'        => 'blogs',
        'fixed_params' => array('EDITORIAL_BLOG' => true),
        'rule_params'   => array(1 => 'POST'),
    ),
    'blogs_editorial_post_page'     => array(
        'rule'          => '^/blog_redakcii/([\w\-\d]+)/\d+/$',
        'template'      => '/blog_redakcii/#POST#/#PAGE#/',
        'module'        => 'blogs',
        'fixed_params' => array('EDITORIAL_BLOG' => true),
        'rule_params'   => array(1 => 'POST', 2 => 'PAGE'),
    ),

    // колумнисты
    'blogs'     => array(
        'rule'      => '^/blog/$',
        'template'  => '/blog/',
        'module'    => 'blogs',
    ),
    'blogs_blog'     => array(
        'rule'          => '^/blog/([\w\-\d]+)/$',
        'template'      => '/blog/#BLOG#/',
        'module'        => 'blogs',
        'rule_params'   => array(1 => 'BLOG'),
    ),
    'blogs_post'        => array(
        'rule'          => '^/blog/([\w\-\d]+)/([\w\-\d]+)\.php$',
        'template'      => '/blog/#BLOG#/#POST#.php',
        'module'        => 'blogs',
        'rule_params'   => array(1 => 'BLOG', 2 => 'POST'),
    ),
    'blogs_post_page'   => array(
        'rule'          => '^/blog/([\w\-\d]+)/([\w\-\d]+)/\d+/$',
        'template'      => '/blog/#BLOG#/#POST#/#PAGE#/',
        'module'        => 'blogs',
        'rule_params'   => array(1 => 'BLOG', 2 => 'POST', 3 => 'PAGE'),
    ),

    // Авторы
    'authors_list'     => array(
        'rule'          => '^/authors/$',
        'template'      => '/authors/',
        'module'        => 'authors',
    ),
    'authors_author'     => array(
        'rule'          => '^/authors/([\d\w+\-]+)/$',
        'template'      => '/authors/#AUTHOR#/',
        'module'        => 'authors',
        'rule_params'   => array(1 => 'AUTHOR'),
    ),

    // Обратная связь
    'feedback_list'     => array(
        'rule'          => '^/feedback/$',
        'template'      => '/feedback/',
        'module'        => 'feedback',
    ),
    // Обратная связь
    'feedback_list1'     => array(
        'rule'          => '^/feedback1/$',
        'template'      => '/feedback1/',
        'module'        => 'feedback1',
    ),

    // архив журналов
    'issues_list' => array(
        'rule' => '^/magazine/archive/$',
        'template' => '/magazine/archive/',
        'module' => 'issues',
    ),
    'issues_year' => array(
        'rule' => '^/magazine/archive/year/(\d{4})/$',
        'template' => '/magazine/archive/year/#YEAR#/',
        'module' => 'issues',
        'rule_params'   => array(1 => 'YEAR'),
    ),
    'issues_issue' => array(
        'rule' => '^/magazine/archive/journal/([\d\w+\-]+)/$',
        'template' => '/magazine/archive/journal/#ISSUE#/',
        'module' => 'issues',
        'rule_params' => array(1 => 'ISSUE'),
    ),
    'issues_feedback' => array(
        'rule' => '^/magazine/feedback/([\d\w+\-]+)/$',
        'template' => '/magazine/feedback/#ISSUE#/',
        'module' => 'issues_feedback',
        'rule_params' => array(1 => 'ISSUE'),
    ),

    'advice_list' => array(
        'rule'          => '^/advice/$',
        'template'      => '/advice/',
        'module'        => 'experts',
        'rule_params'   => array(),
    ),
    'advice_section' => array(
        'rule'          => '^/advice/([\d\w\-_]+)/$',
        'template'      => '/advice/#SECTION#/',
        'module'        => 'experts',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'advice_section_answered' => array(
        'rule'          => '^/advice/([\d\w\-_]+)/answered/$',
        'template'      => '/advice/#SECTION#/answered/',
        'fixed_params'  => array('ANSWERED' => true),
        'module'        => 'experts',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'advice_section_published' => array(
        'rule'          => '^/advice/([\d\w\-_]+)/published/$',
        'template'      => '/advice/#SECTION#/published/',
        'fixed_params'  => array('PUBLISHED' => true),
        'module'        => 'experts',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'advice_section_question' => array(
        'rule'          => '^/advice/([\d\w\-\_]+)/(\d+)/$',
        'template'      => '/advice/#SECTION#/#QUESTION#/',
        'module'        => 'experts',
        'rule_params'   => array(1 => 'SECTION',2 => 'QUESTION'),
    ),

    // сервисы
    'services' => array(
        'rule'          => '^/services/(\w+\.php)?$',
        'module'        => 'services',
        'rule_params'   => array(1 => 'SERVICE'),
    ),

    // тесты
    'tests' => array(
        'rule'          => '^/tests/$',
        'template'      => '/tests/',
        'module'        => 'tests',
        'rule_params'   => array(1 => 'TEST'),
    ),

    'tests_test' => array(
        'query_rule'    => '^/tests/test.php(?:\?.+&|\?)id=(\d+)',
        'template'      => '/tests/test.php?id=#TEST#',
        'module'        => 'tests',
        'rule_params'   => array(1 => 'TEST'),
    ),

    'user_registration'  => array(
        'rule'      => '^/personal/registration/$',
        'template'  => '/personal/registration/',
        'module'    => 'registration',
    ),

    'user_info' => array(
        'rule'          => '^/personal/(\d+)/$',
        'template'      => '/personal/#USER_ID#/',
        'module'        => 'profile',
        'rule_params'   => array(1 => 'USER_ID'),
    ),

    'user_profile' => array(
        'rule'=> '^/personal/$',
        'template'  => '/personal/',
        'module'    => 'profile',
    ),
    'rss' => array(
        'rule'=> '^/rss/$',
        'template'  => '/rss/',
        'module'    => 'rss',
    ),
    'search' => array(
        'rule'=> '^/search/$',
        'template'  => '/search/',
        'module'    => 'search',
    ),

    //  top 100
    'top100_index'      => array(
        'rule'          => '^/top100/$',
        'template'      => '/top100/',
        'module'        => 'top100',
    ),
    'top100_section'    => array(
        'rule'          => '^/top100/([\w\-\d]+)/$',
        'template'      => '/top100/#SECTION#/',
        'module'        => 'top100',
        'rule_params'   => array(1 => 'SECTION'),
    ),
    'top100_detail'=> array(
        'rule'      => '^/top100/([\w\-\d]+)/([\w\-\d]+)/$',
        'template'  => '/top100/#SECTION#/#PERSON#/',
        'module'    => 'top100',
        'rule_params'   => array(1 => 'SECTION', 2 => 'PERSON'),
    ),

    // серии статей - спецпроекты
    'special_index'   => array(
        'rule'          => '^/special/([\w\-\d]+)/$',
        'template'      => '/special/#SET#/',
        'module'        => 'special',
        'fixed_params'  => array('PAGE' => 'index'),
        'rule_params'   => array(1 => 'SET'),
    ),
    'special_page'   => array(
        'rule'          => '^/special/([\w\-\d]+)/([\w\-\d]+)/$',
        'template'      => '/special/#SET#/#PAGE#/',
        'module'        => 'special',
        'rule_params'   => array(1 => 'SET', 2 => 'PAGE'),
    ),

    // события
    'events'        => array(
        'rule'          => '^/events/$',
        'template'      => '/events/',
        'module'        => 'events',
    ),
    'events_event'        => array(
        'rule'          => '^/events/([\w\-\d]+)/$',
        'template'      => '/events/#EVENT#/',
        'module'        => 'events',
        'rule_params'   => array(1 => 'EVENT'),
    ),
    'events_event_page'        => array(
        'rule'          => '^/events/([\w\-\d]+)/$',
        'template'      => '/events/#EVENT#/#PAGE#/',
        'module'        => 'events',
        'rule_params'   => array(1 => 'EVENT', 2 => 'PAGE'),
    ),

    // Авторизация v2.0
    'login' => array(
        'rule'  => '^/login/$',
        'template'  => '/login/',
        'module' => 'login',
    )
);