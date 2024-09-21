<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'signatures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'logo',
        'head1',
        'head2',
        'head3',
        'head4',
        'sign1',
        'sign2',
        'sign_op',
        'sigle',
        'phone',
        'Fax',
        'is_active',
        'effective_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'effective_date' => 'datetime',
    ];
    public static function getActiveSignature()
    {
        return self::where('is_active', true)->first();
    }

}
