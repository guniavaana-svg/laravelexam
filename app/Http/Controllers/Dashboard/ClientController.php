<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Client\ClientStoreRequest;
use App\Http\Requests\Dashboard\Client\ClientUpdateRequest;
use App\Models\Client;
use App\Models\Image;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use mysql_xdevapi\Result;
use Throwable;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = Client::query();
        if($request->has('search') && !empty($request->search)){
            $clients->where('name', 'like', '%'.$request->search.'%');
        }
        $query= $clients->latest()->paginate(2)->appends(request()->query());

        return view('dashboard.clients.index',[
            'name'=>'clients',
            'clients'=>$query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
         return view('dashboard.clients.create');
    }


    /**
     * @throws Throwable
     */
    public function store(ClientStoreRequest $request){
        try {
            DB::beginTransaction();
            $client = new Client();
            $client->name=$request->name;
            $client->lastname=$request->lastname;
            $client->email=$request->email;
            $client->pass = Hash::make($request->pass);
            $client->save();
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $item) {
                $fileExt = $item->getClientOriginalExtension();
                $fileNewName = time() . rand(1, 9000) . '.' . $fileExt;

                $item->storeAs('images', $fileNewName, 'public');

                $image = new UserImage();
                $image->client_id = $client->id;
                $image->name = $fileNewName;
                $image->sort = $key + 1;
                $image->save();
    }
}
            DB::commit();
        } catch( Throwable $exception ){
            DB::rollBack();

            throw new \Exception($exception->getMessage());
        }
        return redirect()->route('dashboard.clients.index');
       
    }




    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('dashboard.clients.show',[
            'client'=>Client::query()->findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $client = Client::query()->findOrFail($id);
       
        return view('dashboard.clients.edit',[
            'client' => $client,
        ]);

    }

    /**
     * @throws Throwable
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, string $id)
{
    try {
        DB::beginTransaction();

        $client = Client::findOrFail($id);

        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->email = $request->email;

        if ($request->filled('pass')) {
            $client->pass = Hash::make($request->pass);
        }

        $client->save();

        DB::commit();

    } catch (Throwable $exception) {
        DB::rollBack();
        throw new \Exception($exception->getMessage());
    }

    return redirect()->route('dashboard.clients.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $client_id)
{
    Client::findOrFail($client_id)->delete();
    return redirect()->route('dashboard.clients.index');
}
}
