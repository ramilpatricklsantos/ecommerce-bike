<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\BookRequest;
use Auth;
use App\Book;
use App\User;

class CheckIfBookBorrowApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->id);
        $book_request = BookRequest::find($request->id);
        // $book_borrowed = DB::table('user_book')->;
        $book = Book::find($book_request->book_id);
        $user = User::find($book_request->user_id);
        if(Auth::user()->id != $book_request->user_id || Auth::user()->type == 'admin'){
            return redirect('/home');    
        }

        return $next($request);
    }
}
