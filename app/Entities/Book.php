<?php
declare(strict_types=1);

namespace App\Entities;

class Book
{
    protected $id;
    protected $title;
    protected $author;

    public function __construct(int $id, string $name, string $author)
    {
        $this->id     = $id;
        $this->title  = $name;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}