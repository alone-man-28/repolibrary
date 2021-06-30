<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Services\BookDataAccess;
use App\Models\Book AS BookModel;
use App\Entities\Book;
use App\Entities\BookList;

abstract class BookRepository
{
    protected $BookModel;
    protected $BookList;

    private $connection;

    public function __construct(BookModel $BookModel, BookList $BookList)
    {
        $this->BookModel = $BookModel;
        $this->BookList  = $BookList;
    }

    public function getList(): BookList
    {
        $data = $this->BookModel::on($this->connection)->with('author:id,name')->get();

        foreach ($data as $d) {
            $this->BookList->add(new Book($d->id, $d->name, $d->author->name));
        }

        return $this->BookList;
    }
}