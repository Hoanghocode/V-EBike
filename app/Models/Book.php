<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'book_name', 'book_email', 'book_number','book_time','book_phone','book_notes','short_select','payment_select',
    ];
    protected $primaryKey = 'book_id';
 	protected $table = 'tbl_book';
}
