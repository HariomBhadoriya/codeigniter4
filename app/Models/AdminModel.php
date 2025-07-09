<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'email', 'mobile', 'subscriber', 'password', 'status','created_by'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_date';
    protected $updatedField     = 'updated_date';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $beforeInsert     = ['hashPassword'];
    protected $beforeUpdate     = ['hashPassword'];

    protected function hashPassword(array $data): array
    {
        if (!empty($data['data']['password']) && !password_get_info($data['data']['password'])['algo']) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function validateUser(string $email, string $password): bool|array
    {
        $admin = $this->where('email', $email)
                      ->where('status', 'active')
                      ->first();

        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }

        return false;
    }
}