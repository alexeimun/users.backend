<?php

namespace App\Http\Controllers;

use App\Repositories\AsesoresRepository;
use Illuminate\Http\Request;

class AsesoresController extends Controller {

    protected $asesores;
    protected $request;

    public function __construct(AsesoresRepository $asesores, Request $request) {
        $this->asesores = $asesores;
        $this->request = $request;
    }

    public function show() {
        $data = $this->asesores->all();
        return response()->json($data);
    }

    public function create() {
        $data = $this->asesores->create($this->request->input());

        return response()->json($data);
    }

    public function update($id) {
        $data = $this->asesores->update($id, $this->request->input());

        return response()->json($data);
    }

    public function destroy($id) {
        $this->asesores->delete($id);
        return response()->json(['data' => 'destroyed!']);
    }

}
