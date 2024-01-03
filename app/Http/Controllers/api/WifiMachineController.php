<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Machine;

/**
 * Wifi繼電器 控制器
 */
class WifiMachineController extends Controller
{

    protected static $_uniqueInstance = null;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (self::$_uniqueInstance == null) self::$_uniqueInstance = new self();
        return self::$_uniqueInstance;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $list = [
            "macAddr" => "123"
        ];

//        if (!isset($request->type)) {
        $list = Machine::orderBy('create_dtm', 'desc')->get();
//        $list = User::orderBy('pk', 'desc')->get();
//        }

        return response()->json($list, 200);
    }
}
