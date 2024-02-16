<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Post $post)
    {
        $posts = $post->latest()->get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (!$this->canPublish()) {
            abort(404);
        }

        $admins = Admin::all();

        return view('post.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!$this->canPublish()) {
            abort(404);
        }

        $request->validate([
            'admin_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_at' => 'required|date',
        ]);

        $post = new Post($request->all());
        $user = Auth::user();
        $user->posts()->save($post);

        return redirect()->route('blog.create')
            ->with('success','Тема успешно добавлена.');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(string $id)
    {
        if (!$this->canPublish()) {
            abort(404);
        }

        $admins = Admin::all();
        $post = Post::findOrFail($id);

        return view('post.edit', compact('admins', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        if (!$this->canPublish()) {
            abort(404);
        }

        $request->validate([
            'admin_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_at' => 'required|date',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('post')
            ->with('success','Тема успешно обнавлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post')
            ->with('success','Тема удалена');
    }

    /**
     * Upload image
     * @param request
     * @param response
     */
    public function uploadImage(Request $request)
    {
        if (!$this->canPublish()) {
            abort(404);
        }

        $directory = 'uploads/blog';

        if ($request->hasFile('upload')) {

            $originalName = $request->file('upload')->getClientOriginalName();
            $name = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = $name.'_'.time().'.'.$extension;

            $request->file('upload')->move($directory, $filename);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset("{$directory}/{$filename}");

            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }

    protected function canPublish(): bool
    {
        $ids = ['0'];

        return in_array(Auth::id(), $ids);
    }
}
