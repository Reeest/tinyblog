<?php

/**
 * Контроллер от которого будем наследоваться
 *
 * Class Controller
 */
class Controller
{

    public $view;

    function __construct()
    {
        $this->view = new View();
    }

}
