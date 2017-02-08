<?php
namespace Drupal\command_pattern\Classes;
class BookStarsOffCommand extends BookCommand {
  function execute() {
    $this->bookCommandee->setStarsOff();
  }
}