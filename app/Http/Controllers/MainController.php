<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;
use App\Http\Controllers\JobController;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {


        // $user = auth()->user()->id;

        // return view('main.index', [

        //     'jobs' => Job::all(),

        //     'departemens' => Job::rightJoin('departments', 'jobs.id_departemen', '=', 'departments.id')
        //         ->select(DB::raw('count(jobs.nama_lowongan) as total_lowongan, departments.id as id_departemen, nama_departemen, kode_departemen, singkatan_departemen'))
        //         ->groupBy('departments.id')
        //         ->get(),

        //     'jobsOpen' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
        //         ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
        //          ->where('closed','=','false')
        //         ->get(),

        //     'jobsClosed' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
        //         ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
        //          ->where('closed','=','true')
        //         ->get(),

        //     'profils' => Profil::where('user_id','=',$user)->get()

        // ]);
        try{
            $user = Auth::user();
            if($user){
                $id_user = $user->id;

                return view('main.index', [

                'jobs' => Job::all(),

                'departemens' => Job::rightJoin('departments', 'jobs.id_departemen', '=', 'departments.id')
                    ->select(DB::raw('count(jobs.nama_lowongan) as total_lowongan, departments.id as id_departemen, nama_departemen, kode_departemen, singkatan_departemen'))
                    ->groupBy('departments.id')
                    ->get(),

                'jobsOpen' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                    ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                    ->where('closed','=','false')
                    ->get(),

                'jobsClosed' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                    ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                    ->where('closed','=','true')
                    ->get(),

                'profils' => Profil::where('user_id','=',$id_user)->get(),
                ]);
            }
            else{
                return view('main.index', [

                    'jobs' => Job::all(),
    
                    'departemens' => Job::rightJoin('departments', 'jobs.id_departemen', '=', 'departments.id')
                        ->select(DB::raw('count(jobs.nama_lowongan) as total_lowongan, departments.id as id_departemen, nama_departemen, kode_departemen, singkatan_departemen'))
                        ->groupBy('departments.id')
                        ->get(),
    
                    'jobsOpen' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                        ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                        ->where('closed','=','false')
                        ->get(),
    
                    'jobsClosed' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                        ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                        ->where('closed','=','true')
                        ->get(),
                ]);
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();
            
        }
    }
}
