<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class MainController extends Controller
{
    public  $posts;

    public function __construct()
    {
        $this->posts = [];
        $post = new Post();
        $post->id = 1;
        $post->title = 'Primeiro post';
        $post->subtitle = 'Subtitulo do primeiro post';
        $post->author = 'Fernando';
        $post->date = '07/01/2017';
        $this->posts[] = $post;

        $post = new Post();
        $post->id = 2;
        $post->title = 'Segundo post';
        $post->subtitle = 'Subtitulo do segundo post';
        $post->author = 'Miguel';
        $post->date = '10/01/2017';
        $this->posts[] = $post;

        $post = new Post();
        $post->id = 3;
        $post->title = 'Terceiro post';
        $post->subtitle = 'Subtitulo do terceiro post';
        $post->author = 'Fernando';
        $post->date = '15/01/2017';
        $this->posts[] = $post;
    }

    public function index()
    {
        $posts = $this->posts;
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
        $post = new Post();
        foreach ($this->posts as $p) {
            if($p->id == $id){
                $post = $p;
                break;
            }
        }

        $headTitle = $post->title;
        $headSubtitle = $post->subtitle;
        $headImage = 'post-bg.jpg';
        return view('main.post',compact('headTitle','headSubtitle','headImage')) ;
    }

}
