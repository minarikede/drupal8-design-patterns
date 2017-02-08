<?php

namespace Drupal\adapter_pattern\Classes;
interface BookInterface
{
    public function turnPage();

    public function open();

    public function getPage(): int;
}
