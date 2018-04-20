<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller {

    protected $articles;
    protected $request;

    public function __construct(ArticleRepository $articles, Request $request) {
        $this->articles = $articles;
        $this->request = $request;
    }

    public function show() {
        $data = $this->articles->all();
        return response()->json($data);
    }

    public function create() {
        $data = $this->articles->create($this->request->input());

        return response()->json($data);
    }

    public function update($id) {
        $data = $this->articles->update($id, $this->request->input());

        return response()->json($data);
    }

    public function destroy($id) {
        $this->articles->delete($id);
        return response()->json(['data' => 'destroyed!']);
    }

}
