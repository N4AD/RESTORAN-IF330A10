<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'logo', 'story_title', 'story_description', 'why_choose_us', 'address', 'primary_phone', 'secondary_phone', 'email', 'facebook', 'twitter', 'instagram', 'delivery_fee'
    ];
}
