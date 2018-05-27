<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Repository\Post\PostInterface;
use App\Http\Requests\PostsRequest;

class PostsController extends Controller
{
    private $post;

    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all post pagination
        $posts = $this->post->getAllPostPagination();

        return view('frontend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $data = [
            'user_id' => \Auth::id(),
            'title' => $request->title,
            'body'  => $request->body,
            'cover' => Helper::getImage('cover', 'upload', $request)
        ];

        $this->post->create($data);

        return redirect()->route('frontend_home')->with('message', POST_CREATE_SUCCESS)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->getPostDetail($id);

        $listView = view("frontend.posts.detail", compact('post'))->render();

        return response()->json(['list_view' => $listView]);
    }

    public function hasExistPost(Request $request){
        $post = $this->post->countByMultiConditionsModel(['title' => $request->title]);
        if ($post){
            return response()->json(['status' => true, 'message' => sprintf(FIELD_UNIQUE, 'Title')]);
        }
        return response()->json(['status' => false, 'message' => '']);
    }

}
