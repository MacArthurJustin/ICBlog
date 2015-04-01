<?php namespace App\Http\Controllers;

use Auth;
use App\BlogPost;
use App\BlogComment;
use App\Http\Requests\CreateBlogCommentRequest;
use App\Http\Requests\CreateBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use Carbon\Carbon;
use Redirect;
use Request;

class BlogController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the blog posts to user.
	 *
	 * @return Response
	 */
	public function index() {
		$posts = BlogPost::latest('posted_at')->published()->get();
		
		return view('index', compact('posts'));
	}

	/**
	 * Show the Post creation screen to authorized users.
	 *
	 * @return Response
	 */
	public function create() {
		if(Auth::check()) {			
			return view('create');
		} else {
			return Redirect::to('auth/login');
		}
	}

	/**
	 * Show the Post creation screen to authorized users.
	 *
	 * @param Integer $id The Post to edit
	 *
	 * @return Response
	 */
	public function edit($id) {
		if(Auth::check()) {
			$post = BlogPost::find($id);
			
			return view('edit', compact('post'));
		} else {
			return Redirect::to('auth/login');
		}
	}

	/**
	 * Save Created Post to Database
	 *
	 * @return Response
	 */
	public function storePost(CreateBlogPostRequest $request) {
		if(Auth::check()) {
			$request["user_id"] = Auth::user()->id;
			
			$post = BlogPost::create($request->all());
			$post->save();
			
			return Redirect::to("post/{$post->id}");
		} else {
			return Redirect::to('auth/login');
		}
	}

	/**
	 * Save Created Comment to Database
	 *
	 * @return Response
	 */
	public function storeComment(CreateBlogCommentRequest $request, $id) {
		if(Auth::check()) {
			$request["post_id"] = $id;
			$request["user_id"] = Auth::user()->id;
			
			$comment = BlogComment::create($request->all());
			$comment->save();
			
			return Redirect::to("post/{$id}");
		} else {
			return Redirect::to('auth/login');
		}
	}

	/**
	 * Show a single BlogPost referenced by ID
	 *
	 * @param Integer $id The ID of the post to show 
	 *
	 * @return Response
	 */
	public function show($id) {
		$post = BlogPost::find($id);
		
		return view('post', compact('post'));
	}

	/**
	 * Update Edited Post in Database
	 *
	 * @param Integer $id The ID of the post to save 
	 *
	 * @return Response
	 */
	public function updatePost(UpdateBlogPostRequest $request, $id) {
		
		if(Auth::check()) {			
			$comment = BlogPost::find($id);
			
			$comment->update($request->all());
			
			return Redirect::to("post/{$id}");
		} else {
			return Redirect::to('auth/login');
		}
	}

	/**
	 * Delete Post From Database
	 *
	 * @param Integer $id The ID of the post to delete 
	 *
	 * @return Response
	 */
	public function destroyPost($id) {
		$post = BlogPost::find($id);
		
		return view('post', compact('post'));
	}

}
