<?php

namespace Drupal\facade_pattern\Classes;

class Facade
{
    /**
     * @var OsInterface
     */
    private $os;

    /**
     * @var BiosInterface
     */
    private $bios;

    /**
     * @param BiosInterface $bios
     * @param OsInterface   $os
     */
    public function __construct(BiosInterface $bios, OsInterface $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        $output[] = $this->bios->execute();
        $output[] = $this->bios->waitForKeyPress();
        $output[] = $this->bios->launch($this->os);
        return $output;
    }

    public function turnOff()
    {
        $output[] = $this->os->halt();
        $output[] = $this->bios->powerDown();
        return $output;
    }

    public function getName() {
        return $this->os->getName();
    }
}
