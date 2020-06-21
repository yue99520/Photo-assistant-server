<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location\CreateLocationRequest;
use App\Http\Requests\Location\DeleteLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Http\Response\StandardHttpResponse;
use App\Location;
use Exception;

class LocationController extends Controller
{
    public function get()
    {
        $locations = auth()->user()->locations()->get();

        return response()->json(StandardHttpResponse::json(true, 'ok', $locations->toArray()));
    }

    public function create(CreateLocationRequest $request)
    {
        $validatedData = $request->validated();

        $location = new Location();
        $location->longitude = $validatedData['longitude'];
        $location->latitude = $validatedData['latitude'];
        $location->title = $validatedData['title'];
        $location->subtitle = $validatedData['subtitle'];

        auth()->user()->locations()->save($location);

        return response()->json(StandardHttpResponse::json(true, 'ok', $location->toArray()));
    }

    public function update(UpdateLocationRequest $request)
    {
        $validatedData = $request->validated();

        $location = Location::query()->find($validatedData['location_id']);

        $location->longitude = $validatedData['longitude'];
        $location->latitude = $validatedData['latitude'];
        $location->title = $validatedData['title'];
        $location->subtitle = $validatedData['subtitle'];
        $location->save();

        return response()->json(StandardHttpResponse::json(true, 'ok', $location->toArray()));
    }

    public function delete(DeleteLocationRequest $request)
    {
        $validatedData = $request->validated();
        $location = Location::query()->find($validatedData['location_id']);

        try {
            $location->delete();

            return response()->json(StandardHttpResponse::json(true, 'ok', null));

        } catch (Exception $e) {
            return response()->json(StandardHttpResponse::json(false, 'fail', null));
        }
    }
}
