<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metadata;
class MetadataController extends Controller
{
    public function destroy(Metadata $metadata)
    {
        $metadata->delete();
        return redirect()->route('users.show', $metadata->user->id);
    }
}
