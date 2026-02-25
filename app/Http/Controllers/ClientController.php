<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['images'])->latest()->get();

            return view('front.pages.clients.index', [
                'name' => 'clients',
                'clients' => $clients,
                  ]);
    }
    public function show(string $id)
    {
    $client = Client::with(['images'])->findOrFail($id);
    return view('front.pages.clients.show', [
        'name' => $client->title,
        'client' => $client
    ]);

    }
}
