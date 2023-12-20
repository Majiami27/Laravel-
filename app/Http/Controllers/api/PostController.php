<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
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

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $post = Post::create($request->all());

    //     return response()->json($post, 201);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Post::find($id), 200);
    }

    public function showType($id)
    {
        $type = "";
        switch ($id) {
            case "1":
                $type = "微積分";
                break;
            case "2":
                $type = "院週會";;
                break;
            case "3":
                $type = "競賽活動";;
                break;
            case "4":
                $type = "教育訓練";;
                break;
            case "5":
                $type = "演講座談";;
                break;
        }
        //$a = response()->json(Post::where('tags', 'like', '%' . $type . '%')->get(), 200);
        return response()->json(Post::where('tags', 'like', '%' . $type . '%')->orderBy('establish_date', 'desc')->get(), 200);
        //return response()->json(Post::find($id), 200);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $post = Post::findOrFail($id);
    //     $post->update($request->all());

    //     return response()->json($post, 200);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     Post::find($id)->delete();

    //     return response()->json(null, 204);
    // }
}
