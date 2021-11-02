<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use GuzzleHttp\Promise\Create;

class student_Controller extends Controller
{
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }
    public function create(Request $request)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $student = Student::create(
            [
                "nim" => $nim,
                "nama" => $nama,
                "email" => $email,
                "jurusan" => $jurusan
            ]
        );
        $data = [
            "message" => "data student is created",
            "data" => $student,
        ];
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        Student::find($id)->update(
            [
                "nim" => $nim,
                "nama" => $nama,
                "email" => $email,
                "jurusan" => $jurusan
            ]
        );
        $student = Student::find($id)->get();
        $data = [
            "message" => "data student is Updated",
            "data" => $student,
        ];
        return response()->json($data, 201);
    }
    public function destroy($id)
    {
        Student::find($id)->delete();
        $data = [
            "message" => "data Student is delete",
        ];
        return response()->json($data);
    }
}
