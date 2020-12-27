<?php

namespace OrderBundle\Entity\Customer;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    /**
     * @test
     * @dataProvider customerAllowedDataProvider
    */
    public function isAllowedToOrder($isActive, $isBlocked, $expectedResult)
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Emerson Santana',
            '+5573988334455'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expectedResult, $isAllowed);
    }

    public function customerAllowedDataProvider()
    {
        return [
            'shouldBeAllowedWhenIsActiveAndNotBlocked' => [
                'isActive' => true,
                'isBlocked' => false,
                'expectedResult' => true
            ],
            'shouldNotBeAllowedWhenIsActiveButIsBlocked' => [
                'isActive' => true,
                'isBlocked' => true,
                'expectedResult' => false
            ],
            'shouldNotBeAllowedWhenNotIsActiveButNotIsBlocked' => [
                'isActive' => false,
                'isBlocked' => false,
                'expectedResult' => false
            ],
            'shouldNotBeAllowedWhenNotIsActiveAndIsBlocked' => [
                'isActive' => false,
                'isBlocked' => true,
                'expectedResult' => false
            ]
        ];
    }
}