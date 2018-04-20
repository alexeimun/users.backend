<?php

use App\Models\{
    Article, Comment, User
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        factory(User::class, 5)->create()->each(function (User $user) {
            factory(App\Models\Article::class, 2)->create(['user_id' => $user->id])
                ->each(function (Article $article) {
                    factory(Comment::class, 2)->create(['user_id' => $article->user_id,
                        'article_id' => $article->id]);
                });
        });

    }
}