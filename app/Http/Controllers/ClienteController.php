<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('cliente as cli')
                // ->where('PROV_Status', 1)
                ->select('cli.*')
                ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->idCliente . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCliente" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->idCliente . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteCliente"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action1', 'action2'])
                ->make(true);
        }
        return view('cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query=Cliente::where('numeroDocumento','=',$request->get('numeroDocumento'))->get();
        if($query->count()!=0) //si lo encuentra, osea si no esta vacia
        {
            
            return response()->json(['error' => 'Cliente ya registrado'], 401);                   
        }
        else{
            $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->apellidos = $request->apellidos;
            $cliente->numeroDocumento = $request->numeroDocumento;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->email;
            $cliente->save();
            return response()->json(['success' => 'Cliente Registrado Exitosamente!',compact('cliente')]);
            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        
        return response()->json(['data' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $query=Cliente::where('numeroDocumento','=',$request->get('numeroDocumento'))->where('idCliente','!=',$id)->get();
        if($query->count()!=0) //si lo encuentra, osea si no esta vacia
        {
            
            return response()->json(['error' => 'Cliente ya registrado'], 401);                   
        }
        else{
            $cliente = Cliente::find($id);
            $cliente->nombre = $request->nombre;
            $cliente->apellidos = $request->apellidos;
            $cliente->numeroDocumento = $request->numeroDocumento;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->email;
            $cliente->save();
            return response()->json(['success' => 'Cliente Actualizado Exitosamente!',compact('cliente')]);
        }   
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return response()->json(['success' => 'Cliente Eliminado Exitosamente!']);  
    }
}
