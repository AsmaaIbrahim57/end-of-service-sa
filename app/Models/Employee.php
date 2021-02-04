<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','resignation_reason','gender','salary','work_years'];

    
    public function getStatusAttribute(){

        switch ($this->resignation_reason) {
            case null:
                return 'active';
                break;
            case 'other':
                return 'resigned';
            case 'contract':
                return 'contract ended';
            
            default:
                return 'resigned due to '.$this->resignation_reason;
                break;
        }
    }
}
