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
                    <h3 class="mb-0">Nuevo medico</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('medicos.index') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del médico</label>

                    @error('name')
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
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
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                            style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>

                    @error('cedula')
                        <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control"
                            style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Direccion</label>

                    @error('address')
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                            style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefono / Movil</label>

                    @error('phone')
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                            style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>

                    @error('password')
                        <input type="text" name="password" value="{{ old('password', Str::random(8)) }}"
                            class="form-control" style="border-color:red">
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                        <input type="text" name="password" value="{{ old('password', Str::random(8)) }}"
                            class="form-control">
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Crear medico</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
