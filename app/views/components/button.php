<?php

function button($text, $color = 'indigo', $additionalClasses = '')
{
    $classes = 'bg-primary ' . $color . 'shadow shadow-md   text-white btn rounded-lg ' . $additionalClasses;

    $html = '<button class="' . $classes . '">' . $text . '</button>';

    echo $html;
}

