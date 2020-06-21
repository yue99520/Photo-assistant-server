<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entries\GetAllEntriesRequest;

class EntryController extends Controller
{
    /**
     * Get all entries by location
     * @param GetAllEntriesRequest $request
     */
    public function all(GetAllEntriesRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();

        $entries = $validatedData['location']->entries()->get();


    }
}
