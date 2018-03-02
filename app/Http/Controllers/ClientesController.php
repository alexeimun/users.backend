<?php

namespace App\Http\Controllers;

use App\Repositories\ClientesRepository;
use Illuminate\Http\Request;

class ClientesController extends Controller {

    protected $clientes;
    protected $request;

    public function __construct(ClientesRepository $clientes, Request $request) {
        $this->clientes = $clientes;
        $this->request = $request;
    }

    public function show() {
        $data = $this->clientes->all();
        return response()->json($data);
    }

    public function create() {
        $data = $this->clientes->create($this->request->input());

        return response()->json(['data' => $data]);
    }

    public function update($id) {
        $data = $this->clientes->update($id, $this->request->input());

        return response()->json(['data' => $data]);
    }

    public function destroy($id) {
        $this->clientes->delete($id);
        return response()->json(['data' => 'destroyed!']);
    }

}
