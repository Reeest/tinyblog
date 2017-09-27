<?php

/**
 * Типа  генератор вьюхи
 *
 * Class View
 */
class View
{
    function generate($template_view, $data = null)
    {
        include 'View/' . $template_view . '.php';
    }
}
