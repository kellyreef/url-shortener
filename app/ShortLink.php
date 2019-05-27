<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'shortlinks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clicks',
        'destination',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * Generates a random slug for the Short Link Resource.
     *
     * bit.ly uses a string length of 7 and results in 3.5 trillion+ combinations.
     *
     * @var Int $length The number of characters to generate.
     * @return String $slug A set amount of random characters to be used for a slug.
     */
    public static function generateRandomSlug(Int $length = 7) : String
    {
        /*
            Web safe characters. Laravel can easily validate it.
            It will mostly be human readable. There may need to be consideration to remove 0,O,l,I
            to remove confusion on characters depending on font. Adding 2 characters like - and _
            would make it easily convertible to base 64 if optimization becomes an issue.
        */
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $slug = '';
        // loop and select random characters until desired string length is reached.
        while (strlen($slug) < $length) {
            $max = strlen($characters);
            $slug .= $characters[random_int(0, $max - 1)]; // random_int is cryptographically secure
        }
        return $slug;
    }
}
