<?php

namespace Setebit\Package\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Setebit\Package\Traits\TenantScope;

class Prizedraw extends Model
{
    use HasFactory;
    use TenantScope;

    protected $guarded = ['id'];
}
