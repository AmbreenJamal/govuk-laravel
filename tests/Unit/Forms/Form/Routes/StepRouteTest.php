<?php

namespace AnthonyEdmonds\GovukLaravel\Tests\Unit\Forms\Form\Routes;

use AnthonyEdmonds\GovukLaravel\Tests\Forms\TestForm;
use AnthonyEdmonds\GovukLaravel\Tests\TestCase;

class StepRouteTest extends TestCase
{
    public function test(): void
    {
        $this->assertEquals(
            'breaches.report.step',
            TestForm::stepRoute('before-section')
        );
    }
}
