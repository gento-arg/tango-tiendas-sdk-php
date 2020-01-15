<?php

use PHPUnit\Framework\TestCase;
use TangoTiendas\Model\PagingResult;
use TangoTiendas\Model\Stock as DataModel;

class PagingResultTest extends TestCase
{
    /**
     * @dataProvider stockResultDataProvider
     */
    public function testStockData($data)
    {
        $pagingResult = new PagingResult();
        $pagingResult->loadData($data, DataModel::class);

        $this->assertEquals(1, $pagingResult->getPageNumber());
        $this->assertEquals(500, $pagingResult->getPageSize());
        $this->assertEquals(10, count($pagingResult->getData()));
        $this->assertTrue($pagingResult->isMoreData());

        $pagingResult->parseData(DataModel::class);
        $elements = $pagingResult->getData();

        $this->assertInstanceOf(DataModel::class, $elements[0]);
    }

    public function stockResultDataProvider()
    {
        return [
            [[
                "Paging" => [
                    "PageNumber" => 1,
                    "PageSize" => 500,
                    "MoreData" => true,
                ],
                "Data" => [
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100129",
                        "Quantity" => 244,
                        "EngagedQuantity" => 5.00,
                        "PendingQuantity" => 2.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "2",
                        "SKUCode" => "0100100129",
                        "Quantity" => 5,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 1.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "2",
                        "SKUCode" => "0100100134",
                        "Quantity" => 3,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100134",
                        "Quantity" => 115,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100135",
                        "Quantity" => 102,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "80",
                        "SKUCode" => "0100100136",
                        "Quantity" => 10,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100136",
                        "Quantity" => 95,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100150",
                        "Quantity" => 115,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100151",
                        "Quantity" => 100,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                    [
                        "StoreNumber" => 1,
                        "WarehouseCode" => "1",
                        "SKUCode" => "0100100152",
                        "Quantity" => 182,
                        "EngagedQuantity" => 0.00,
                        "PendingQuantity" => 0.00,
                    ],
                ],
            ]],
        ];
    }
}
