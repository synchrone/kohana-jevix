<?php
return array(
    'default' => function(Jevix $jevix){
        // 1. Устанавливаем разрешённые теги. (Все не разрешенные теги считаются запрещенными.)
        $jevix->cfgAllowTags(array('a', 'img', 'i', 'b', 'u', 'em', 'strong', 'nobr', 'li', 'ol', 'ul', 'sup', 'abbr', 'pre', 'acronym', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'adabracut', 'br', 'code'));
        // 2. Устанавливаем коротие теги. (не имеющие закрывающего тега)
        $jevix->cfgSetTagShort(array('br','img'));
        // 3. Устанавливаем преформатированные теги. (в них все будет заменятся на HTML сущности)
        $jevix->cfgSetTagPreformatted(array('pre'));
        // 4. Устанавливаем теги, которые необходимо вырезать из текста вместе с контентом.
        $jevix->cfgSetTagCutWithContent(array('script', 'object', 'iframe', 'style'));
        // 5. Устанавливаем разрешённые параметры тегов. Также можно устанавливать допустимые значения этих параметров.
        $jevix->cfgAllowTagParams('a', array('title', 'href'));
        $jevix->cfgAllowTagParams('img', array('src', 'alt' => '#text', 'title', 'align' => array('right', 'left', 'center'), 'width' => '#int', 'height' => '#int', 'hspace' => '#int', 'vspace' => '#int'));
        // 6. Устанавливаем параметры тегов являющиеся обязяательными. Без них вырезает тег оставляя содержимое.
        $jevix->cfgSetTagParamsRequired('img', 'src');
        $jevix->cfgSetTagParamsRequired('a', 'href');
        // 7. Устанавливаем теги которые может содержать тег контейнер
        //    cfgSetTagChilds($tag, $childs, $isContainerOnly, $isChildOnly)
        //       $isContainerOnly : тег является только контейнером для других тегов и не может содержать текст (по умолчанию false)
        //       $isChildOnly : вложенные теги не могут присутствовать нигде кроме указанного тега (по умолчанию false)
        $jevix->cfgSetTagChilds('ul', 'li', true, true);
        // 8. Устанавливаем атрибуты тегов, которые будут добавлятся автоматически
        $jevix->cfgSetTagParamsAutoAdd('a', array('rel' => 'nofollow'));
        $jevix->cfgSetTagParamsAutoAdd('img', array('width' => '300', 'height' => '300'));
        // 9. Устанавливаем автозамену
        $jevix->cfgSetAutoReplace(array('+/-', '(c)', '(r)'), array('±', '©', '®'));
        // 10. Включаем или выключаем режим XHTML. (по умолчанию включен)
        $jevix->cfgSetXHTMLMode(true);
        // 11. Включаем или выключаем режим замены переноса строк на тег <br/>. (по умолчанию включен)
        $jevix->cfgSetAutoBrMode(true);
        // 12. Включаем или выключаем режим автоматического определения ссылок. (по умолчанию включен)
        $jevix->cfgSetAutoLinkMode(true);
        // 13. Отключаем типографирование в определенном теге
        $jevix->cfgSetTagNoTypography('code');

        return $jevix;
    }
);