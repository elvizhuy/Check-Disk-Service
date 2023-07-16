<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiskPartition extends Model
{
    use HasFactory;
    protected $fillable = ['file_system','size','used','available','use_percentage','belongtoVirtualMachine'];

    public function virtualMachine () : BelongsTo
    {
        return $this->belongsTo('virtualmachines','belongtoVirtualMachine','id');
    }
}
