<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo paciente</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del paciente</label>
                    
                    @error('name')
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    
                    @error('email')
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    
                    @error('cedula')
                    <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Direccion</label>
                    
                    @error('address')
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefono / Movil</label>
                    
                    @error('phone')
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    
                    @error('password')
                    <input type="text" name="password" value="{{ old('password', Str::random(8)) }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="password" value="{{ old('password', Str::random(8)) }}" class="form-control">
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Crear paciente</button>
            </form>

        </div>
    </div>
@endsection
