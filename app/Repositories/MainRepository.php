<?php

namespace App\Repositories;

use App\Models\Main;

class MainRepository extends BaseRepository
{
    
    public function __construct(Main $post)
    {
        $this->model = $post;
    }

    protected function savePost($post, $inputs, $user_id = null)
    {
        $post->title = $inputs['title'];
        $post->url = $inputs['url'];
        $post->preview_picture = $inputs['preview_picture'];
        $post->preview_picture_description = $inputs['preview_picture_description'];
        $post->detail_picture = $inputs['detail_picture'];
        $post->detail_picture_description = $inputs['detail_picture_description'];
        $post->sort = $inputs['sort'];
        $post->slug = $inputs['slug'];
        $post->active = isset($inputs['active']);
        $post->is_menu = isset($inputs['is_menu']);
        if ($user_id) {
            $post->user_id = $user_id;
        }
        $post->save();

        return $post;
    }

    protected function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->whereActive(true)
            ->with('user')
            ->latest();
    }

    public function getActiveWithUserOrderByDate($n)
    {
        return $this->queryActiveWithUserOrderByDate()->paginate($n);
    }

    public function getPostsWithOrder($n, $user_id = null, $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
            ->select('main.id', 'main.created_at', 'sort', 'title', 'active', 'is_menu', 'user_id', 'slug', 'username')
            ->join('users', 'users.id', '=', 'main.user_id')
            ->orderBy($orderby, $direction);

        if ($user_id) {
            $query->where('user_id', $user_id);
        }

        return $query->paginate($n);
    }

    public function getPostBySlug($slug)
    {
        $post = $this->model->with('user')->whereSlug($slug)->firstOrFail();
        
        return compact('post');
    }

    public function getPostWith($post)
    {
        return compact('post');
    }

    public function getByIdWith($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($inputs, $post)
    {
        $this->savePost($post, $inputs);
    }

    public function updateActive($inputs, $id)
    {
        $post = $this->getById($id);

        $post->active = $inputs['active'] == 'true';

        $post->save();
    }

    public function updateIsMenu($inputs, $id)
    {
        $post = $this->getById($id);

        $post->is_menu = $inputs['is_menu'] == 'true';

        $post->save();
    }

    public function store($inputs, $user_id)
    {
        $this->savePost(new $this->model, $inputs, $user_id);
    }

    public function destroy($post)
    {
        $post->delete();
    }
}
