<?php

namespace App\Http\Controllers;

use App\Post;

class MainController extends Controller
{


    public function index()
    {

        $posts = Post::all();
        $headTitle = 'Apredendo Laravel';
        $headSubtitle = 'Um blog para aprender laravel';
        $headImage = 'home-bg.jpg';

        return view('main.index',compact('posts','headTitle','headSubtitle','headImage')) ;
    }

    public function contact()
    {
        $headTitle = 'Contato';
        $headSubtitle = 'Você tem algo a me contar?';
        $headImage = 'contact-bg.jpg';

        return view('main.contact',compact('headTitle','headSubtitle','headImage')) ;
    }

    public function about()
    {
        $headTitle = 'Sobre';
        $headSubtitle = 'Isto é o que eu faço';
        $headImage = 'about-bg.jpg';
        return view('main.about',compact('headTitle','headSubtitle','headImage')) ;
    }

    public function post($id)
    {
        $post = Post::find($id);
        $headTitle = $post->title;
        $headSubtitle = $post->subtitle;
        $headImage = 'post-bg.jpg';
        return view('main.post', compact('post', 'headTitle', 'headSubtitle', 'headImage'));
    }

}
