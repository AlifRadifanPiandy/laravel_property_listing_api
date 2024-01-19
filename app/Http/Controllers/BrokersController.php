<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Requests\UpdateBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use App\Traits\HttpResponses;

class BrokersController extends Controller
{

    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data broker dari database.
        $brokers = Broker::all();

        // Mengembalikan data broker sebagai resource.
        return BrokersResource::collection($brokers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        // Mengambil data yang telah divalidasi dari request.
        $validatedData = $request->validated();

        // Menyimpan data broker baru ke database.
        $broker = Broker::create($validatedData);

        // Mengembalikan data broker sebagai resource.
        return new BrokersResource($broker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        // Mengembalikan data broker sebagai resource.
        return new BrokersResource($broker);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrokerRequest $request, Broker $broker)
    {
        // Mengambil data yang telah divalidasi dari request.
        $validatedData = $request->validated();

        // Mengupdate data broker di database.
        $broker->update($validatedData);

        // Mengembalikan data broker sebagai resource.
        return new BrokersResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        // Menghapus data broker dari database.
        $broker->delete();

        return $this->success('', 'Broker deleted successfully');
    }
}
