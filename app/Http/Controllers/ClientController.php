<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

// წერის კულტურა და სტილის დაცვა მნიშვნელოვანია, რომ კოდი ადვილად წასაკითხი და გასაგები იყოს
// ამიტომაც ვცდილობ შენიშვნებში ამაზე გავამახვილო ყურადღება.

class ClientController extends Controller
{
    // public function index()
    // {
    //     $clients = Client::with(['images'])->latest()->get();

    //         return view('front.pages.clients.index', [
    //             'name' => 'clients',
    //             'clients' => $clients,
    //               ]);
    // }
    // public function show(string $id)
    // {
    // $client = Client::with(['images'])->findOrFail($id);
    // return view('front.pages.clients.show', [
    //     'name' => $client->title,
    //     'client' => $client
    // ]);

    // }

    public function index()
    {
        // With images რატო? 
        // როცა image რეკლაცია გაქვს მოდელზე
        // ისედაც ერთი ფოტო გჭირდება მხოლოდ
        // $clients = Client::with(['images'])->latest()->get();
        $clients = Client::with(['image'])->latest()->get();

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
