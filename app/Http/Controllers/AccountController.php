<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Account::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accountform');
    }

    public function login(Request $request)
    {
        $acc = $account = Account::where('email', $request->email)
        ->orWhere('username', $request->email)
        ->first();

        if (!$acc) {
            return response()->json([
                'code' => 0,
                'message' => 'Account not exist'
            ],201);
        }

        if (!Hash::check($request->password, $acc->password)) {
            return response()->json([
                'code' => 0,
                'message' => 'Password not correct. Try again!'
            ], 201);
        }

        return response()->json([
            'code' => 1,
            'message' => 'Login success',
            'data' => $acc
        ], 201);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validator = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'avatar' => 'required|string|max:1000',
            'role' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);


        $acc = Account::where('email', $request->email)->first();

        if ($acc) {
            return response()->json([
                'code' => 0,
                'message' => 'Email exist on server. Try with new email!'
            ]);
        }

        
        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->avatar,
            'role' => $request->role,
            'status' => $request->status
        ]);

  
        return response()->json([
            'code' => 1,
            'message' => 'Create account success',
            'data' => $account
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $account = Account::findOrFail($key);
        if (!$account) {
            abort(404, 'Account not exist');
        }
        return view('accountform', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ], 404);
        }

        $validator = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'avatar' => 'required|string|max:1000',
            'role' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);
        
        $account->update($validator);
        return response()->json([
            'code' => 1,
            'message' => 'Update account success' ,
            'data' => $account
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account ,$id)
    {
        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ], 201);
        }

        $account->delete();
        return response()->json([
            'code' => 1,
            'message' => 'Deleted successfully'
        ]);
    }
}
