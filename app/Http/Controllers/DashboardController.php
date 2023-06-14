<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        $metaTag = array(
            'var_meta_title' => 'Dashboard',
            'var_meta_description' => 'Dashboard description',
            'var_meta_keyword' => 'Dashboard Keyword'
        );

        $posts = new PostService();
        $user = new UserService();

        $post = $posts->allPost();
        $user = $user->userCount();

        return view('admin.home.dashboard', compact('metaTag', 'post', 'user'));
    }
}
