<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;

class BookListController extends Controller
{
    private $BookService;

    public function __construct(BookService $BookService)
    {
        $this->BookService = $BookService;
    }

    public function index()
    {
        // データ取得
        $list = $this->BookService->getList();

        /* ループ例
        foreach ($list->getIterator() as $d) {
            echo $d->getTitle();
        }
        */

        /* ビューへ投げたり
        return view('book_list', ['list' => $list]);
        */
    }
}