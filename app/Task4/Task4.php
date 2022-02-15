<?php

function task4(): string
{
    $str = 'http://www.site.com/example/my_code.html?param_1=5&param_2=20&param_3=10&param_4=30';

    $root = stristr($str, '/example', true);
    $url = stristr(str_replace($root, '', $str), '?', true);
    $url = urlencode($url);
    $params = stristr($str, 'param');

    $paramsArray = explode('&', $params);
    $index = 0;
    foreach ($paramsArray as $element)
    {
        if (str_contains($element, '10'))
        {
            unset($paramsArray[$index]);
        }
        $index++;
    }

    $params = implode('&',array_reverse($paramsArray));

    return $root.'/?'.$params.'&url='.$url;
}
