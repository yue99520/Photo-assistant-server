<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Locations\CreateLocationRequest;
use App\Http\Requests\Locations\DeleteLocationRequest;
use App\Http\Requests\Locations\UpdateLocationRequest;
use App\Location;

class LocationController extends Controller
{
    public function getAll()
    {
        $user = auth()->user();
        $collections = $user->locations()->get();
        $json = array();
        foreach ($collections as $location) {
            array_push($json, $location->toArray());
        }
        return response()->json($json);
    }

    public function getOne($id)
    {
        $user = auth()->user();
        $location = $user->locations()->find($id);
        $json = $location->toArray();
        return response()->json($json);
    }

    public function create(CreateLocationRequest $request)
    {
        $validatedData = $request->validated();
        $location = new Location();
        $location->fromArray($validatedData);
        auth()->user()->locations()->save($location);

        return response()->json([
            'success' => true,
            'message' => 'ok',
            'data' => $location->toArray(),
        ]);
    }

    public function update(UpdateLocationRequest $request)
    {
        $validatedData = $request->validated();
        $location = auth()->user()->locations()->find($validatedData['id']);

        if ($location != null) {

            $location->fromArray($validatedData);
            $location->save();
            return response()->json([
                'success' => true,
                'message' => 'ok',
                'data' => $location->toArray(),
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'location not found',
            'data' => [],
        ]);
    }

    public function delete(DeleteLocationRequest $request)
    {
        $validatedData = $request->validated();
        $location = auth()->user()->locations()->find($validatedData['id']);
        if ($location != null) {
            $location->delete();
            return response()->json([
                'success' => true,
                'message' => 'ok',
                'data' => [],
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'location not found',
            'data' => [],
        ]);
    }
}
