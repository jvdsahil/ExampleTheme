<?php

namespace ExampleTheme\Containers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
// use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;
use Plenty\Modules\Item\Variation\Contracts\VariationSearchRepositoryContract;



class ExampleThemeTopArticle
{
    public function call(Twig $twig, $arg):string
    {

        $itemRepository = pluginApp(VariationSearchRepositoryContract::class);

        $itemRepository->setFilters([
            'isMain' => 1,
            'isActive' => true,
            'storeSpecial' => 3
        ]);

        $itemRepository->setSearchParams([
            'with'  => [
                'images' => null,
                // 'ItemImages' => null,
                // 'itemImages' => null,
                'variationImages' => null,
                'variationImageList' => null,

                'item' => null,
                'itemTexts' => null,
                'variationSalesPrices' => null,
            ],
        ]);

        $resultItems = $itemRepository->search();

        // echo json_encode($itemRepository->getFilters());

        $templateData = array(
            'currentItems' => $resultItems->getResult()
        );

        return $twig->render('ExampleTheme::ExampleTheme.TopArticle', $templateData);
    }
}
