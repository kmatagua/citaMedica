<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Registrar nueva cita</h3>
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
                    <label for="specialty">Especialidad</label>
                    <select name="specialty_id" id="specialty" class="form-control">
                        <option value="">Seleccionar especialidad</option>
                        @foreach ($specialties as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="doctor">Médico</label>
                    <select name="doctor_id" id="doctor" class="form-control"></select>
                </div>

                <div class="form-group">
                    <label for="cedula">Fecha</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" 
                            id="date"
                            placeholder="Seleccionar fecha" 
                            type="text" 
                            value="{{ date('Y-m-d') }}" 
                            data-date-format="yyyy-mm-dd"
                            data-date-start-date="{{ date('Y-m-d') }}" 
                            data-date-end-date="+30d">
                        </div>
                </div>

                <div class="form-group">
                    <label for="address">Hora de atención</label>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4 class="m-3" id="titleMorning"></h4>
                                <div id="hoursMorning"></div>
                            </div>
                            <div class="col">
                                <h4 class="m-3" id="titleAfternoon"></h4>
                                <div id="hoursAfternoon"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="phone">Tipo de consulta</label>
                    
                    @error('phone')
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" style="border-color:red">
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @else
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    @enderror
                </div>


                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('js/appointments/create.js') }}"></script>
@endsection