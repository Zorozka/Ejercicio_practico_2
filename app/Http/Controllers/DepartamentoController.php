<?php
namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        return view('departamentos.index', ['departamentos' => Departamento::all()]);
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required', 'ubicacion' => 'required']);
        Departamento::create($request->all());
        return redirect()->route('departamentos.index');
    }

    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate(['nombre' => 'required', 'ubicacion' => 'required']);
        $departamento->update($request->all());
        return redirect()->route('departamentos.index');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
