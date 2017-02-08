<?php
namespace Drupal\command_pattern\Classes;
class BookStarsOnCommand extends BookCommand {
  function execute() {
    $this->bookCommandee->setStarsOn();
  }
}