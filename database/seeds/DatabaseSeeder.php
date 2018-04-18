<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([

            ['title' => 'Administrator', 'slug' => 'admin'],
            ['title' => 'Redactor', 'slug' => 'redac'],
            ['title' => 'User', 'slug' => 'user']

        ]);

        DB::table('users')->insert([

            ['username' => 'GreatAdmin',
            'email' => 'sergda@silversite.ru',
            'password' => bcrypt('admin'),
            'seen' => true,
            'role_id' => 1,
            'valid' => true,
            'confirmed' => true],

            ['username' => 'redac',
            'email' => 'redac@la.fr',
            'password' => bcrypt('redac'),
            'seen' => true,
            'role_id' => 2,
            'valid' => true,
            'confirmed' => true]
        ]);

        DB::table('contacts')->insert([

            ['name' => 'Dupont',
            'email' => 'dupont@la.fr',
            'message' => Lipsum::short()->text(2),
            'seen' => false],

            ['name' => 'Durand',
            'email' => 'durand@la.fr',
            'message' => Lipsum::short()->text(2),
            'seen' => false],

            ['name' => 'Martin',
            'email' => 'martin@la.fr',
            'message' => Lipsum::short()->text(2),
            'seen' => true]
            
        ]);


        DB::table('posts')->insert([

            ['title' => 'Post 1',
            'slug' => 'post-1',
            'summary' => '<img alt="" src="/files/user2/mega-champignon.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
            'content' => Lipsum::medium()->html(2) . '<pre>
<code class="language-php">protected function getUserByRecaller($recaller)
{
    if ($this-&gt;validRecaller($recaller) &amp;&amp; ! $this-&gt;tokenRetrievalAttempted)
    {
        $this-&gt;tokenRetrievalAttempted = true;

        list($id, $token) = explode("|", $recaller, 2);

        $this-&gt;viaRemember = ! is_null($user = $this-&gt;provider-&gt;retrieveByToken($id, $token));

        return $user;
    }
}</code></pre>' . Lipsum::medium()->html(2),
            'active' => true,
            'user_id' => 1],

            ['title' => 'Post 2',
            'slug' => 'post-2',
            'summary' => '<img alt="" src="/files/user2/goomba.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
            'content' => Lipsum::medium()->link()->html(8),
            'active' => true,
            'user_id' => 2],

            ['title' => 'Post 3',
            'slug' => 'post-3',
            'summary' => '<img alt="" src="/files/user2/rouge-shell.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
            'content' => Lipsum::medium()->link()->html(8),
            'active' => true,
            'user_id' => 2],

            ['title' => 'Post 4',
            'slug' => 'post-4',
            'summary' => '<img alt="" src="/files/user2/rouge-shyguy.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
            'content' => Lipsum::medium()->link()->html(8),
            'active' => true,
            'user_id' => 2]

        ]);

        DB::table('testblocks')->insert([

            ['title' => 'Post 2',
                'slug' => 'post-2',
                'summary' => '<img alt="" src="/files/user2/goomba.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
                'content' => Lipsum::medium()->link()->html(8),
                'active' => true,
                'user_id' => 2],

            ['title' => 'Post 3',
                'slug' => 'post-3',
                'summary' => '<img alt="" src="/files/user2/rouge-shell.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
                'content' => Lipsum::medium()->link()->html(8),
                'active' => true,
                'user_id' => 2],

            ['title' => 'Post 4',
                'slug' => 'post-4',
                'summary' => '<img alt="" src="/files/user2/rouge-shyguy.png" style="float:left; height:128px; width:128px" />' . Lipsum::short()->html(2),
                'content' => Lipsum::medium()->link()->html(8),
                'active' => true,
                'user_id' => 2]

        ]);

        /*
        DB::table('post_tag')->insert([

            ['post_id' => 1, 'tag_id' => 1],
            ['post_id' => 1, 'tag_id' => 2],
            ['post_id' => 2, 'tag_id' => 1],
            ['post_id' => 2, 'tag_id' => 2],
            ['post_id' => 2, 'tag_id' => 3],
            ['post_id' => 3, 'tag_id' => 1],
            ['post_id' => 3, 'tag_id' => 2],
            ['post_id' => 3, 'tag_id' => 4]

        ]);
        */

    }
}
