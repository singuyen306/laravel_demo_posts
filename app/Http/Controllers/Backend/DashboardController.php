<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Post\PostInterface;

class DashboardController extends Controller
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
        $posts = $this->post->getAllPost();
        return view('backend.dashboard', compact('posts'));
    }

    public function approved(Request $request){
        $this->post->updateByMultiConditionsModel(
                        ['approved' => $request->approved],
                        ['id' => $request->post_id]
                    );
        return response()->json(['status' => true]);
    }
}
