<?php

namespace AnthonyEdmonds\GovukLaravel\Tests\Unit\Questions\Question;

use AnthonyEdmonds\GovukLaravel\Questions\Question;
use AnthonyEdmonds\GovukLaravel\Tests\TestCase;
use ErrorException;

class ConstructTest extends TestCase
{
    protected Question $question;

    protected function setUp(): void
    {
        parent::setUp();

        $this->question = new Question('label', 'world', Question::CHECKBOXES);
    }

    public function testsThrowsExceptionWhenFormatInvalid(): void
    {
        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage("tuesday is not a valid GOV.UK Question type");

        $this->question = new Question('label', 'world', 'tuesday');

    }

    public function testSetsLabel(): void
    {
        $this->assertEquals('label', $this->question->label);
    }

    public function testSetsName(): void
    {
        $this->assertEquals('world', $this->question->name);
    }

    public function testSetsFormat(): void
    {
        $this->assertEquals(Question::CHECKBOXES, $this->question->getFormat());
    }

    public function testSetsIdWhenNull(): void
    {
        $this->assertEquals('world', $this->question->id);
    }

    public function testSetsIdWhenNotNull(): void
    {
        $this->question = new Question('label', 'world', Question::CHECKBOXES, 'hello');
        $this->assertEquals('hello', $this->question->id);
    }
}
