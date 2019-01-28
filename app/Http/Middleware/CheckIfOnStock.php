<?php

namespace App\Http\Middleware;

use Closure;
use App\Book;
use Session;

class CheckIfOnStock
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

        $book = Book::find($request->id);

        if($book->available == '0')
        {
            Session::flash('outOfStock', "$book->name is currently Out of Stock.");
            return redirect('/books');
        }

        return $next($request);
    }
}
