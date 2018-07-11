<?php

namespace ExampleTheme\Containers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;



class ExampleThemeGlobalAnalytics
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('ExampleTheme::ExampleTheme.GlobalAnalytics');

    }
}
