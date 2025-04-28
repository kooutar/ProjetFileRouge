<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //

    public function storeTags(Request $request, $coursId)
    {

        // Valider les tags
        $request->validate([
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ]);

        
        if ($request->has('tags')) {
            
            foreach ($request->tags as $tagName) {
            
                Tag::firstOrCreate([
                    'cours_id' => $coursId,
                    'tag' => $tagName
                ]);
            }
        }
    }
}
