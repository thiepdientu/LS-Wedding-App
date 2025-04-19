<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('responseform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'join' => 'required|string|max:255',
            'weddingId' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);


        $response = Response::create($validator);

        return response()->json([
            'code' => 1,
            'message' => 'send response success',
            'data' => $response
        ], 200);
    }

    public function getListResponse($key)
    {
        // Tìm thiệp cưới theo mail user
        $response = Response::where('weddingId', $key)->get();

        return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $response
        ], 200);
    }

    public function getListResponseForMail($key)
    {
       
        $response = Response::where('email', $key)->get();

        return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $response
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $response = Response::findOrFail($key);
        if (!$response) {
            abort(404, 'response not exist');
        }
        return view('responseform', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Response::find($id);
        if (!$response) {
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ], 404);
        }

        $validator = $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'join' => 'required|string|max:255',
            'weddingId' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);
        
        $response->update($validator);
        return response()->json([
            'code' => 1,
            'message' => 'Update response success' ,
            'data' => $response
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
