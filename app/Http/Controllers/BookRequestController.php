<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookRequest;
use App\Book;
use DB;
use Carbon\Carbon;
use Session;

class BookRequestController extends Controller
{
    //

    public function __construct()
    {
        /*
            - call the middleware method from $this controller's constructor to only let admin accounts access the below methods except the method "return_form"
                - $this->middleware('?', ["except" => ["?"]]);  
        */
    }

    public function book_requests()
    {
        /*
            - use the table() method on the DB facade to do the ff: 
                - join the 'book_requests' table with the 'books' table using its 'book_id' column as the column constraint. 
                - join the 'book_requests' table with the 'users' table using its 'user_id' column as the column constraint. 
                - selectively query the joined tables to get all columns from 'book_requests', the 'name' column from 'users' as 'user_name', and the 'name' column from 'books' as 'book_name' where the 'status' column of the 'book_requests' table = 0
                - save the results in a variable named $book_requests

                    - $book_requests = DB::?('?')->join('?', '?', '=', '?')->join('?', '?', '=', '?')->where('?', '?')->select('?', '?', '?')->get();

            - use the table() method on the DB facade to do the ff:
                - join the 'user_book' table with the 'books' table using its 'book_id' column as the column constraint.
                - join the 'user_book' table with the 'users' table using its 'user_id' column as the column constraint.
                - selectively query the joined tables to get all columns from 'user_book', the 'name' column from 'users' as 'user_name', and the 'name' column from 'books' as 'book_name' where the 'quantity' column of the 'user_book' table > 0
                - save the results in a variable named $borrowers

                    - $borrowers = DB::?('?')->join('?', '?', '=', '?')->join('?', '?', '=', '?')->where('?', '?', '?')->select('?', '?', '?')->get();

            - return the 'users.request_list' view, using the compact() method to pass the $book_requests and $borrowers variables to it
                - return ?('?', ?('?', '?'));
        */  
    }

    public function approve($id)
    {
        /*
            - selectively query the BookRequest model using the find() method with the passed $id as its parameter. Save the result as a variable named $book_request.
                - $book_request = ?::?(?);

            - selectively query the Book model using the find() method with the book_id column of the book_request table as its argument. Save the result as a variable named $book.
                - $book = ?::?(?->?);

            - make a control structure that will:
                - flash an out of stock notification if the 'available' property of $book < the 'quantity' property of $book_request
                - redirect to '/book_requests'
                    - if(?->? < ?->?) {
                        Session::flash('?', '?');
                        return ?('?');
                    }

            - use the table() method on the DB facade to do the ff:
                - select all columns from the first row of 'user_book' table where:
                    - 'user_id' matches the user_id property of $book_request
                    - 'book_id' matches the book_id property of $book_request
                - save the result as a variable named $book_borrowed
                    - $book_borrowed = DB::table('?')->where('?', ?->?)->?('?', ?->?)->?('?')->first();

            - subtract the 'quantity' property of $book_request from the 'available' property of $book
            - save the difference as the new value of the 'available' property of $book
                - $book->available = ?->? - ?->?;

            - make a control structure that will do the ff if $book_borrowed is not NULL:
                - add the quantity property of $book_borrowed and the quantity property of $book_request
                - save the sum as a variable named $total_quantity;
                    - $total_quantity = ?->? + ?->?;
                
                - use the table() method on the DB facade to do the ff:
                    - selectively query the 'user_book' table for a row where:
                        - 'user_id' column matches the user_id property of $book_request
                        - 'book_id' column matches the book_id property of $book_request
                    - update the 'quantity' column to be equal to $total_quantity and the 'updated_at' column to be equal to the current time in GMT+8 format converted to a date time string using the toDateTimeString() method

            - else:
                - use the table() method on the DB facade to do the ff:
                    - insert a new entry in the 'user_book' table with the ff key-value pairs:
                        - 'user_id' => the user_id property of $book_request
                        - 'book_id' => the book_id property of $book_request
                        - 'quantity' => the quantity propert of $book_request
                        - 'created_at' => use the now() method of Carbon with an argument of 'GTM+8', converted to date time string
                        - 'updated_at' => use the now() method of Carbon with an argument of 'GTM+8', converted to date time string

                - if(? != NULL){
                    $total_quantity = ?->? + ?->?;
                    DB::table('?')->where('?', ?->?)->where('?', ?->?)->update(['?' => ?, '?' => Carbon::now('?')->?()]);
                } else {
                    DB::table('?')->insert(['?' => ?->?, '?' => ?->?, '?' => ?->?, '?' => Carbon::now('?')->?(), '?' => Carbon::now('?')->?()]);
                }

            - set the status property of $book_request to be equal to 1
                - $book_request->? = '?';

            - use the save() method on $book_request
                - $book_request->?;

            - use the save() method on $book
                - $book->?;

            - redirect to '/book_requests'
                return ?('?');
        */
    }

    public function decline($id)
    {
        /*
            - selectively query the BookRequest model using the find() method with the passed $id as its parameter. Save the result as a variable named $book_request
                - $book_request = ?::?(?);

            - set the status property of $book_request to be equal to 2
                - $book_request->? = '?';

            - use the save() method on $book_request
                - $book_request->?();

            - redirect to '/book_requests'
                - return ?('?');
        */
    }

    public function return_form($id)
    {
        /*
            - selectively query the Book model using the find() method with the passed $id as its parameter. Save the result as a variable named $book
                - $book = ?::?(?);

            - use the table() method on the DB facade to do the ff:
                - join the 'user_book' table with the 'users' table using its 'user_id' column as the column constraint.
                - selectively query the joined tables to get all rows where:
                    - the 'book_id' column matches the passed $id
                    - the 'quantity' column > 0
                - save the results in a variable named $users

                    - $users = DB::?('?')->join('?', '?', '=', '?')->where('?', ?)->where('?', '>', 0)->get();

            - create an associative array with the ff key-value pairs:
                - 'borrowed_date' => use the now() method of Carbon with an argument of 'GTM+8', converted to date time string
                - 'return_date' => use the now() method of Carbon with an argument of 'GTM+8', add 3 days, convert to date time string
            - save as a variable named $date

                - $date = array('?' => Carbon::now('?')->toDateString(), 'return_date' => Carbon::?('?')->addDays(?)->?());

            - return the 'books.return_form' view, use the compact() function to pass the variables $book, $users, and $date

                return ?('?', compact('?', '?', '?'));

        */
    }
}
