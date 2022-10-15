@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar especialidad</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('especialidades.index') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('especialidades.update', $specialty->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre de la especialidad</label>
                    
                    @error('name')
                    <input type="text" name="name" class="form-control" value="{{ old('name', $specialty->name) }}" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="name" class="form-control" value="{{ old('name', $specialty->name) }}" required>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    
                    @error('description')
                    <input type="text" name="description" value="{{ old('description', $specialty->description) }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="description" value="{{ old('description', $specialty->description) }}" class="form-control">
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar especialidad</button>
            </form>

        </div>
    </div>
@endsection
