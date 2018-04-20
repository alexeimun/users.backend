<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CasosController extends Controller {

    protected $casos;
    protected $request;

    public function __construct(CommentRepository $casos, Request $request) {
        $this->casos = $casos;
        $this->request = $request;
    }

    public function show() {
        $data = $this->casos->all();
        return response()->json($data);
    }

    public function create() {
        $data = $this->casos->create($this->request->input());

        return response()->json(['data' => $data]);
    }

    public function update($id) {
        $data = $this->casos->update($id, $this->request->input());

        return response()->json(['data' => $data]);
    }

    public function destroy($id) {
        $this->casos->delete($id);
        return response()->json(['data' => 'destroyed!']);
    }

}
