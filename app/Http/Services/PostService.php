<?php

namespace App\Http\Services;

use App\Models\Post;

class PostService
{

    public function addPost($data)
    {
        return Post::create($data);
    }

    public function allPost()
    {
        return $showCounts = Post::count();
    }

    public function fetchAllPost()
    {
        return Post::select('id','title','description')->get();
    }

    public function editData($id)
    {
        return Post::find($id);
    }

    public function updatePostData($id, $data)
    {
        return Post::where('id', $id)->update($data);
    }

    public function deleteRowData($id)
    {
        return $deleteRow = Post::where('id', $id)->delete();
    }
}
