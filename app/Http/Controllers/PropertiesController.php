<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Traits\HttpResponses;

class PropertiesController extends Controller
{

    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua properti beserta relasinya.
        $properties = Property::with('broker', 'characteristic')->get();

        // Mengembalikan properti sebagai resource.
        return PropertiesResource::collection($properties);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        // Validasi data yang dikirimkan oleh client.
        $validatedData = $request->validated();

        // Membuat properti baru.
        $property = Property::create([
            'broker_id' => $request->broker_id,
            'address' => $validatedData['address'],
            'listing_type' => $validatedData['listing_type'],
            'city' => $validatedData['city'],
            'zip_code' => $validatedData['zip_code'],
            'description' => $validatedData['description'],
            'build_year' => $validatedData['build_year'],
        ]);

        // Membuat karakteristik properti baru.
        $property->characteristic()->create([
            'property_id' => $property->id,
            'price' => $validatedData['price'],
            'bedrooms' => $validatedData['bedrooms'],
            'bathrooms' => $validatedData['bathrooms'],
            'sqft' => $validatedData['sqft'],
            'price_sqft' => $validatedData['price_sqft'],
            'property_type' => $validatedData['property_type'],
            'property_status' => $validatedData['property_status'],
        ]);

        // Mengembalikan response JSON.
        return new PropertiesResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        // Mengembalikan properti sebagai resource.
        return new PropertiesResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        // Validasi data yang dikirimkan oleh client.
        $validatedData = $request->validated();

        // Mengupdate properti.
        $property->update($validatedData);

        // Mengupdate karakteristik properti.
        $property->characteristic()->update($validatedData);

        // Mengembalikan response JSON.
        return new PropertiesResource($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        // Menghapus properti.
        $property->delete();

        // Mengembalikan response JSON.
        return $this->success('', 'Property deleted successfully');
    }
}
