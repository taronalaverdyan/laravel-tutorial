<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;
use App\image;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [ 'posts' => \App\Post::paginate(10) ]);
    }

    public function profile()
    {
      $image = image::where('user_id', Auth::user()->id)->first();
      return view('profile', compact('image'));
    }

    public function changeprofile(Request $request)
    {
      $validate = $request->validate([
        'newname' => 'required',
        'newemail' => 'required'
      ]);
      $user = Auth::user();
      $user->name = $request->newname;
      $user->email = $request->newemail;


      $user->save();
      $changed = 'Changed';

      return  view('profile', compact('changed'));
    }

    public function myposts()
    {
      $id = Auth::user()->id;
      $posts = Post::where('user_id', $id)->get();

      return view('myposts', compact('posts'));
    }

    public function thispost($id)
    {
        $post = Post::find($id);

        return view('seethispost', compact('post'));
    }

    public function editpostpage($id)
    {
      $post = Post::find($id);
      return view('editmypost', compact('post'));
    }

    public function editpost($id, Request $request)
    {
      $validator = $request->validate([
        'newpost' => 'required'
      ]);
      $post = Post::find($id);
      $post->description = $request->newpost;

      $post->save();
      $changed = 'Changed';

      return view('editmypost', compact('changed', 'post'));
    }

    public function uploadimage(Request $request)
    {
      // dd($request->all());
      $image = $request->avatar;
      $image->move('uploads', $image->getClientOriginalName());
      image::create([
        'image_src' => $image->getClientOriginalName(),
        'user_id' => Auth::user()->id
      ]);
      return redirect()->back();


    }

}
