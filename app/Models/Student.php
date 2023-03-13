<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Student extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function grades(){
        return $this->hasMany(Grade::class);
    }

    public function scopeFilter(Builder $query, $filter ){
        if ($filter->name!=null){
            $query->where('name','like', "%$filter->name%");
        }
        if ($filter->year!=null){
            $query->where('year',$filter->year);
        }
    }

    public function scopeYear(Builder $query, $year){
        $query->where('year',$year);
    }
}
