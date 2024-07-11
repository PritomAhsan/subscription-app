<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'website_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function sentPosts()
    {
        return $this->hasMany(SentPost::class);
    }
}
