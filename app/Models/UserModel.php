<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'user'; 
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'firstName',
        'lastName',
        'mobileNumber',
        'email',
        'profile_image',
        'password',
    ];
}
