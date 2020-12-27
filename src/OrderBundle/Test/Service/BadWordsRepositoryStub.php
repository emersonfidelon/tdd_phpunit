<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepositoryInterface;

class BadWordsRepositoryStub implements BadWordsRepositoryInterface
{
    public function findAllAsArray()
    {
        return [
            'merda',
            'bobo',
            'chulé',
            'besta'
        ];
    }
}