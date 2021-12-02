<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {    
        $clients = Client::latest()->get();
        return view('index', compact('clients'));
    }

    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $client = Client::create($input);

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $client->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return redirect()->route('client');
    }

    public function update(Request $request, Client $client, $collection)
    {

        if($request->hasFile($collection) && $request->file($collection)->isValid()){
            $client->clearMediaCollection($collection);
            $client->addMediaFromRequest($collection)->toMediaCollection($collection);
        }

        return back();
    }

    public function delete(Client $client, $collection)
    {
        $client->clearMediaCollection($collection);

        return back();
    }

}
