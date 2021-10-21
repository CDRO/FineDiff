<?php

namespace FineDiffTests\Granularity;

use FineDiffTests\BaseTestCase;
use cogpowered\FineDiff\Delimiters;
use cogpowered\FineDiff\Granularity\Sentence;

class SentenceTest extends BaseTestCase
{
    protected $delimiters = array(
        Delimiters::PARAGRAPH,
        Delimiters::SENTENCE,
    );

    public function setUp()
    {
        $this->character = new Sentence;
    }

    public function testExtendsAndImplements()
    {
        $this->assertTrue(is_a($this->character, 'cogpowered\FineDiff\Granularity\Granularity'));
        $this->assertTrue(is_a($this->character, 'cogpowered\FineDiff\Granularity\GranularityInterface'));
        $this->assertTrue(is_a($this->character, 'ArrayAccess'));
        $this->assertTrue(is_a($this->character, 'Countable'));
    }

    public function testGetDelimiters()
    {
        $this->assertEquals($this->character->getDelimiters(), $this->delimiters);
    }
}