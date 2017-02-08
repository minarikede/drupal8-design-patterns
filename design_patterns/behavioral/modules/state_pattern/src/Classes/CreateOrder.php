<?php

namespace Drupal\state_pattern\Classes;
use Drupal\status_pattern\Exception\BadOrderStatusException;
use Symfony\Component\Config\Definition\Exception\Exception;

class CreateOrder implements Order
{
    /**
     * @var array
     */
    private $details;

    /**
     * @param array $details
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function shipOrder()
    {
        $this->details['status'] = 'shipping';
        $this->details['updatedTime'] = time();
    }

    public function completeOrder()
    {
        if ($this->getStatus() === 'created') {
            throw new Exception('Can not complete the order which status is created');
        }
        else {
            $this->details['status'] = 'completed';
            $this->details['updatedTime'] = time();
        }
    }

    public function getStatus(): string
    {
        return $this->details['status'];
    }
}
