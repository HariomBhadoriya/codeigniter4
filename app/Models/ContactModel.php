<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table            = 'contact';        
    protected $primaryKey       = 'id';              
    protected $allowedFields    = [                  
        'name',
         'subject',
          'mobile', 
          'email', 
          'message',
           'submitted_at'
    ];
}
