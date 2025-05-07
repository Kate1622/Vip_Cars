@extends('layout.appAdminLte')

@section('titulo','Vehiculos')

@section('contenido')
        
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CREAR VEHICULO</h5>
                    <p class="card-text"></p>
                    <form method="POST" id="vehiculo_form" action="{{ route('vehiculo.store') }}">
                        @csrf
                        <input type="text" id="vehiculo_id_edit" hidden>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">Marca:</label>
                                <input type="text" id="marca" name="marca" class="form-control "
                                    placeholder="Marca del Vehiculo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label"
                                    style=" text-align: left; display: block;">Modelo:</label>
                                <input type="text" id="modelo" name="modelo" class="form-control "
                                    placeholder="Ingrese Modelo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">Número de
                                    documento:</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control sm" id="placa"
                                        name="placa" placeholder="Ingrese Placa" maxlength="8"
                                        required>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">Año de Fabricacion:</label>
                                <input type="number" id="anioFabricacion" name="anioFabricacion" class="form-control "
                                    placeholder="Año de Fabricacion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" 
                                    style=" text-align: left; display: block;">Cliente:</label>
                                    <select class="form-control select2 select2-info" id="idCliente" name="idCliente"
                                    data-dropdown-css-class="select2-info" style="width: 100%;">
                                    <option value="">Seleccionar Cliente</option>
                                    @foreach ($clientes as $cli)
                                        <option value="{{ $cli->idCliente }}"> {{ $cli->nombre }} {{ $cli->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p></p>
                        <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                        <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                class="fas fa-save"></i>Actualizar</button>
                        <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                class="fas fa-ban"></i>Cancelar </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">LISTA DE VEHICULOS</h5>               
                    <div class="table-responsive" style="background:#FFF;">
                        <table class="table" id="table-vehiculos">
                            <thead style="background-color:#FF5F67;color: #fff;">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Año</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            {{-- <tbody>
                            @if(count($roles)<=0)
                                <tr>
                                    <td colspan="3"><b>No hay registro</b></td>
                                </tr>
                            @else
                                @foreach ($roles as $role)
                                <tr>
                                </tr>
                                @endforeach
                            @endif
                            </tbody> --}}
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
        


@endsection
@section('script')
<script>

    $(document).ready(function() {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        var table = $('#table-vehiculos').DataTable({
            responsive: true, // Habilitar la opción responsive
            autoWidth: false,
            searchDelay : 2000,
            processing: true,
            serverSide: true,
            "language": {
            "lengthMenu": "Mostrar _MENU_ ",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                "next" : "Siguiente",
                "previous" : "Anterior"
            }
            },

            order: [
                [0, "asc"]
            ],
            ajax: "{{ route('vehiculo.index') }}",
            columns: [{
                        data: 'idvehiculo',
                        name: 'idvehiculo'
                    },
                    {
                        data: 'marca',
                        name: 'marca'
                    },
                    {
                        data: 'modelo',
                        name: 'modelo'
                    },
                    {
                        data: 'placa',
                        name: 'placa'
                    },
                    {
                        data: 'anioFabricacion',
                        name: 'anioFabricacion'
                    },
                    {
                        data: 'nombreCliente',
                        name: 'nombreCliente'
                    },
                {
                    data: null,
                    name: 'name',
                    'render': function(data, type, row) {
                        return  data.action1 +' '
                             +data.action2;
                    }
                }
            ]
        });
        //
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            
            const form = document.getElementById('vehiculo_form');

            if (form.checkValidity()) {
                $.ajax({
                    data: $('#vehiculo_form').serialize(),
                    url: "{{ route('vehiculo.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        $('#vehiculo_form').trigger("reset");
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Vehiculo fallo al Registrarse.'
                        })
                    }
                });
            } else {
                form.reportValidity();
            }
        });
        
        $('body').on('click', '.deleteVehiculo', function() {

            var Vehiculo_id_delete = $(this).data("id");
            $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
            if ($confirm == true) {
                $.ajax({
                    type: "DELETE",
                    
                    url: '{{ route('vehiculo.destroy', ['vehiculo' => ':vehiculo']) }}'.replace(':vehiculo', Vehiculo_id_delete),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        table.draw();
                        Toast.fire({
                            type: 'success',
                            title: String(data.success)
                        });

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Vehiculo fallo al Eliminarlo.'
                        })
                    }
                });
            }
        });

        $('body').on('click', '.editVehiculo', function() {
            var Vehiculo_id_edit = $(this).data('id');
        
            $.get('{{ route('vehiculo.edit', ['vehiculo' => ':vehiculo']) }}'.replace(':vehiculo', Vehiculo_id_edit),
                function(data) {
                    console.log(data);
                    $('#vehiculo_id_edit').val(data.data.idvehiculo);
                    $('#marca').val(data.data.marca);
                    $('#modelo').val(data.data.modelo);
                    $('#placa').val(data.data.placa);
                    $('#anioFabricacion').val(data.data.anioFabricacion);
                    $('#idCliente').val(data.data.idCliente).trigger('change');
                    

                    //desactivar boton guardar
                    $("#saveBtn").hide();
                    $("#updateBtn").show();
                })
        });

        $('#btncancelar').click(function(e) {
            cancelarUpdate();
            $("#name").prop("disabled", false);
        });


        function cancelarUpdate(){
            $("#saveBtn").show();
            $("#updateBtn").hide();

        }

        $('#updateBtn').click(function(e) {
            e.preventDefault();
            Vehiculo_id_update = $('#vehiculo_id_edit').val();
            $.ajax({
                data: $('#vehiculo_form').serialize(),
                url: '{{ route('vehiculo.update', ['vehiculo' => ':vehiculo']) }}'.replace(':vehiculo', Vehiculo_id_update),
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    console.log('Success:', data);
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    });
                    cancelarUpdate();
                    $('#vehiculo_form').trigger("reset");
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    if(data.responseText){
                        Toast.fire({
                            type: 'error',
                            title: data.responseText
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: 'Vehiculo fallo al Registrarse.'
                        })
                    }
                }
            });
        });

        $('body').on('click', '.eyeVehiculo', function() {
            var Vehiculo_id_ver = $(this).data('id');
            $('#modalVerDetalle').modal('show');
            $.get('{{ route('vehiculo.show', ['vehiculo' => ':vehiculo']) }}'.replace(':vehiculo', Vehiculo_id_ver),
                function(data) {
                    console.log(data);
                    $('#ver_id').text(data.data.id);
                    $('#ver_group').text(data.data.group_name);
                    $('#ver_marca').text(data.data.marca);
                    $('#ver_ruta').text(data.data.name);
                    $('#ver_description').text(data.data.description);
                    $('#ver_fecha_registro').text(moment(data.data.created_at).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ver_fecha_update').text(moment(data.data.updated_at).format('YYYY-MM-DD HH:mm:ss'));

                })
           
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection