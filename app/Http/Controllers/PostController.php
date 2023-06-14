<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index() {

        $metaTag = array(
            'var_meta_title' => 'Post',
            'var_meta_description' => 'Post Description',
            'var_meta_keyword' => 'Post Keyword'
        );

        return view('admin/post.index', compact('metaTag'));

    }

    public function getPosts(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $sortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        // Total records
        $posts = new PostService();
        $totalRecords = $posts->allPost();

        $totalRecordsFilter = Post::select('count(*) as allcount')
        ->where(DB::raw('CONCAT(title, " ", description)'),'LIKE','%'.$searchValue.'%')
        ->count();

        $records = Post::with('user')
            ->orderBy($columnName,$sortOrder)
            ->where(DB::raw('CONCAT(title, " ", description)'),'LIKE','%'.$searchValue.'%')
            ->select('tbl_blogs.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();
            $data = array();

            foreach ($records as $record) {

            $user= Auth::user()->id;
            $action='';

            $id = $record->id;
            $title = $record->title;
            $users = $record->user->name;
            $ids = $record->user_id;
            $description = $record->description;

            $edit = route('editPostData', $record->id);
            $deleted = route('deleteRowPost', $record->id);

            if($ids == $user){
                $action .= "<a href='{$edit}' class='mb-4 text-primary'> <i class='far fa-edit'></i> </a>";
                $action .= "<a href='{$deleted}' class='mb-4 text-danger'> <i class='far fa-trash-alt'></i> </a>";
            }else{
                $action .= "NA";
            }


            $data[] = array(
               "id" => $id,
               "title" => $title,
               "user_id" => $users,
               "description" => $description,
               "action" => $action,
            );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordsFilter,
           "aaData" => $data
        );

        return response()->json($response);
    }

    public function addPostData()
    {
        $metaTag = array(
            'var_meta_title' => 'Add Post',
            'var_meta_description' => 'Post description',
            'var_meta_keyword' => 'Post Keyword'
        );

        return view('admin/post.create', compact('metaTag'));
    }

    public function insertPost(PostStoreRequest $request)
    {
        $user= Auth::user();
        $remind_at = Carbon::now()->format('Y-m-d');

        $data = [
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'remind_at' => $remind_at,
        ];

        $posts = new PostService();
        $add = $posts->addPost($data);

        #Mail Function
        Mail::send('emails.post_mail',["details" => $add, "user" => $user],
        function ($message) use ($user) {
            $message->from(config("mail.from.address"), 'Post Information');
            $message->to([$user->email, 'vishal4217@yopmail.com'])->subject('Post created successfully');
        });

        Session::flash('success', 'Post added successfully!!');
        return redirect()->intended('admin/post');
    }

    public function editPostData($id)
    {
        $metaTag = array(
            'var_meta_title' => 'Edit Post',
            'var_meta_description' => 'Post description',
            'var_meta_keyword' => 'Post Keyword'
        );

        $posts = new PostService();
        $postData = $posts->editData($id);

        return view('admin/post.edit', compact('postData','metaTag'));
    }

    public function updatePost($id, PostUpdateRequest $request)
    {
        $user= Auth::user()->id;

        $dataArr = [
            'user_id' => $user,
            'title' => $request->title,
            'description' => $request->description
        ];

       $data = Arr::except($dataArr, array('_token', '_method'));

        $posts = new PostService();
        $posts->updatePostData($id, $data);

        Session::flash('success', 'Post updated successfully!!');
        return redirect()->intended('admin/post');
    }

    public function deleteRowPost($id)
    {
        $posts = new PostService();
        $posts->deleteRowData($id);
        Session::flash('success', 'Post deleted successfully!!');
        return redirect()->intended('admin/post');
    }
}
