<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase
{

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);
        $isValid = $numericValidator->isValid();
        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueNotIsNumber' => ['value' => 30, 'expectedResult' => true],
            'shouldBeValidWhenValueIsNumericString' => ['value' => '20', 'expectedResult' => true],
            'shouldBeNotValidWhenValueIsNotANumber' => ['value' => 'bla', 'expectedResult' => false],
            'shouldBeNotValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false],
        ];
    }
}