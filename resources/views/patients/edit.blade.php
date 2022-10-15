<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar paciente</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pacientes.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del paciente</label>
                    
                    @error('name')
                    <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}">
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    
                    @error('email')
                    <input type="text" name="email" value="{{ old('email', $patient->email) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="email" value="{{ old('email', $patient->email) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    
                    @error('cedula')
                    <input type="text" name="cedula" value="{{ old('cedula', $patient->cedula) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="cedula" value="{{ old('cedula', $patient->cedula) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Direccion</label>
                    
                    @error('address')
                    <input type="text" name="address" value="{{ old('address', $patient->address) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="address" value="{{ old('address', $patient->address) }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefono / Movil</label>
                    
                    @error('phone')
                    <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="form-control" style="border-color:red">
                    <small class="text-sm text-danger">{{ $message }}</small>
                    @else
                    <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="form-control">
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
