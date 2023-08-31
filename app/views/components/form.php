<?php

function cardWithForm($title, $formContent, $additionalClasses = '', $additionalStyles = '')
{
    $html = '<div class="card ' . $additionalClasses . '" style="' . $additionalStyles . '">';
    $html .= '<div class="card-body">';
    $html .= '<h5 class="card-title">' . $title . '</h5>';
    $html .= $formContent;
    $html .= '</div>';
    $html .= '</div>';

    echo $html;
}

?>
