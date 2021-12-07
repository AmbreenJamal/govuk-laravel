<?php

namespace AnthonyEdmonds\GovukLaravel\Tests\Unit\Rules\MaxWords;

use AnthonyEdmonds\GovukLaravel\Rules\MaxWords;
use AnthonyEdmonds\GovukLaravel\Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Testing\TestView;

class PassesTest extends TestCase
{
    protected MaxWords $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rule = new MaxWords(3);
    }

    public function testTrueWhenAtLimit(): void
    {
        $this->assertTrue(
            $this->rule->passes('name', 'These three words')
        );
    }

    public function testTrueWhenBelowLimit(): void
    {
        $this->assertTrue(
            $this->rule->passes('name', 'Two cool')
        );
    }

    public function testFalseWhenAboveLimit(): void
    {
        $this->assertFalse(
            $this->rule->passes('name', 'Four is too many')
        );
    }
}
