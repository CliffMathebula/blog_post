<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Redirect;

class BlogActionController extends Controller
{
    /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
    public function rules()
    {
        return [
          'title' => 'required|min:20|max:100',
          'description' => 'required|min:50|max:140'
        ];
    }

    public function index(Request $request)
    {
        $this->showAll();
        $posts = [];

        $posts = json_decode($this->all_blogs, true);
        
        return view('welcome')->with('posts', $posts);

    }

    public function showCreate(Request $request)
    {
        $this->show();

        $posts = [];


        $posts = json_decode($this->blogs, true);

        /*$posts =[];
        foreach ($object as $post) {
            $posts[] = $post;
        } */
        
        return view('create_blog')->with('posts', $posts);

    }

    /**
     * Store a new blog.
     *
     * @param  Request  $request
     * @return Response
     */
    public function addBlog(Request $request)
    {
        $this->rules();

        if (Blog::create([
          'user_id' => Auth::user()->id,
          'title' => $request->input('title'),
          'description' => $request->input('blog_name'),
          'blog_name' => $request->input('name'),
          'blog_content' => $request->input('content'),
        ])) {
            echo "Blog Successfully Added";
        }
    }

    public function showAll()
    {
        $this->all_blogs = DB::table('blogs')->get();
    }

    public function show()
    {
        $user = Auth::user()->id;

        $this->blogs = DB::table('blogs')->where('user_id', '=', $user)->get();
    }
}
