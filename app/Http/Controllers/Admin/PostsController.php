<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(5);
        $headTitle = 'Admin/Blog';

        return view('admin.posts.index', compact('posts', 'headTitle'));
    }


    public function create()
    {
        $headTitle = 'Admin/Blog/Create';
        return view('admin.posts.create', compact('headTitle'));
    }


    public function store(PostRequest $request)
    {

        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.index');

    }

    private function getTagsIds($tags)
    {
        // array_map passa um trim em cadas elemento do array
        // array_filter limpa os indices do vazios
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach ($tagList as $tagName) {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        return $tagsIDs;
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->post->find($id);
        $post->update($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.index');
    }
}
