<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 2:30 PM
 */
use PHPUnit\Framework\TestCase;
class RandomGeneratorTest extends TestCase
{
    public function testRandomNumber() {
        $random = \Random\RandomGenerator::getInstance();
        $randomInt = $random->randomInt(0, 30);
        $this->assertEquals(true, ($randomInt >= 0 && $randomInt <= 30));
    }

    public function testRandomSequence() {
        $length = 30;
        $random = \Random\RandomGenerator::getInstance();
        $randomSequence = $random->randomSequence($length);
        $this->assertEquals(true, strlen($randomSequence) === $length);
        $this->assertEquals(true, ctype_alnum($randomSequence));
    }
}