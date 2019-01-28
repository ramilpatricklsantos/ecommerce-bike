<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Book extends Model
{
    //
    use SoftDeletes;

    /*
        add protected properties:
            - $guarded (Array)
            - $dates (Array)
                - add one element called 
                'deleted_at'
    */

    

    /*
        Create a public method called users
            -return $this and use its ff. methods:
                ->belongsToMany
                ->withPivot
                ->withTimestamps
    */

    

    /*
        Create a public method called requests
            -return $this and use its ff. methods: 
                ->belongsToMany
                ->withPivot
                ->withTimestamps
    */
    

    /*
        Create a public method called user_borrower
            - return $this and use the ff. methods:
                ->users
                ->wherePivot
    */

    

    /*
        Create a public method called category
            - return $this and use the ff. method:
                ->belongsTo
    */
    
}
