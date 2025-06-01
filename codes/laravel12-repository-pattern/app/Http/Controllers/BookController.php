<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BookRepositoryInterface;

class BookController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function index()
    {
        $books = $this->bookRepo->getAllBooks();
        return view('books.index', compact('books'));
    }
}
