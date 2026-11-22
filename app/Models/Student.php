<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Fields that can be mass-assigned via create() / update().
     * Anything not listed here is silently ignored (security).
     */
    protected $fillable = [
        'student_number',
        'name',
        'email',
    ];
}
?>