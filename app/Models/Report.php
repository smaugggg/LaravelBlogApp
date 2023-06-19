<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    use HasFactory;

    /*
        Name of user reported
        ID
        Body
        Options
            Abuse
            Misinformation
            Spam
            Inappropriate Username
     */
}
