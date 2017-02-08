<?php

namespace Drupal\specification_pattern\Classes;

interface SpecificationInterface
{
    public function isSatisfiedBy(Item $item): bool;
}
