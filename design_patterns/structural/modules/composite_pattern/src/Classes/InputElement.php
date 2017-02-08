<?php

namespace Drupal\composite_pattern\Classes;
class InputElement implements RenderableInterface
{
    public function render(): string
    {
        return '<input type="text" />';
    }
}
