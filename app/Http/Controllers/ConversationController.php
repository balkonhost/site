<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Conversation $conversation)
    {
        $conversations = $conversation->orderBy('created_at')->get();

        return view('conversation.index', compact('conversations'));
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

        return view('conversation.create', compact('admins'));
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
            'participants' => 'required|array',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_at' => 'required|date',
        ]);

        $conversation = new Conversation($request->all());
        $user = Auth::user();
        $user->conversations()->save($conversation);

        return redirect()->route('conversation.create')
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
        $conversation = Conversation::findOrFail($id);
        $prev = Conversation::where('created_at', '<', $conversation->created_at)->orderByDesc('created_at')->first();
        $next = Conversation::where('created_at', '>', $conversation->created_at)->orderBy('created_at')->first();

        return view('conversation.show',compact('conversation', 'next', 'prev'));
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
        $conversation = Conversation::findOrFail($id);

        return view('conversation.edit', compact('admins', 'conversation'));
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
            'participants' => 'required|array',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_at' => 'required|date',
        ]);

        $conversation = Conversation::findOrFail($id);
        $conversation->update($request->all());

        return redirect()->route('conversation')
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

        return redirect()->route('conversation')
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

        $directory = 'uploads/post';

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
