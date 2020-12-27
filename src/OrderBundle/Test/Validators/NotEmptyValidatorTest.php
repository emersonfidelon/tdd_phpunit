<?php

namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NotEmptyValidator;
use PHPUnit\Framework\TestCase;

class NotEmptyValidatorTest extends TestCase
{
    public function testShouldNotBeValidWhenValueIsEmpty()
    {
        $emptyValue = "";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);
        $this->assertFalse($notEmptyValidator->isValid());
    }

    public function testShouldBeValidWhenValueIsNotEmpty()
    {
        $emptyValue = "bla";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);
        $this->assertTrue($notEmptyValidator->isValid());
    }
}