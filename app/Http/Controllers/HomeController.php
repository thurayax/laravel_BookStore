<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('books')->get();
        return view('home', compact('categories'));
    }
    public function showBook($id)
    {
        $book = Book::findOrFail($id);
        return view('book_details', compact('book'));
    }
}
