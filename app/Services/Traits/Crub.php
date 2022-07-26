<?php

namespace App\Services\Traits;

use Illuminate\Http\Request;

trait Crub
{

    public function index()
    {
        return view($this->views['list'], $this->getDataIndex());
    }

    public function create()
    {
        return view($this->views['create'], $this->getDataCreate() ?? []);
    }

    public function store(Request $request)
    {

        $this->model::create($request->all());

        return redirect($this->views['router-list']);
    }

    public function edit(Request $request, $id)
    {
        return view($this->views['edit'], $this->getDataEdit($id));
    }

    public function update(Request $request, $id)
    {
        $this->model::find($id)->update($request->all());

        return redirect($this->views['router-list']);
    }

    public function destroy($id)
    {
        $this->model::find($id)->delete();

        return redirect($this->views['router-list']);
    }
}