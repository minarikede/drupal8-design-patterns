<?php

namespace Drupal\state_pattern\Classes;
interface Order
{
    /**
     * @return mixed
     */
    public function shipOrder();

    /**
     * @return mixed
     */
    public function completeOrder();

    public function getStatus(): string;
}
