<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\Product as DataModel;
use TangoTiendas\Model\ProductComment;
use TangoTiendas\Model\ProductComposition;

class ProductTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDataModel($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        $this->assertEquals($data['SKUCode'], $dataModel->getSKUCode());
        $this->assertEquals($data['Description'], $dataModel->getDescription());
        $this->assertEquals($data['AdditionalDescription'], $dataModel->getAdditionalDescription());
        $this->assertEquals($data['AlternativeCode'], $dataModel->getAlternativeCode());
        $this->assertEquals($data['BarCode'], $dataModel->getBarCode());
        $this->assertEquals($data['Commission'], $dataModel->getCommission());
        $this->assertEquals($data['Discount'], $dataModel->getDiscount());
        $this->assertEquals($data['MeasureUnitCode'], $dataModel->getMeasureUnitCode());
        $this->assertEquals($data['MaximumStock'], $dataModel->getMaximumStock());
        $this->assertEquals($data['MinimumStock'], $dataModel->getMinimumStock());
        $this->assertEquals($data['RestockPoint'], $dataModel->getRestockPoint());
        $this->assertEquals($data['Observations'], $dataModel->getObservations());
        $this->assertEquals($data['Kit'], $dataModel->isKit());

        $validDate = $data['KitValidityDateSince'];
        if ($validDate !== null) {
            $validDate = new \DateTime($data['KitValidityDateSince']);
        }
        $this->assertEquals($validDate, $dataModel->getKitValidityDateSince());

        $validDate = $data['KitValidityDateUntil'];
        if ($validDate !== null) {
            $validDate = new \DateTime($data['KitValidityDateUntil']);
        }
        $this->assertEquals($validDate, $dataModel->getKitValidityDateUntil());
        $this->assertEquals($data['UseScale'], $dataModel->getUseScale());
        $this->assertEquals($data['Scale1'], $dataModel->getScale1());
        $this->assertEquals($data['Scale2'], $dataModel->getScale2());
        $this->assertEquals($data['BaseArticle'], $dataModel->getBaseArticle());
        $this->assertEquals($data['ScaleValue1'], $dataModel->getScaleValue1());
        $this->assertEquals($data['ScaleValue2'], $dataModel->getScaleValue2());
        $this->assertEquals($data['DescriptionScale1'], $dataModel->getDescriptionScale1());
        $this->assertEquals($data['DescriptionScale2'], $dataModel->getDescriptionScale2());
        $this->assertEquals($data['DescriptionValueScale1'], $dataModel->getDescriptionValueScale1());
        $this->assertEquals($data['DescriptionValueScale2'], $dataModel->getDescriptionValueScale2());
        $this->assertEquals($data['Disabled'], $dataModel->isDisabled());
        $this->assertEquals(count($data['ProductComposition']), count($dataModel->getProductComposition()));
        $this->assertEquals(count($data['ProductComments']), count($dataModel->getProductComments()));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testProductCompositions($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        /** @var ProductComposition[] */
        $compositions = $data['ProductComposition'];
        $dataComps = $dataModel->getProductComposition();

        if (count($compositions) == 0) {
            $this->assertTrue(true);
        }

        foreach ($compositions as $ind => $composition) {
            $this->assertEquals($composition['ComponentSKUCode'], $dataComps[$ind]->getComponentSKUCode());
            $this->assertEquals($composition['Quantity'], $dataComps[$ind]->getQuantity());
        }
    }

    /**
     * @dataProvider dataProvider
     */
    public function testProductComments($data)
    {
        $dataModel = new DataModel();
        $dataModel->loadData($data);

        /** @var ProductComment[] */
        $comments = $data['ProductComments'];
        $dataComms = $dataModel->getProductComments();

        if (count($comments) == 0) {
            $this->assertTrue(true);
        }

        foreach ($comments as $ind => $comment) {
            $this->assertEquals($comment['Line'], $dataComms[$ind]->getLine());
            $this->assertEquals($comment['Text'], $dataComms[$ind]->getText());
        }
    }

    public function dataProvider()
    {
        return [
            'ART_EXPORTAC' => [[
                "SKUCode" => "ART_EXPORTAC.",
                "Description" => "ARTICULO DE EXPORTACION",
                "AdditionalDescription" => "DESC. ADICIONAL A.E.",
                "AlternativeCode" => "",
                "BarCode" => "",
                "Commission" => 6,
                "Discount" => 0,
                "MeasureUnitCode" => "UNI",
                "MaximumStock" => 1000,
                "MinimumStock" => 100,
                "RestockPoint" => 300,
                "Observations" => "",
                "Kit" => false,
                "KitValidityDateSince" => null,
                "KitValidityDateUntil" => null,
                "UseScale" => "N",
                "Scale1" => "",
                "Scale2" => "",
                "BaseArticle" => "",
                "ScaleValue1" => "",
                "ScaleValue2" => "",
                "DescriptionScale1" => "",
                "DescriptionScale2" => "",
                "DescriptionValueScale1" => "",
                "DescriptionValueScale2" => "",
                "Disabled" => false,
                "ProductComposition" => [],
                "ProductComments" => [],
            ]],
            'ART_TIENDA' => [[
                "SKUCode" => "ART_TIENDA",
                "Description" => "",
                "AdditionalDescription" => "",
                "AlternativeCode" => "",
                "BarCode" => "",
                "Commission" => 6,
                "Discount" => 0,
                "MeasureUnitCode" => "UNI",
                "MaximumStock" => 150,
                "MinimumStock" => 10,
                "RestockPoint" => 18,
                "Observations" => "SIN OBSERVACIONES
         ",
                "Kit" => false,
                "KitValidityDateSince" => null,
                "KitValidityDateUntil" => null,
                "UseScale" => "N",
                "Scale1" => "",
                "Scale2" => "",
                "BaseArticle" => "",
                "ScaleValue1" => "",
                "ScaleValue2" => "",
                "DescriptionScale1" => "",
                "DescriptionScale2" => "",
                "DescriptionValueScale1" => "",
                "DescriptionValueScale2" => "",
                "Disabled" => false,
                "ProductComposition" => [],
                "ProductComments" => [
                    [
                        "Line" => 1,
                        "Text" => "Potencia RSM : 800 W
         Cantidad de canales: 5.1
         Control remoto: Si
         Formatos: MP3
         Radio
         Salida de audio y video.
         ",
                    ],
                ],
            ]],
            'ART01' => [[
                "SKUCode" => "ART01",
                "Description" => "ART01",
                "AdditionalDescription" => "",
                "AlternativeCode" => "",
                "BarCode" => "",
                "Commission" => 6,
                "Discount" => 0,
                "MeasureUnitCode" => "UNI",
                "MaximumStock" => 0,
                "MinimumStock" => 0,
                "RestockPoint" => 0,
                "Observations" => "OBSERVACIONES",
                "Kit" => false,
                "KitValidityDateSince" => null,
                "KitValidityDateUntil" => null,
                "UseScale" => "N",
                "Scale1" => "",
                "Scale2" => "",
                "BaseArticle" => "",
                "ScaleValue1" => "",
                "ScaleValue2" => "",
                "DescriptionScale1" => "",
                "DescriptionScale2" => "",
                "DescriptionValueScale1" => "",
                "DescriptionValueScale2" => "",
                "Disabled" => false,
                "ProductComposition" => [],
                "ProductComments" => [
                    [
                        "Line" => 1,
                        "Text" => "COMENTARIO",
                    ],
                ],
            ]],
            'KIT100' => [[
                "SKUCode" => "KIT100",
                "Description" => "KIT AUDIO COMPLETO",
                "AdditionalDescription" => "",
                "AlternativeCode" => "",
                "BarCode" => "",
                "Commission" => 6,
                "Discount" => 0,
                "MeasureUnitCode" => "UNI",
                "MaximumStock" => 0,
                "MinimumStock" => 0,
                "RestockPoint" => 0,
                "Observations" => "",
                "Kit" => true,
                "KitValidityDateSince" => null,
                "KitValidityDateUntil" => null,
                "UseScale" => "N",
                "Scale1" => "",
                "Scale2" => "",
                "BaseArticle" => "",
                "ScaleValue1" => "",
                "ScaleValue2" => "",
                "DescriptionScale1" => "",
                "DescriptionScale2" => "",
                "DescriptionValueScale1" => "",
                "DescriptionValueScale2" => "",
                "Disabled" => false,
                "ProductComposition" => [
                    [
                        "ComponentSKUCode" => "0100100150",
                        "Quantity" => 1,
                    ],
                    [
                        "ComponentSKUCode" => "0100100151",
                        "Quantity" => 2,
                    ],
                ],
                "ProductComments" => [],
            ]],
            'KIT999' => [[
                "SKUCode" => "KIT999",
                "Description" => "KIT999",
                "AdditionalDescription" => "NUEVO KIT 999",
                "AlternativeCode" => "SIN999",
                "BarCode" => "1222453364",
                "Commission" => 6,
                "Discount" => 0,
                "MeasureUnitCode" => "UNI",
                "MaximumStock" => 0,
                "MinimumStock" => 0,
                "RestockPoint" => 0,
                "Observations" => "OBSERVACIONES",
                "Kit" => true,
                "KitValidityDateSince" => "2019-02-01T00:00:00",
                "KitValidityDateUntil" => null,
                "UseScale" => "N",
                "Scale1" => "",
                "Scale2" => "",
                "BaseArticle" => "",
                "ScaleValue1" => "",
                "ScaleValue2" => "",
                "DescriptionScale1" => "",
                "DescriptionScale2" => "",
                "DescriptionValueScale1" => "",
                "DescriptionValueScale2" => "",
                "Disabled" => false,
                "ProductComposition" => [
                    [
                        "ComponentSKUCode" => "0100100150",
                        "Quantity" => 2,
                    ],
                    [
                        "ComponentSKUCode" => "0100100151",
                        "Quantity" => 2,
                    ],
                ],
                "ProductComments" => [
                    [
                        "Line" => 1,
                        "Text" => "COMENTARIO PARA LA IMPRESION",
                    ],
                ],
            ]],
            '010030001BLA' => [[
                "SKUCode" => "010030001BLA",
                "Description" => "VENT.DE TECHO MADERA 3 PALAS",
                "AdditionalDescription" => "MADERA PINT.BLAN.",
                "AlternativeCode" => "",
                "BarCode" => "",
                "Commission" => 0,
                "Discount" => 0,
                "MeasureUnitCode" => "C/U",
                "MaximumStock" => 32,
                "MinimumStock" => 4,
                "RestockPoint" => 6,
                "Observations" => "",
                "Kit" => false,
                "KitValidityDateSince" => null,
                "KitValidityDateUntil" => "2019-02-01T00:00:00",
                "UseScale" => "S",
                "Scale1" => "TI",
                "Scale2" => "CO",
                "BaseArticle" => "010030",
                "ScaleValue1" => "001",
                "ScaleValue2" => "BLA",
                "DescriptionScale1" => "TIPO DE VENTILADORES",
                "DescriptionScale2" => "COLORES",
                "DescriptionValueScale1" => "MADERA",
                "DescriptionValueScale2" => "BLANCO",
                "Disabled" => false,
                "ProductComposition" => [],
                "ProductComments" => [],
            ]],
        ];
    }

}
