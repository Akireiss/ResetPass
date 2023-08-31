<?php

function input($name, $label, $value = '', $type = 'text', $placeholder = '', $additionalClasses = '')
{
    $classes = 'form-control ' . $additionalClasses;
    $id = 'input_' . $name;

    $html = '<div class="form-group">';
    $html .= '<label for="' . $id . '">' . $label . '</label>';
    $html .= '<input type="' . $type . '" name="' . $name . '" id="' . $id . '" value="' . $value . '" class="' . $classes . '" placeholder="' . $placeholder . '">';
    $html .= '</div>';

    echo $html;
}

?>
