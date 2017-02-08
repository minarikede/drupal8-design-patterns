<?php
namespace Drupal\abstract_factory\Classes;

abstract class Text
{
    /**
     * @var string
     */
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }
}
