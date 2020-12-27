<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider badWordsDataProvider
    */
    public function hasBadWords($badWordsList, $text, $foundBadWords)
    {
        $badWordsRepository = $this->createMock(BadWordsRepository::class);
        $badWordsRepository->method('findAllAsArray')->willReturn($badWordsList);
        $badWordsValidator = new BadWordsValidator($badWordsRepository);
        $hasBadWords = $badWordsValidator->hasBadWords($text);
        $this->assertEquals($foundBadWords, $hasBadWords);
    }

    public function badWordsDataProvider()
    {
        return [
            'shouldFindWhenHasBadWords' => [
                'badWordsList' => ['bobo','besta', 'fedido'],
                'text' => 'Seu sapato é muito fedido',
                'foundBadWords' => true,
            ],
            'shouldNotFindWhenNoHasBadWords' => [
                'badWordsList' => ['bobo','besta', 'fedido'],
                'text' => 'Seu sapato é bonito',
                'foundBadWords' => false,
            ],
            'shouldNotFindWhenTextIsEmpty' => [
                'badWordsList' => ['bobo','besta', 'fedido'],
                'text' => '',
                'foundBadWords' => false,
            ],
            'shouldNotFindWhenBadWordsListIsEmpty' => [
                'badWordsList' => [],
                'text' => 'Seu sapato é fedido',
                'foundBadWords' => false,
            ]
        ];
    }
}