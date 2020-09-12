<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Document;
use App\Post;
use App\Role;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasAnyRole(['administrator', 'manager'])){
            $posts = Post::all();
            $documents = Document::all();
            $users = User::all();
        }else{
            $posts = Auth::user()->posts;
            $documents = Auth::user()->documents;
            $users = Auth::user();
        }

        $activities_merged = array_merge($posts->toArray(), $documents->toArray());
        $activities_unsorted = [];
        foreach($activities_merged as $key => $value){
            if(isset($value['updated_at'])){
                $date = $value['updated_at'];
            }else{
                $date = $value['created_at'];
            }
            $activities_unsorted[$date] = $value;
        }

        krsort($activities_unsorted);

        // Format dates
        $activities = [];
        foreach($activities_unsorted as $key => $value){
            $date_unformatted = strtotime($key);
            $date = date("M j, Y, g:i a", $date_unformatted);
            $activities[$date] = $value;
        }

        $data = [
            'posts' => $posts,
            'documents' => $documents,
            'activities' => $activities,
            'users' => $users
        ];
        return view('dashboard.index')->with($data);
    }

    public function posts()
    {
        if(Auth::user()->hasAnyRole(['administrator', 'manager'])){
            $posts = Post::all();
        }else{
            $posts = Auth::user()->posts;
        }
        return view('dashboard.posts')->with('posts', $posts);
    }

    public function documents()
    {
        if(Auth::user()->hasAnyRole(['administrator', 'manager'])){
            $documents = Document::orderBy('created_at', 'desc')->get();
        }else{
            $documents = Auth::user()->documents;
        }
        return view('dashboard.documents')->with('documents', $documents);
    }

    public function users()
    {
        $users = User::all();
        return view('dashboard.users')->with('users', $users);
    }
}
