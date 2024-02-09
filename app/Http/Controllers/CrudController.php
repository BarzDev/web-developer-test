<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    public function index()
    {
    // READ data
        $cruds = Crud::latest()->paginate(7);

        return view('cruds.index', [
            'cruds' => SpladeTable::for($cruds)
            ->column('image')
            ->column('name')
            ->column('position')
            ->column('action')
        ]);
    }

    // CREATE data
     public function create()
     {
         return view('cruds.create');
     }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'name' => 'required|regex:/[^\s]/',
            'position'  => 'required|in:Manager,HR,IT,Sales',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Crud::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $image->hashName(),
        ]);

        return redirect(route('cruds.index'));
    }

    public function edit(Crud $crud)
    {
        return view('cruds.edit', [
            'crud' => $crud
        ]);
    }

    // UPDATED data
    public function update(Crud $crud, Request $request)
    {
        $this->validate($request, [
            'image'     => 'nullable|image|mimes:jpeg,jpg,png',
            // 'name' => 'required|regex:/[^\s]/',
            // 'position'  => 'required|in:Manager,HR,IT,Sales',
        ]);

        $crud->update([
            'name' => $request->filled('name') ? $request->name : $crud->name,
            'position' => $request->filled('position') ? $request->position : $crud->position,
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            Storage::delete('public/posts/'. $crud->image);

            $crud->update([
                'image' => $image->hashName(),
            ]);
        }

        return redirect(route('cruds.index'));
    }

    // DELETE data
    public function destroy(Crud $crud)
    {
        Storage::delete('public/posts/'. $crud->image);

        $crud->delete();

        return back();
    }
}
