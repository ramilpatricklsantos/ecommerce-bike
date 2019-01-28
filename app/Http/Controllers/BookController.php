<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class BookController extends Controller
{

    public function __construct()
    {
        /*
            Add a middleware with the ff. arguments:
            'is.admin' and an associative array.

            The associative array should have a key called 'except' and the value is an array with the ff. elements:
            'index', 'show', 'borrow_form', 'borrow', 'return_form', and 'return'

            $this->middleware(?,?)
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /*
            if a $request has 's': 
                query Book where name like $request->s and get the result. Save it to the variable $books

                $books = Book::?(?)->?();

            else:

                query Book and fetch all. Save it to the variable called $books

                $books = Book::?();

            if authenticated user has type == 'user'
                get all books with 'status' of '1' and save it to the variable $books

                $books = $books->?('?', '?');

            show the results in the 'book_list' view
                
            return view('?', compact('books'));

        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*
            - fetch all categories with a 'status' of '1' from the Category model and save them to the variable $categories

            $categories = ?::?->where('?', '?');
        */
        
        /*
            - show the categories in the view called 'add_book'

            return view('?', compact('?'));
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        /*
            VALIDATING DATA
                -validate the $request. Pass an array with the ff. fields to validate: 
                    - isbn
                        - required, should be a string and has a min length of 10 characters

                    - name
                        - required, should be a string and has max length of 255 characters

                    - category
                        - required

                    - available
                        - required, should be a number with a minimum value of 0

                    - image
                        - required, should be of type 'image'

                - save the validated data in $validatedData

                $validatedData = $request->validate([?]);
        */

        /*
            SETTING THE IMAGE PATH FOR THE IMAGE FILE
                - use the 'file' method in $request and pass 'image' as an argument. Save it to the $file variable

                $file = ?;

                - use the image path '\images\books\\' and save it to $book_images_path

                $book_images_path = ?;

                - use the 'move' method of $file and pass the ff. arguments:
                    - a function public_path with $book_images_path as its argument
                    - $file using its method getClientOriginalName();

                $file->move(?, ?);

                - concatenate $files's client original name to the $book_images_path and save to the variable $image_path 

                $image_path = ?;
        */

        /*
            INSTANTIATING A BOOK
            - instantiate a Book and save it to $book

            $book = ?;

            - set the ff. $book properties equal to the properties of the $request
                - $book->isbn = ?;
                - $book->name = ?;
                - $book->category_id = ?;
                - $book->quantity = ?;
                - $book->available = ?;
                - $book->image_path = ?;
                - $book->description = ?;

            - use the save method of $book
                - $book->?();

            - redirect to '/books'
                - return ?(?);


        */
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        /*
            - return a view that shows the book details
                - return ?('?', ?('?'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        /*
            - fetch all categories from the Category model with a 'status' of '1' and save them in $categories variable
                - $categories = ?::?->where('?', '?');

            - return a view for editing books with currently active categories (category status = 1)
                - return ?('?', ?('?', '?'));  
        */

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        /*
            VALIDATING REQUEST DATA
            - validate the request with the ff. properties:
                - 'isbn'
                    - required, should be a string and has a min length of 10 characters

                - 'name'
                    - required, should be a string and has a max length of 255 characters

                - 'category'
                    - required

                - 'available'
                    - required, should be a number with a minimum value of 0
            - save the results in a variable named $validatedData
        */

        /*
            VALIDATING FILE
                - use the file method of $request with parameter 'image' and save it to a variable named $file
                    - $file = ?->?('?');

                - make a control statement: 
                    if $file is not equal to NULL:
                        - save '\images\books\\' to a variable named $book_images_path
                            - $book_images_path = ?;

                        - use the move method of $file and pass two arguments: 
                            - public_path function with parameter $book_images_path
                            - getClientOriginalName method of $file
                                - $file->?(?(?), ?->?());

                        - Concatenate the book images path with the file's client original name and save it to $image_path
                            -$image_path = ? . ?->?();

                        - set the image_path property of $book equal to $image_path
                            - $book->? = ?;
        */
        }

        /*
            SET PROPERTIES
            - set the properties of $book equal to $request properties
                $book->isbn = ?;
                $book->name = ?;
                $book->category_id = ?;
                $book->available = ?;
                $book->description = ?;
        */

        /*
            - use the save method of $book
                - $book->?();

            - redirect to '/books/' concatenated with book ID
                - return ?('?' . ?->?);
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        /*
            DISABLE INSTEAD OF DELETE

            - set the status property of $book equal to 0 if it's currently set to 1 and vice versa
                - $book->? = ?->? == ?;

            - use the save method of $book
                - $book->?();

            - redirect to '/books'
                - return ?(?);
        */
    }

    /* 
        Create a public function called borrow_form with parameter $id. Inside the body of the function:
            - Find $id in Book and save it in 
            - Fetch all Users and save it as $borrowers 
            - Find $id in book and use the method user_borrower, get the result and save it to $book_borrowers
            - Use diff method on $borrowers and pass $book_borrowers as an argument, then chain the method called all.
    */

    public function borrow_form($id)
    {
        /*
            - use the find method of the Book model with the passed $id as its parameter and save it as a variable named $book
                - $book = ?::?(?);
            
            - use the all method of the User model and save as variable $users
                - $users = ?::?();

            - create an associative array with the ff. 2 key-value pairs:
                -  'borrowed_date' => get the current time in GMT+8 format by using the now method of the Carbon model with a parameter of 'GMT+8'. Use the toDateString method afterwards.
                    - 'borrowed_date' => Carbon::?('?')->?(),

                - 'return_date' => add 3 days to current date by using the addDays method with a parameter of 3
                    - 'return_date' => Carbon::?('?')->?(?)->?()

            - save this associative array as a variable named $date

            - return the view 'books.borrow_form' and use the compact method to pass the variables $book, $users, and $date 
                - return ?('?', ?('?', '?', '?'));
    
        */

    }

    public function borrow(Request $request, $id)
    {

        /*
            - selectively query the Book model using the find method with the passed $id as its parameter. Save this as a variable named $book
                - $book = ?::?(?);

            VALIDATING REQUEST DATA
            - validate the request with the ff. properties:
                - 'borrower_name'
                    - required

                - 'quantity'
                    - required, should be a number with a min value of 1 and a max value equal to the quantity property of $book

            - save the results in a variable named $validatedData

            - get the current time in GMT+8 format by using the now method of the Carbon model with a parameter of 'GMT+8'. Use the toDateString method afterwards. Save this as a variable named $borrowed_date.
                - $borrowed_date = Carbon::?('?')->?();

            - use the requests() method of $book to attach the borrower_name and quantity properties of $request to the 'user_id' and 'quantity' columns of the pivot table

            - use the save method of $book
                - $book->?();

            - redirect to '/books'
                - return ?(?); 
        */
    }

    public function return(Request $request, $id)
    {
        /*
            - selectively query the Book model using the find method with the passed $id as its parameter. Save this as a variable named $book
                - $book = ?::?(?);

            - selectively query the 'user_book' pivot table for a single row using the first() method where the 'user_id' column matches the borrower_name property of $request and where the 'book_id' column matches the passed $id. Save this as a variable named $user_book.
                - $user_book = DB::table('')->?('?', ?->?)->?('?', ?)->?();

            VALIDATING REQUEST DATA
            - validate $request with the ff. properties:
                - 'borrower_name'
                    - required

                - 'quantity'
                    - required, should be a number with a min value of 1 and a max value equal to the quantity property of $user_book

            - save the results in a variable named $validatedData 
        
            - make a control structure using a ternary operator stating that if the authenticated user has its type property set to 'admin', get the borrower_name property of $request and save it as a variable named $borrower_name. Else, save the id property of the authenticated user as a variable named $borrower_name.  
                - $borrower_name = ?::?()->? == '?' ? ?->? : ?::?()->?;
        
            - get the current time in GMT+8 format by using the now method of the Carbon model with a parameter of 'GMT+8'. Use the toDateString method afterwards. Save this as a variable named $received_date.
                - $received_date = Carbon::?('?')->?();

            - save the available property of $book as an integer with a variable name of $available_book_count
                - $available_book_count = (?)?->?;

            - get the quantity property of $request and save it as a variable named $books_returned_count
                - $books_returned_count = ?->?;

            - save the sum of $available_book_count and $books_returned_count as a variable named $remaining_book_count
                - $remaining_book_count = ? + ?;

            - subtract $books_returned_count from the quantity property of $user_book. Save their difference as a variable named $borrowed_book_count
                - $borrowed_book_count = ?->? - ?;

            - selectively query the 'user_book' pivot table for a row where the 'user_id' column matches $borrower_name and where the 'book_id' column matches the passed $id. Update the 'quantity' column of this row with the value of $borrowed_book_count. Save this as a variable named $user_book. 
                - $user_book = ?::?('?')->?('?', ?)->?('?', ?)->?(['?' => ?]);

            - set the value of the available property of $book equal to $remaining_book_count
                $book->available = ?;

            - use the save method of $book
                - $book->?();

            - redirect to '/books'
                - return ?(?); 

        */

    }

    public function book_borrowers($book_id, $user_id)
    {
        /*
            - selectively query the Book model using the find method with the passed $book_id as its parameter. Save this as a variable named $book
                - $book = ?::?(?);

            - selectively query the user_borrower method of $book and return a single row where the 'user_id' column matches the passed $user_id using the first() method. Save this as a variable named $users
                - $users = ?->?()->?('?', ?)->?();

            - return $users;
        */
    }

   

    
}
