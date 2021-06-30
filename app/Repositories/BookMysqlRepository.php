<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Services\BookDataAccess;
use App\Models\Book AS BookModel;
use App\Entities\Book;
use App\Entities\BookList;

use Illuminate\Support\Facades\Log;

class BookMysqlRepository implements BookDataAccess
{
    protected $BookModel;
    protected $BookList;

    private $connection = 'mysql';

    public function __construct(BookModel $BookModel, BookList $BookList)
    {
        $this->BookModel = $BookModel;
        $this->BookList  = $BookList;
    }

    public function getList(): BookList
    {
        $data = $this->BookModel::on($this->connection)->with('author:id,name')->first();
        Log::info($data);
        Log::info($data->id);
        Log::info($data->name);
        // Log::info($data->author->name);
        // foreach ($data as $d) {

        //     $this->BookList->add(new Book($data->id, $data->name, $data->author->name));
        // }

        return $this->BookList;
    }
}