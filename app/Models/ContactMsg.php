<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMsg extends Model
{
    /**
     * @var string
     */
    protected $table = 'contact_mails';

    /**
     * @var array
     */
    protected $fillable = [
        'email_id',
        'name',
        'phone',
        'email',
        'subject',
        'message',
    ];
}
