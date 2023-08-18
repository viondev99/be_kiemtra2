<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $channels = Channel::all();
        return response()->json($channels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $validatedData = $request->validate([
            'ChannelName' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'SubscriberCount' => 'required|numeric',
            'URL' => 'required|string|max:255',
        ]);

        $channel = Channel::create($validatedData);

        return response()->json($channel, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $channel = Channel::find($id);
        return response()->json($channel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $channel = Channel::findOrFail($id);
        $channel->update($request->all());
        return response()->json($channel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $channel = Channel::find($id);
        $channel->delete();
        return response()->json(null, 204);
    }
}
