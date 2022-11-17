<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogRequest extends Model
{
    use HasFactory;

    public const CURRENTPAGE_RESTAURANT = 'projects/test-kmbe/locations/us-central1/agents/d2d144d2-4808-4d65-83be-97c59a187cd5/flows/00000000-0000-0000-0000-000000000000/pages/4efa4a4d-0ea8-4600-b62d-650abe03bb8e';

    protected $fillable = [
        'dialog_session_id',
        'detectIntentResponseId',
        'lastMatchedIntent',
        'intent_original_value',
        'intent_resolved_value',
        'currentPage',
        'session_rest_name',
        'text',
        'languageCode',
    ];
}
