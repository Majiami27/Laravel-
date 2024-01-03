<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (!isset($request->type)) {
        $list = User::orderBy('pk', 'desc')->get();
        // }

        return response()->json($list, 200);
    }

    /**
     * 建立新帳號
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = [
            "email" => $request->email,
            "user_id" => $request->userId,
            "password" => $request->pwd,
        ];

        $list = User::create($data);

        return response()->json("RS_TEST", 200);
    }
}
