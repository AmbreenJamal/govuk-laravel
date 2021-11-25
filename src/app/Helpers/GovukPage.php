<?php

namespace AnthonyEdmonds\GovukLaravel\Helpers;

use AnthonyEdmonds\GovukLaravel\Pages\Page;
use Illuminate\Contracts\View\View;

class GovukPage
{
    public static function confirm(
        string $title,
        string $contentBlade,
        string $buttonLabel,
        string $actionRoute,
        string $backRoute,
        string $method = 'post',
        string $buttonType = Page::NORMAL_BUTTON,
        string $caption = null
    ): View
    {
        return Page::create($title)
            ->setAction($actionRoute)
            ->setBack($backRoute)
            ->setButtonLabel($buttonLabel)
            ->setButtonType($buttonType)
            ->setCaption($caption)
            ->setContent($contentBlade)
            ->setMethod($method)
            ->setTemplate('confirm')
            ->toView();
    }

    public static function custom(
        string $title,
        string $contentBlade,
        array $breadcrumbs,
        string $caption = null
    ): View
    {
        return Page::create($title)
            ->setBreadcrumbs($breadcrumbs)
            ->setCaption($caption)
            ->setContent($contentBlade)
            ->setTemplate('custom')
            ->toView();
    }
    
    public static function error(string $title, string $contentBlade): View
    {
        return Page::create($title)
            ->setBack(back()->getTargetUrl())
            ->setContent($contentBlade)
            ->setTemplate('error')
            ->toView();
    }
    
    public static function question(): View
    {
        // TODO
    }

    public static function start(): View
    {
        // TODO
    }

    public static function summary(): View
    {
        // TODO
    }

    public static function tasklist(): View
    {
        // TODO
    }
}
