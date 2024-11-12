<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();  
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'cover_image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',  
        ]);

        Book::create($request->all()); 

        return redirect()->route('admin.books.index')->with('success', 'تم إضافة الكتاب بنجاح');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all(); 
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'cover_image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', 
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all()); 

        return redirect()->route('admin.books.index')->with('success', 'تم تحديث الكتاب بنجاح');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'تم حذف الكتاب بنجاح');
    }

    public function details($id)
    {
        $book = Book::with('category')->findOrFail($id); 
        return view('book_details', compact('book'));
    }
    
        public function show($id)
        {
            $book = Book::findOrFail($id); // الحصول على الكتاب بناءً على ID
            return view('book_details', compact('book'));
        }
    
}
