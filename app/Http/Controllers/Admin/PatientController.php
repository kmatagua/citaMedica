<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
   
    public function index()
    {
        $patients = User::patients()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    
    public function create()
    {
        return view('patients.create');
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
            'name.required'     => 'El nombre del paciente es obligatorio.',
            'name.min'          => 'El nombre del paciente debe tener al menos 3 caracteres.',
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.emial'       => 'Ingresa una direccion de correo electronico válido.',
            'cedula.required'   => 'La cedula es obligatoria.',
            'cedula.min'        => 'La cedula debe tener al menos 8 caracteres',
            'cedula.max'        => 'La cedula no debe exceder los 10 caracteres',
            'address.min'       => 'La direccion debe tener al menos 6 caracteres',
            'phone.required'    => 'El numero de telefono es obligatorio'
        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role' => 'paciente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El paciente se ha registrado correctamente';
        return redirect()->route('pacientes.index')->with(compact('notification'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
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
            'name.required'     => 'El nombre del paciente es obligatorio.',
            'name.min'          => 'El nombre del paciente debe tener al menos 3 caracteres.',
            'email.required'    => 'El correo electronico es obligatorio.',
            'email.emial'       => 'Ingresa una direccion de correo electronico válido.',
            'cedula.required'   => 'La cedula es obligatoria.',
            'cedula.min'        => 'La cedula debe tener al menos 8 caracteres',
            'cedula.max'        => 'La cedula no debe exceder los 10 caracteres',
            'address.min'       => 'La direccion debe tener al menos 6 caracteres',
            'phone.required'    => 'El numero de telefono es obligatorio'
        ];
        $this->validate($request, $rules, $messages);

        $user = User::patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'address', 'phone');

        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
       
        $user->fill($data);
        $user->save();
        $notification = 'La información del paciente se ha actualizado correctamente';
        return redirect()->route('pacientes.index')->with(compact('notification'));
    }

   
    public function destroy($id)
    {
        $user = User::patients()->findOrFail($id);
        $patientName = $user->name;
        $user->delete();
        $notification = 'El paciente '. $patientName .' se eliminó correctamente.';

        return redirect()->route('pacientes.index')->with(compact('notification'));
    }
}
