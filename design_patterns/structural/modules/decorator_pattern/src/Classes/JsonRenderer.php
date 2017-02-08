<?php

namespace Drupal\decorator_pattern\Classes;
class JsonRenderer extends RendererDecorator
{
    public function renderData(): string
    {
        return json_encode($this->wrapped->renderData());
    }
}
