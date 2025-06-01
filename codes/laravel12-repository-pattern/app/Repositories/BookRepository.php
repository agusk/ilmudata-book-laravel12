<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    {
        return DB::table('books')->orderBy('year', 'desc')->get();
    }
}