<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Task;

class mhsAPIController extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            "success" => true , 
            "message" => "data berhasil ditampilkan",
            "data" => $mhs
        ],200);
    }

    public function readtask(){
        $task = Task::all();
        return response()->json([
            "success" => true , 
            "message" => "data berhasil ditampilkan",
            "data" => $task
        ],200);
    }

    public function create(Request $request){
        $mhs = Mahasiswa::create([
            'nim' => $request->nim,
            'nama'=> $request -> nama,
            'gender' => $request->gender,
            'jurusan'=> $request->jurusan,
            'bidang_minat'=> $request->bidang_minat

        ]);
        if($mhs){
            return response()->json([
            "success" => true , 
            "message" => "data berhasil ditambahkan" 
        ],200);
        }else{
            return response()->json([
                "success" => false , 
                "message" => "data gagal ditambahkan"
            ],400);

        }
    }

    public function createtask(Request $request){
        $task = Task::create([
            'nama'=> $request -> nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task'=> $request->deskripsi_task

        ]);
        if($task){
            return response()->json([
            "success" => true , 
            "message" => "data berhasil ditambahkan" 
        ],200);
        }else{
            return response()->json([
                "success" => false , 
                "message" => "data gagal ditambahkan"
            ],400);

        }
    }

    public function update($nim,Request $request){
        $mhs = Mahasiswa::find($nim)->update([
            'nim' => $request->nim,
            'nama'=> $request -> nama,
            'gender' => $request->gender,
            'jurusan'=> $request->jurusan,
            'bidang_minat'=> $request->bidang_minat

        ]);
        if($mhs){
            return response()->json([
            "success" => true , 
            "message" => "data berhasil diupdate" 
        ],200);
        }else{
            return response()->json([
                "success" => false , 
                "message" => "data gagal diupdate"
            ],400);

        }

    }
    public function updatetask($id,Request $request){
        $task = Task::find($id)->update([
            'nama'=> $request -> nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task'=> $request->deskripsi_task
        ]);
        if($task){
            return response()->json([
            "success" => true , 
            "message" => "data berhasil diupdate" 
        ],200);
        }else{
            return response()->json([
                "success" => false , 
                "message" => "data gagal diupdate"
            ],400);

        }

    }

    public function delete($nim){
        $mhs = Mahasiswa::find($nim)->delete();
        if($mhs){
            return response()->json([
                "success" => true , 
                "message" => "data berhasil dihapus" 
            ],200);
            }else{
                return response()->json([
                    "success" => false , 
                    "message" => "data gagal dihapus"
                ],400);
    
            }
    }
    public function deletetask($id){
        $task = Task::find($id)->delete();
        if($task){
            return response()->json([
                "success" => true , 
                "message" => "data berhasil dihapus" 
            ],200);
            }else{
                return response()->json([
                    "success" => false , 
                    "message" => "data gagal dihapus"
                ],400);
    
            }
    }
}
