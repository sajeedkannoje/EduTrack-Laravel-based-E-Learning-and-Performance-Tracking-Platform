<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    // /**
    //  * Get the section that owns the SectionContent
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function section()
    // {
    //     return $this->belongsTo(Section::class);
    // }
}
