<?php

namespace App\Http\Controllers\Entry;

use App\Entry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Entries\CreateEntryRequest;
use App\Http\Requests\Entries\DeleteEntryRequest;
use App\Http\Requests\Entries\GetAllEntriesRequest;
use App\Http\Requests\Entries\UpdateEntryRequest;
use App\Http\Response\StandardHttpResponse;
use App\Location;
use Exception;
use Illuminate\Http\JsonResponse;

class EntryController extends Controller
{
    /**
     * Get all entries of location
     *
     * @param GetAllEntriesRequest $request
     * @return JsonResponse
     */
    public function get(GetAllEntriesRequest $request)
    {
        $validatedData = $request->validated();

        $entries = Location::query()->find($validatedData['location_id'])->entries()->get();

        $entries->map(function ($value, $key) {
            $tags = $value->tags()->get();
            $value['tags'] = $tags->toArray();
        });

        return response()->json(StandardHttpResponse::json(true, 'ok', $entries->toArray()));
    }

    /**
     * Create an entry of location
     *
     * @param CreateEntryRequest $request
     * @return JsonResponse
     */
    public function create(CreateEntryRequest $request)
    {
        $validatedData = $request->validated();

        $entry = new Entry();
        $entry->title = $validatedData['title'];
        $entry->subtitle = $validatedData['subtitle'];

        $location = Location::query()->find($validatedData['id']);
        $location->entries()->save($entry);

        return response()->json(StandardHttpResponse::json(true, 'ok', $entry->toArray()));
    }

    /**
     * Update an entry
     *
     * @param UpdateEntryRequest $request
     * @return JsonResponse
     */
    public function update(UpdateEntryRequest $request)
    {
        $validatedData = $request->validated();

        $entry = Entry::query()->find($validatedData['entry_id']);
        $entry->title = $validatedData['title'];
        $entry->subtitle = $validatedData['subtitle'];
        $entry->save();

        return response()->json(StandardHttpResponse::json(true, 'ok', $entry->toArray()));
    }

    public function delete(DeleteEntryRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $result = Entry::query()->find($validatedData['entry_id'])->delete();
        } catch (Exception $e) {
            $result = false;
        }

        return response()->json(StandardHttpResponse::json($result, 'ok', null));
    }
}
