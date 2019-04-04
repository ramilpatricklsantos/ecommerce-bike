<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BookRequest;
use Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.admin', ["except" => ["books_borrowed"]]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'not_in:Administrator'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'type' => ['required', 'string', 'max:6'],
        ]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(Auth::user());    
        $users = User::all();
        return view('users.user_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return redirect('/register');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //public function edit($id)
    {
        //
        $user = \App\user::find($id);
        //return view('users.edit_user',compact('user','id'));
        return view('users.edit_user', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'type' => ['required', 'string', 'max:6'],
        ]);

        

        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = Hash::make($request->password);
        }
        $user->type = $request->type;

        $user->save();

        return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if($user->type == 'admin'){
            return abort(401);

        }else{
            $user -> type == '0';
        } 
            $user->save();
            return redirect('/users');

        /*
            DISABLE, DON'T DELETE
            - make a control structure that will abort if the name property of $user is 'Administrator'
                - if($user->? == '?'){
                    return abort(401);
                }

            - otherwise, set the status property of $user to 0
                - $user->? = '?';

            - use the save() method on $user
                - $user->?();

            - redirect to '/users'
                return ?('?');
        */
    }

    public function books_borrowed()
    {
        /*
            - get the id property of the authenticated user and save it as a variable named $id
                - $id = Auth::?()->?;

            - selectively query the User model using the find() method with $id as its argument. Save the result as a variable named $user
                - $user = ?::?(?);

            - use the table() method on the DB facade to do the ff: 
                - selectively query the 'book_requests' table for rows where the 'user_id' column matches $id 
                - join with 'books' table using its 'book_id' column as the column constraint. 
                - selectively query the joined tables to get all columns from 'book_requests', the 'name' column from 'books' as 'book_name', and the 'id' column from 'books' as 'book_id'
                - save the results in a variable named $book_requests

                    - $book_requests = DB::?('?')->where('?', ?)->join('?', '?', '=', '?')->select('?', '?', '?')->get();

            - use the books() method of $user to get all books associated with this user. Save the result as a variable named $books
                - $books = ?->?()->get();

            - return the 'users.books_borrowed' view, using the compact() method to pass the variables $book_requests and $books
                - return ?('?', compact('?', '?'));
        */
    }

    public function approve($id)
    {

        $user = user::find($id); 
        $user -> status = '1';
        $user -> save();
        return redirect('/users');
       
    }

}
