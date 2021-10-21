<?php

namespace cogpowered\FineDiff\Tests\Granularity;

use cogpowered\FineDiff\Delimiters;
use cogpowered\FineDiff\Granularity\Granularity;
use cogpowered\FineDiff\Granularity\GranularityInterface;
use cogpowered\FineDiff\Granularity\Paragraph;
use PHPUnit\Framework\TestCase;

class ParagraphTest extends TestCase
{
    protected $delimiters = array(
        Delimiters::PARAGRAPH,
    );

    public function setUp(): void
    {
        $this->character = new Paragraph;
    }

    public function testExtendsAndImplements()
    {
        $this->assertTrue(is_a($this->character, Granularity::class));
        $this->assertTrue(is_a($this->character, GranularityInterface::class));
        $this->assertTrue(is_a($this->character, \ArrayAccess::class));
        $this->assertTrue(is_a($this->character, \Countable::class));
    }

    public function testGetDelimiters()
    {
        $this->assertEquals($this->character->getDelimiters(), $this->delimiters);
    }
}