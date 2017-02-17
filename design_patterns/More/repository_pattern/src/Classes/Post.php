<?php

namespace Drupal\repository_pattern\Classes;
class Post
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**0
     * @var string
     */
    private $text;

    public static function fromState(array $state): Post
    {
        return new self(
            $state['id'],
            $state['title'],
            $state['text']
        );
    }

    /**
     * @param int|null $id
     * @param string $text
     * @param string $title
     */
    public function __construct($id, string $title, string $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function __toString(): string
    {
        $id = $this->getId();
        $title = $this->getTitle();
        $text = $this->getText();
        return "Id: {$id}. Title: {$title}. Text: $text";
    }
}
