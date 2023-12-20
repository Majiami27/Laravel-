<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = array();

        if (!isset($request->type)) {
            $list = Post::orderBy('establish_date', 'desc')->get();
        } else {
            $list = Post::orderBy('establish_date', 'desc')
                ->where('type', '=', $request->type)
                ->get();
        }

        if (isset($request->tag)) {
            $filteredList = [];
            foreach ($list as $postEntity) {
                foreach ($postEntity->tags as $tagName) {
                    if ($tagName == $request->tag) {
                        array_push($filteredList, $postEntity);
                        continue;
                    }
                }
            }
            $list = $filteredList;
        }

        return response()->json($list, 200);
    }
}
