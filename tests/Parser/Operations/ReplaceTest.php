<?php

namespace cogpowered\FineDiff\Tests\Parser\Operations;

use cogpowered\FineDiff\Parser\Operations\OperationInterface;
use cogpowered\FineDiff\Parser\Operations\Replace;
use PHPUnit\Framework\TestCase;

class ReplaceTest extends TestCase
{
    public function testImplementsOperationInterface()
    {
        $replace = new Replace('hello', 'world');
        $this->assertTrue(is_a($replace, OperationInterface::class));
    }

    public function testGetFromLen()
    {
        $replace = new Replace('hello', 'world');
        $this->assertEquals($replace->getFromLen(), 'hello');
    }

    public function testGetToLen()
    {
        $replace = new Replace('hello', 'world');
        $this->assertEquals($replace->getToLen(), 5);
    }

    public function testGetText()
    {
        $replace = new Replace('foo', 'bar');
        $this->assertEquals($replace->getText(), 'bar');
    }

    public function testGetOpcodeSingleTextChar()
    {
        $replace = new Replace(1, 'c');
        $this->assertEquals($replace->getOpcode(), 'di:c');

        $replace = new Replace('r', 'c');
        $this->assertEquals($replace->getOpcode(), 'dri:c');

        $replace = new Replace('rob', 'c');
        $this->assertEquals($replace->getOpcode(), 'drobi:c');
    }

    public function testGetOpcodeLongerTextString()
    {
        $replace = new Replace(1, 'crowe');
        $this->assertEquals($replace->getOpcode(), 'di5:crowe');

        $replace = new Replace('r', 'crowe');
        $this->assertEquals($replace->getOpcode(), 'dri5:crowe');

        $replace = new Replace('rob', 'crowe');
        $this->assertEquals($replace->getOpcode(), 'drobi5:crowe');
    }
}
