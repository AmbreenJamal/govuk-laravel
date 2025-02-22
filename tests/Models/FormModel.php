<?php

namespace AnthonyEdmonds\GovukLaravel\Tests\Models;

use AnthonyEdmonds\GovukLaravel\Tests\Database\Factories\FormModelFactory;
use AnthonyEdmonds\GovukLaravel\Tests\Forms\TestForm;
use AnthonyEdmonds\GovukLaravel\Traits\HasForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasForm;
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public static function formClass(): string
    {
        return TestForm::class;
    }

    protected static function newFactory(): FormModelFactory
    {
        return new FormModelFactory();
    }
}
