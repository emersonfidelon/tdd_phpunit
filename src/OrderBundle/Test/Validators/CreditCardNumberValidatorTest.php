<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardNumberValidator = new CreditCardNumberValidator($value);
        $isValid = $creditCardNumberValidator->isValid();
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsACreditCard' => ['value' => 5409002896719301, 'expectedResult' => true],
            'shouldBeValidWhenValueIsACreditCardAsString' => ['value' => '5409002896719301', 'expectedResult' => true],
            'shouldNotBeValidWhenValueIsNotACreditCard' => ['value' => '5409002', 'expectedResult' => false],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false],
        ];
    }
}