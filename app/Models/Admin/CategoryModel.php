<?php

namespace App\Models\Admin;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table          = "table-category";
    protected $primaryKey     = 'category_id';
    protected $allowedFields  = [
        'category_name',
    ];
    protected $useTimestamps  = false;
}