<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends Repository {

    public function __construct(Article $model) {
        $this->model = $model;
    }
}
