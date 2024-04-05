<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticulosModel extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'meta_title',
        'meta_description',
        'title',
        'description',
        'image',
        'content',
        'schedule_date',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
