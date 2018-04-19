<?php

namespace App\Repositories;

use App\Models\Curbstones;

class CurbstonesRepository extends BaseRepository
{
    public function __construct(Curbstones $post)
    {
        $this->model = $post;
    }

    protected function savePost($post, $inputs, $user_id = null)
    {
        $post->title = $inputs['title'];
        $post->description = $inputs['description'];
        $post->keywords = $inputs['keywords'];
        $post->preview_text = $inputs['preview_text'];
        $post->detail_text = $inputs['detail_text'];
        $post->property = $inputs['property'];
        $post->image_passport = $inputs['image_passport'];
        $post->image_passport_description = $inputs['image_passport_description'];
        $post->image_list = $inputs['image_list'];
        $post->image_list_description = $inputs['image_list_description'];
        $post->image_passport_left = $inputs['image_passport_left'];
        $post->image_passport_left_description = $inputs['image_passport_left_description'];
        $post->image_passport_right = $inputs['image_passport_right'];
        $post->image_passport_right_description = $inputs['image_passport_right_description'];

        $post->slider_input = $inputs['slider_input'];

        $post->sort = $inputs['sort'];
        $post->slug = $inputs['slug'];
        $post->is_main = isset($inputs['is_main']);
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
        $table = $this->model->getTable();
        $query = $this->model
            ->select($table.'.id', $table.'.created_at', 'sort', 'title', 'active', 'is_main', 'user_id', 'slug', 'username')
            ->join('users', 'users.id', '=', $table.'.user_id')
            ->orderBy($orderby, $direction);

        if ($user_id) {
            $query->where('user_id', $user_id);
        }

        return $query->paginate($n);
    }

    public function getPostBySlug($slug)
    {
        $post = $this->model->with('user')->whereSlug($slug)->firstOrFail();

        /*
        $en_slider = $this->imagesProject
            ->where('element_id', $post->id)
            ->where('field', 'en_slider')
            ->where('table', 'worldtcs')
            ->get();
        */
        
        return compact('post');
    }

    public function getPostWith($post)
    {
        
        /*
        $en_slider = $this->imagesProject
            ->where('element_id', $post->id)
            ->where('field', 'en_slider')
            ->where('table', 'worldtcs')
            ->get();
        */
        
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

    public function updateIsMain($inputs, $id)
    {
        $post = $this->getById($id);

        $post->is_main = $inputs['is_main'] == 'true';

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
