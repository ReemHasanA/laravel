<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title','messege','user_id','priority_id','statuses_id','employee_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function statuses(){
        return $this->belongsTo(Status::class);
    }
    public function priority(){
        return $this->belongsTo(Priorty::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
