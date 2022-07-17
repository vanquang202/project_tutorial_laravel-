<?php
namespace App\Services\Traits;

use Illuminate\Support\Facades\Request;

trait Crub{

     public function index()
    {
        return view($this->views['list'], $this->getDataIndex());
    }

    public function create()
    {
        return view($this->views['create'], $this->getDataCreate());
    }

    public function store(Request $request)
    {
        $this->data::create($request->all());

        return redirect($this->views['list']);
    }

    public function edit(Request $request, $id)
    {
        return view($this->views['edit'], $this->getDataEdit($id));
    }

    public function update(Request $request, $id)
    {
        $this->data::find($id)->update($request->all());

        return redirect($this->views['list']);
    }

    public function destroy($id)
    {
        $this->data::find($id)->delete();

        return redirect($this->views);
    }
}