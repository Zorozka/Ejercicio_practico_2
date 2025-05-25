<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('empleados.index', ['empleados' => Empleado::with('departamento')->get()]);
    }

    public function create()
    {
        return view('empleados.create', ['departamentos' => Departamento::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados',
            'dni' => 'required|unique:empleados',
            'departamento_id' => 'required|exists:departamentos,id'
        ]);
        Empleado::create($request->all());
        return redirect()->route('empleados.index');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', [
            'empleado' => $empleado,
            'departamentos' => Departamento::all()
        ]);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'dni' => 'required|unique:empleados,dni,' . $empleado->id,
            'departamento_id' => 'required|exists:departamentos,id'
        ]);
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
