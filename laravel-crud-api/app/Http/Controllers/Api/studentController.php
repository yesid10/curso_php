<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function index(){
        
        $students = Student::all();

        // if($students -> isEmpty()){
        //     $data = [
        //         'message' => 'No hay estudiantes registrados',
        //         'status' => 200
        //     ];

        //     return response()->json($data, 200);
        // }

        $data = [
            'students' => $students,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'lenguaje' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'lenguaje' => $request->lenguaje
        ]);

        if(!$student){
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'student' => $student,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $student = Student::find($id);

        if(!$student){
            $data =[
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function delete($id){
        $student = Student::find($id);

        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => 'Estudiante eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);

        if(!$student){
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'lenguaje' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        };

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->lenguaje = $request->lenguaje;

        $student->save();

        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
