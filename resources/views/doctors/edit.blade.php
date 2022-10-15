<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar medico</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('medicos.index') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.update', $doctor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del medico</label>
                    
                    @error('name')
                    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}">
                    @enderror
                    
                </div>

                <div class="form-group">
                    <label for="specialties">Especialidades</label>
                    <select name="specialties[]" id="specialties" class="form-control selectpicker"
                    data-style="btn-primary" title="Seleccionar especialidades" multiple required>
                        @foreach ($specialties as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    
                    @error('email')
                    <input type="text" name="email" value="{{ old('email', $doctor->email) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="email" value="{{ old('email', $doctor->email) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    
                    @error('cedula')
                    <input type="text" name="cedula" value="{{ old('cedula', $doctor->cedula) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="cedula" value="{{ old('cedula', $doctor->cedula) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Direccion</label>
                    
                    @error('address')
                    <input type="text" name="address" value="{{ old('address', $doctor->address) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="address" value="{{ old('address', $doctor->address) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefono / Movil</label>
                    
                    @error('phone')
                    <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    
                    @error('password')
                    <input type="text" name="password" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="password" class="form-control">
                    <small class="text-warning">Solo llene el campo si desea cambiar la contraseña.</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(()=> {});
        $('#specialties').selectpicker('val', @json($specialty_ids));
    </script>
@endsection