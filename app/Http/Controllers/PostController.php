<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Services;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Services::create(
            [
                'service_name' => 'Certificate of indigency',
            ]
        );
        Services::create(
            [
                'service_name' => 'Barangay Permit',
            ]
        );
        Services::create(
            [
                'service_name' => 'Barangay Certificate',
            ]
        );
        return view('admin.post.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data =  [
                'title' => $request->input('title'),
                'thumbnail' => $request->input('thumbnail'),
                'type' => $request->input('type'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
            ];
            if (strval($request->input('status')) == "1") {
                $data['date_posted'] = now();
            };
            Post::create(
                $data
            );
            return json_encode([
                'status' => 200,
            ]);
        } catch (Exception $ex) {
            return json_encode([
                'status' => 500,
                'error' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Post::findOrFail($id);
        return view('admin.post.edit_post', [
            'data' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $post = Post::find($request->input('id'));
            $post->title = $request->input('title');
            $post->type = $request->input('type');
            $post->thumbnail = $request->input('thumbnail');
            $post->content = $request->input('content');
            $post->status = $request->input('status');
            $post->save();
            return json_encode([
                'status' => 200,
            ]);
        } catch (Exception $ex) {
            return json_encode([
                'status' => 500,
                'error' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}