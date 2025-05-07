<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('vehiculo as ve')
                ->join('cliente as cli', 'cli.idCliente', '=', 've.idCliente')
                ->select('ve.*',DB::raw('CONCAT(cli.nombre," ",cli.apellidos) as nombreCliente'))
                ->get();

            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->idvehiculo . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editVehiculo" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->idvehiculo . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteVehiculo"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action1', 'action2'])
                ->make(true);
        }
        $clientes = Cliente::all();
        return view('vehiculo.index',compact('clientes'));
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
        $query=Vehiculo::where('placa','=',$request->get('placa'))->get();
        if($query->count()!=0) //si lo encuentra, osea si no esta vacia
        {
            
            return response()->json(['error' => 'Vehiculo ya registrado'], 401);                   
        }
        else{
            $vehiculo = new Vehiculo();
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->placa = $request->placa;
            $vehiculo->anioFabricacion = $request->anioFabricacion;
            $vehiculo->idCliente = $request->idCliente;
            $vehiculo->save();
            return response()->json(['success' => 'Vehiculo Registrado Exitosamente!',compact('vehiculo')]);
            
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
        $vehiculo = Vehiculo::find($id);
        
        return response()->json(['data' => $vehiculo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $query=Vehiculo::where('placa','=',$request->get('placa'))->where('idvehiculo','!=',$id)->get();
        if($query->count()!=0) //si lo encuentra, osea si no esta vacia
        {
            
            return response()->json(['error' => 'Vehiculo ya registrado'], 401);                   
        }
        else{
            $vehiculo = Vehiculo::find($id);
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->placa = $request->placa;
            $vehiculo->anioFabricacion = $request->anioFabricacion;
            $vehiculo->idCliente = $request->idCliente;
            $vehiculo->save();
            return response()->json(['success' => 'Vehiculo Actualizado Exitosamente!',compact('vehiculo')]);
        }   
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return response()->json(['success' => 'Vehiculo Eliminado Exitosamente!']);  
    }
}
