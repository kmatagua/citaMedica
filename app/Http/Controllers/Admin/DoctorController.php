<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialty;

class DoctorController extends Controller
{
    
    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    
    public function create()
    {
        $specialties = Specialty::orderBy('name', 'ASC')->get();
        return view('doctors.create', compact('specialties'));
    }

    
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8|max:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required'     => 'El nombre del medico es obligatorio.',
            'name.min'          => 'El nombre del medico debe tener al menos 3 caracteres.',
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.emial'       => 'Ingresa una direccion de correo electronico válido.',
            'cedula.required'   => 'La cedula es obligatoria.',
            'cedula.min'        => 'La cedula debe tener al menos 8 caracteres',
            'cedula.max'        => 'La cedula no debe exceder los 10 caracteres',
            'address.min'       => 'La direccion debe tener al menos 6 caracteres',
            'phone.required'    => 'El numero de telefono es obligatorio'
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $user->specialties()->attach($request->input('specialties'));


        $notification = 'El medico se ha registrado correctamente';
        return redirect()->route('medicos.index')->with(compact('notification'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        $specialties = Specialty::all();
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');
        return view('doctors.edit', compact('doctor', 'specialties', 'specialty_ids'));
    }

    
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8|max:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required'     => 'El nombre del medico es obligatorio.',
            'name.min'          => 'El nombre del medico debe tener al menos 3 caracteres.',
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.emial'       => 'Ingresa una direccion de correo electronico válido.',
            'cedula.required'   => 'La cedula es obligatoria.',
            'cedula.min'        => 'La cedula debe tener al menos 8 caracteres',
            'cedula.max'        => 'La cedula no debe exceder los 10 caracteres',
            'address.min'       => 'La direccion debe tener al menos 6 caracteres',
            'phone.required'    => 'El numero de telefono es obligatorio'
        ];
        $this->validate($request, $rules, $messages);

        $user = User::doctors()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');

        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
       
        $user->fill($data);
        $user->save();

        $user->specialties()->sync($request->input('specialties'));

        $notification = 'La información del medico se ha actualizado correctamente';
        return redirect()->route('medicos.index')->with(compact('notification'));
    }

    public function destroy($id)
    {
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user->name;
        $user->delete();
        $notification = 'El medico '. $doctorName .' se eliminó correctamente.';

        return redirect()->route('medicos.index')->with(compact('notification'));
    }
}
