<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @test
    */
    public function hasBadWords()
    {
        $badWordsRepository = new BadWordsRepositoryStub();
        $badWordsValidator = new BadWordsValidator($badWordsRepository);
        $hasBadWords = $badWordsValidator->hasBadWords('Seu restaurante fede');
        $this->assertEquals(false, $hasBadWords);
    }
}