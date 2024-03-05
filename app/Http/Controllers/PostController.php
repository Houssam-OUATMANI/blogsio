<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $title = $request->validated("title");
        $content = $request->validated("content");

        // Images storage
        $image = $request->validated("image_path");
        $image_path = $image->store("posts", "public");

        Post::query()->create([
           "title" =>  $title,
           "content" => $content,
           "image_path" => $image_path,
           "user_id" => Auth::id()
        ]);
        return redirect()->route("home")->with("success", "Le post a bien ete ajoute");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = $post->load("user");
        return view("post.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize("update", $post);
        return view("post.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize("update", $post);
        $image =   $request->file("image_path");
        $image_path = null;
        if($image) {
            // TODO gerer l'image
            Storage::disk("public")->delete($post->image_path);
           $image_path = $request->file("image_path")->store("posts", "public");

        }
        $title = $request->input("title");
        $content = $request->input("content");

        $post->update([
            "title" => $title,
            "content" => $content
        ]);

        if ($image_path !== null) {
            $post->update([
                "image_path" =>$image_path
            ]);
        }


        return redirect()->route("home")->with("success", "Le post a bien ete modifie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("destroy", $post);
        Storage::disk("public")->delete($post->image_path);
        $post->delete();
        return redirect()->route("home")->with("success", "Publication supprimer");
    }
}
