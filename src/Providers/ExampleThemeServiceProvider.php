<?php

namespace ExampleTheme\Providers;

use IO\Extensions\Functions\Partial;
use IO\Helper\CategoryKey;
use IO\Helper\CategoryMap;
use IO\Helper\TemplateContainer;
use IO\Services\ContentCaching\Services\Container;
use IO\Helper\ResourceContainer;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ConfigRepository;

class ExampleThemeServiceProvider extends ServiceProvider {
    public function register(){
    }

	public function boot(Twig $twig, Dispatcher $eventDispatcher){
		$eventDispatcher->listen('IO.Resources.Import', function (ResourceContainer $container){
			$container->addScriptTemplate('ExampleTheme::ExampleTheme.js');
			$container->addStyleTemplate('ExampleTheme::ExampleTheme.css');
		}, 0);

		// $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData){
		// 	$container->setTemplate('ExampleTheme::Homepage.Homepage');
		// 	return false;
		// }, 0);

		$eventDispatcher->listen('IO.init.templates', function(Partial $partial){
			// $partial->set('header', 'ExampleTheme::PageDesign.Partials.Header.Header');
			$partial->set('footer', 'ExampleTheme::PageDesign.Partials.Footer');
			return false;
		}, 0);
	}
}
