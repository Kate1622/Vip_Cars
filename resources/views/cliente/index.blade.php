@extends('layout.appAdminLte')

@section('titulo','Clientes')

@section('contenido')
        
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CREAR CLIENTE</h5>
                    <p class="card-text"></p>
                    <form method="POST" id="cliente_form" action="{{ route('cliente.store') }}">
                        @csrf
                        <input type="text" id="cliente_id_edit" hidden>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">Nombres:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control "
                                    placeholder="Nombres del Cliente" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label"
                                    style=" text-align: left; display: block;">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control "
                                    placeholder="Digite su Apellido">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">Número de
                                    documento:</label>
                                <div class="input-group ">
                                    <input type="number" class="form-control sm" id="numeroDocumento"
                                        name="numeroDocumento" placeholder="Ingrese Nº Documento" maxlength="8"
                                        required>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label" style=" text-align: left; display: block;">E-mail:</label>
                                <input type="email" id="email" name="email" class="form-control "
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="control-label"
                                    style=" text-align: left; display: block;">Teléfono:</label>
                                <input type="number" id="telefono" name="telefono" class="form-control "
                                    placeholder="Número de Teléfono">
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
                  <h5 class="card-title">LISTA DE CLIENTES</h5>               
                    <div class="table-responsive" style="background:#FFF;">
                        <table class="table" id="table-clientes">
                            <thead style="background-color:#FF5F67;color: #fff;">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Número de documento</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Teléfono</th>
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
        var table = $('#table-clientes').DataTable({
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
            ajax: "{{ route('cliente.index') }}",
            columns: [{
                        data: 'idCliente',
                        name: 'idCliente'
                    },
                    {
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'apellidos',
                        name: 'apellidos'
                    },
                    {
                        data: 'numeroDocumento',
                        name: 'numeroDocumento'
                    },
                    {
                        data: 'telefono',
                        name: 'telefono'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
            
            const form = document.getElementById('cliente_form');

            if (form.checkValidity()) {
                $.ajax({
                    data: $('#cliente_form').serialize(),
                    url: "{{ route('cliente.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        $('#cliente_form').trigger("reset");
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Cliente fallo al Registrarse.'
                        })
                    }
                });
            } else {
                form.reportValidity();
            }
        });
        
        $('body').on('click', '.deleteCliente', function() {

            var Cliente_id_delete = $(this).data("id");
            $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
            if ($confirm == true) {
                $.ajax({
                    type: "DELETE",
                    
                    url: '{{ route('cliente.destroy', ['cliente' => ':cliente']) }}'.replace(':cliente', Cliente_id_delete),
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
                            title: 'Cliente fallo al Eliminarlo.'
                        })
                    }
                });
            }
        });

        $('body').on('click', '.editCliente', function() {
            var Cliente_id_edit = $(this).data('id');
        
            $.get('{{ route('cliente.edit', ['cliente' => ':cliente']) }}'.replace(':cliente', Cliente_id_edit),
                function(data) {
                    console.log(data);
                    $('#cliente_id_edit').val(data.data.idCliente);
                    $('#nombre').val(data.data.nombre);
                    $('#apellidos').val(data.data.apellidos);
                    $('#numeroDocumento').val(data.data.numeroDocumento);
                    $('#email').val(data.data.email);
                    $('#telefono').val(data.data.telefono);

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
            Cliente_id_update = $('#cliente_id_edit').val();
            $.ajax({
                data: $('#cliente_form').serialize(),
                url: '{{ route('cliente.update', ['cliente' => ':cliente']) }}'.replace(':cliente', Cliente_id_update),
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    console.log('Success:', data);
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    });
                    cancelarUpdate();
                    $('#cliente_form').trigger("reset");
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
                            title: 'Cliente fallo al Registrarse.'
                        })
                    }
                }
            });
        });

        $('body').on('click', '.eyeCliente', function() {
            var Cliente_id_ver = $(this).data('id');
            $('#modalVerDetalle').modal('show');
            $.get('{{ route('cliente.show', ['cliente' => ':cliente']) }}'.replace(':cliente', Cliente_id_ver),
                function(data) {
                    console.log(data);
                    $('#ver_id').text(data.data.id);
                    $('#ver_group').text(data.data.group_name);
                    $('#ver_nombre').text(data.data.nombre);
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