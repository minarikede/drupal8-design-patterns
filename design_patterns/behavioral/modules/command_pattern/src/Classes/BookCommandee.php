<?php
namespace Drupal\command_pattern\Classes;

class BookCommandee {
  private $author;
  private $title;
  function __construct($title_in, $author_in) {
    $this->setAuthor($author_in);
    $this->setTitle($title_in);
  }
  function getAuthor() {
    return $this->author;
  }
  function setAuthor($author_in) {
    $this->author = $author_in;
  }
  function getTitle() {
    return $this->title;
  }
  function setTitle($title_in) {
    $this->title = $title_in;
  }
  function setStarsOn() {
    $this->setAuthor(Str_replace(' ','*',$this->getAuthor()));
    $this->setTitle(Str_replace(' ','*',$this->getTitle()));
  }
  function setStarsOff() {
    $this->setAuthor(Str_replace('*',' ',$this->getAuthor()));
    $this->setTitle(Str_replace('*',' ',$this->getTitle()));
  }
  function getAuthorAndTitle() {
    return $this->getTitle().' by '.$this->getAuthor();
  }
}