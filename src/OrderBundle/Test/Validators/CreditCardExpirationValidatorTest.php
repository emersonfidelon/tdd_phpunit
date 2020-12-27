<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardExpirationDate = new \DateTime($value);
        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);
        $isValid = $creditCardExpirationValidator->isValid();
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => ['value' => '2040-11-23', 'expectedResult' => true],
            'shouldNotBeValidWhenDateIsExpired' => ['value' => '2003-11-23', 'expectedResult' => false],
            'shouldNotBeValidWhenDateIsEmpty' => ['value' => '', 'expectedResult' => false],
        ];
    }
}