<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []); // جلب محتوى السلة من الجلسة

        // حساب الإجمالي
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('cart', compact('cart', 'total')); // تمرير البيانات إلى العرض
    }


    // إضافة كتاب إلى السلة
    public function addToCart(Request $request, $id)
    {
        $book = Book::findOrFail($id); // البحث عن الكتاب بناءً على ID
        $cart = session()->get('cart', []); // جلب السلة من الجلسة

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++; // إذا كان الكتاب موجودًا، يتم زيادة الكمية
        } else {
            $cart[$id] = [
                "title" => $book->title,
                "quantity" => 1,
                "price" => $book->price,
                "cover_image" => $book->cover_image
            ];
        }

        session()->put('cart', $cart); // حفظ السلة في الجلسة
        return redirect()->route('cart.index')->with('success', 'تمت إضافة الكتاب إلى السلة');
    }


    // تحديث كمية الكتاب في السلة
    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart); // تحديث السلة في الجلسة
            return redirect()->back()->with('success', 'تم تحديث الكمية بنجاح');
        }

        return redirect()->back()->with('error', 'الكتاب غير موجود في السلة');
    }

    // حذف كتاب من السلة
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // تحديث السلة في الجلسة
            return redirect()->back()->with('success', 'تم حذف الكتاب من السلة');
        }

        return redirect()->back()->with('error', 'الكتاب غير موجود في السلة');
    }

    // إفراغ السلة بالكامل
    public function clearCart()
    {
        session()->forget('cart'); // حذف السلة من الجلسة
        return redirect()->back()->with('success', 'تم إفراغ السلة بنجاح');
    }
}
