<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title','company','tags','location','website','email','description'];
    
    public function scopeFilter($query,array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','LIKE','%'.$filters['tag'].'%');
        }
        if($filters['search'] ?? false){
            $query->where('title','LIKE','%'.$filters['search'].'%')->orWhere('description','LIKE','%'.$filters['search'].'%')->orWhere('tags','LIKE','%'.$filters['search'].'%');
        }
    }

    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
//    public static function listing(){
//     return  [
//         [
//             'id' => 1,
//             'title'=> 'Software Developer',
//             'salary_range' => '30,000 - 35,000',
//             'location' => 'Guiguinto,Bulacan'
//         ],
//         [
//             'id' => 2,
//             'title'=> 'Software Engineer',
//             'salary_range' => '30,000 - 35,000',
//             'location' => 'Guiguinto,Bulacan'
//         ],
//         [
//             'id' => 3,
//             'title'=> 'Quality Assurance Tester',
//             'salary_range' => '20,000 - 25,000',
//             'location' => 'Guiguinto,Bulacan'
//         ]
//         ];
          
//    }
   
//    public static function find($id){
//     foreach (self::listing() as $value) {
//         if ($value['id'] == $id){
//             return $value;
//         }
//     }
//    }
}
