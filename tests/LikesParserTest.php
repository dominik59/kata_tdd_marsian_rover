<?php

namespace Test;

use App\LikesParser;
use PHPUnit\Framework\TestCase;

class LikesParserTest extends TestCase
{
    public function testEmptyNamesArrayResultInNoOneLikesThisInformation()
    {
        //given
        $likesParser = new LikesParser();

        //when
        $likesInformation = $likesParser->likes([]);

        //then
        static::assertSame('no one likes this', $likesInformation);
    }

    /**
     * @dataProvider singleNameProvider
     */
    public function testOnePersonLikesReturnsProperMessage($inputName, $expectedMessage)
    {
        //given
        $likesParser = new LikesParser();

        //when
        $likesInformation = $likesParser->likes([$inputName]);

        //then
        static::assertSame($expectedMessage, $likesInformation);
    }

    public function singleNameProvider()
    {
        yield [
            'inputName' => 'Agusia',
            'expectedName' => 'Agusia likes this',
        ];
        yield [
            'inputName' => 'Dominik',
            'expectedName' => 'Dominik likes this',
        ];
        yield [
            'inputName' => 'Romuś',
            'expectedName' => 'Romuś likes this',
        ];
        yield [
            'inputName' => 'Zbysiu',
            'expectedName' => 'Zbysiu likes this',
        ];
        yield [
            'inputName' => 'Władziu',
            'expectedName' => 'Władziu likes this',
        ];
    }

    /**
     * @dataProvider twoNameProvider
     */
    public function testTwoPeopleLikesReturnsProperMessage($inputName, $expectedMessage)
    {
        //given
        $likesParser = new LikesParser();

        //when
        $likesInformation = $likesParser->likes($inputName);

        //then
        static::assertSame($expectedMessage, $likesInformation);
    }

    public function twoNameProvider()
    {
        yield [
            'inputNames' => ['Agusia', 'Dominiś'],
            'expectedName' => 'Agusia and Dominiś like this',
        ];
        yield [
            'inputNames' => ['A', 'B'],
            'expectedName' => 'A and B like this',
        ];
        yield [
            'inputNames' => ['B', 'A'],
            'expectedName' => 'B and A like this',
        ];
    }

    /**
     * @dataProvider moreThanThreeNamesProvider
     */
    public function testMoreThanThreePeopleLikesReturnsProperMessage($inputName, $expectedMessage)
    {
        //given
        $likesParser = new LikesParser();

        //when
        $likesInformation = $likesParser->likes($inputName);

        //then
        static::assertSame($expectedMessage, $likesInformation);
    }

    public function threeNamesProvider()
    {
        yield [
            'inputNames' => ['Agusia', 'Dominiś', 'Mireczek'],
            'expectedName' => 'Agusia, Dominiś and Mireczek like this',
        ];
        yield [
            'inputNames' => ['A', 'D', 'M'],
            'expectedName' => 'A, D and M like this',
        ];
    }

    /**
     * @dataProvider threeNamesProvider
     */
    public function testThreePeopleLikesReturnsProperMessage($inputName, $expectedMessage)
    {
        //given
        $likesParser = new LikesParser();

        //when
        $likesInformation = $likesParser->likes($inputName);

        //then
        static::assertSame($expectedMessage, $likesInformation);
    }

    public function moreThanThreeNamesProvider()
    {
        yield [
            'inputNames' => ['Agusia', 'Dominiś', 'Mireczek', 'Mateuszek'],
            'expectedName' => 'Agusia, Dominiś and 2 others like this',
        ];
    }
}
