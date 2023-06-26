<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\NewsfeedsImagesModel;
use App\Models\NewsfeedsModel;
use App\Models\Notification;
use Illuminate\Http\Request;
use  App\Models\Post;
use App\Models\Request_list;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = Post::where([
            ['status', '1'],
            ['type', '1'],
        ])->orderBy('date_posted')->get();

        return view('users.index', [
            'latest_news' => $latest_news
        ]);
    }

    public function getPost(Request $request)
    {
        return json_encode(NewsfeedsModel::limit($request->input('count'))
            ->orderByDesc('created_at')
            ->get());
    }
    public function getPostImages(Request $request)
    {
        return json_encode(NewsfeedsImagesModel::where('newsfeed_id', "=", $request->input('newsfeed_id'))
            ->get());
    }

    public function create(Request $request)
    {
        $request = Request_list::create(
            [
                'owner_id' => Auth::user()->id,
                'service_id' => $request->input('request'),
                'purpose' => $request->input('purpose'),
                'status' => 0
            ]
        );
        $data = [
            'from_id' =>  Auth::user()->id,
            'to_id' => '996223fc-c140-43ba-81e4-888930d431aa',
            'seen' => 0,
            'redirect_link' => "/users/myrequest/",
        ];

        $data['content'] = Auth::user()->name . " Make a request.";

        $notification = Notification::create(
            $data,
        );
        $notification->redirect_link = "/admin/request/" . $request->id . "/" . $notification->id;
        $notification->save();

        return redirect()->route('users.home');
    }

    
}
