<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessory::with('accessory_type')->OrderBy('id', 'ASC')->paginate(10);
        return [
            'pagination' => [
                'total' => $accessories->total(),
                'current_page' => $accessories->currentPage(),
                'per_page' => $accessories->perPage(),
                'last_page' => $accessories->lastPage(),
                'from' => $accessories->firstItem(),
                'to' => $accessories->lastPage(),
            ],
            'accessories' => $accessories
        ];
    }

    public function list()
    {
        return Accessory::with('accessory_type')->orderBy('id', 'ASC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessory = new Accessory();
        $accessory->accessory_type_id = $request->accessory["accessory_type_id"];
        $accessory->accessory_name = $request->accessory["accessory_name"];
        $accessory->save();
        return $accessory;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accessory = Accessory::find($id);
        if ($accessory) {
            $accessory->accessory_type_id = $request->accessory["accessory_type_id"];
            $accessory->accessory_name = $request->accessory["accessory_name"];
            $accessory->save();

            return $accessory;
        }
        return "Accesorio no encontrado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessory = Accessory::find($id);
        if ($accessory) {
            $accessory->delete();
            return "Accesorio eliminado";
        }
        return "Accesorio no encontrado";
    }
}
