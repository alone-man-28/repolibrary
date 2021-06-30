<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\BookDataAccess::class, function($app) {
            // MySQL リポジトリを使用する場合はこちら
            //return new \App\Repositories\BookMysqlRepository(new \App\Models\Book, new \App\Entities\BookList);
            // SQLite リポジトリを使用する場合はこちら
            return new \App\Repositories\BookSqliteRepository(new \App\Models\Book, new \App\Entities\BookList);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}