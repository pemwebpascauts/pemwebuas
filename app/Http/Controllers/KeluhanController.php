<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function index()
    {
    	// mengambil semua data keluhan
		$keluhans = \App\Keluhan::all(); 
		
		// melempar data ke view
    	return view('crud.keluhan.tampilkan', compact('keluhans')); 
    }
	
	//Tabahan CREATE ------------------------------------------------------------------------------ //
	
	public function create()
    {
        // mengambil semua data yang didropdown
 
        //$users = \App\User::all();
		//$jenis_keluhans = \App\JenisKeluhan::all();
 
        // melempar ke view sekaligus mengirim data
    	//return view('crud.keluhan.tambahkan', compact('jenis_keluhans'));
		return view('crud.keluhan.tambahkan');
    }
 
    public function store(Request $request)
    {
    	$validate = \Validator::make($request->all(), [
    			'jenis_keluhan' => 'required',
                'isi_keluhan' => 'required'
    		],

            $after_save = [
                'alert' => 'danger',
                'title' => 'Tunggu dulu!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silakan coba lagi.'
            ]);
 
        if($validate->fails()){
            return redirect()->back()->with('after_save', $after_save);
        }
 
        $after_save = [
            'alert' => 'success',
            'title' => 'Bagus!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];
		
		//id user sementara (hapus bila sudah ada mekanisme login)
		$id_user = 1;
		
		$status_keluhan = 1;
    	
		if (!empty($request->anonim)){
			$data = [
				//'id_user' => $request->id_user,
				'id_user' => $id_user,
				'jenis_keluhan' => $request->jenis_keluhan,
				'isi_keluhan' => $request->isi_keluhan,
				'keanoniman' => $request->anonim,
				'status_keluhan' => $status_keluhan
			];
		} else {
			$data = [
				//'id_user' => $request->id_user,
				'id_user' => $id_user,
				'jenis_keluhan' => $request->jenis_keluhan,
				'isi_keluhan' => $request->isi_keluhan,
				'keanoniman' => 0,
				'status_keluhan' => $status_keluhan
			];
		}
 
        // proses insert
    	$store = \App\Keluhan::insert($data);
		
    	return redirect()->back()->with('after_save', $after_save);
    }
	
	//Tambahan UPDATE --------------------------------------------------------------- //
	
	public function show($id_keluhan)
    {
        // mengambil semua users untuk di jadikan dropdwon list pemilik di form create
 
        //$users = \App\User::all();
 
        // melempar ke view di file create.blade.php yang berada di folder crud/kendaraan, sekaligus mengirim data user yang disimpan di variable $users dan data yg akan di edit yaitu $showById
    	$showById = \App\Keluhan::find($id_keluhan);
 
    	return view('crud.keluhan.edit', compact('showById'));
    }
 
    public function update(Request $request, $id_keluhan)
    {
        $validate = \Validator::make($request->all(), [
                'jenis_keluhan' => 'required',
                'isi_keluhan' => 'required'
            ],

            $after_update = [
                'alert' => 'danger',
                'title' => 'Tunggu dulu!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silakan coba lagi.'
            ]);

        if($validate->fails()){
            return redirect()->back()->with('after_update', $after_update);
        }

        $after_update = [
            'alert' => 'success',
            'title' => 'Bagus!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];
		
        if (!empty($request->anonim)){
			$data = [
				//'id_user' => $request->id_user,
				'jenis_keluhan' => $request->jenis_keluhan,
				'isi_keluhan' => $request->isi_keluhan,
				'keanoniman' => $request->anonim
			];
		} else {
			$data = [
				//'id_user' => $request->id_user,
				'jenis_keluhan' => $request->jenis_keluhan,
				'isi_keluhan' => $request->isi_keluhan,
				'keanoniman' => 0
			];
		}
 
        //proses update
        $update = \App\Keluhan::where('id_keluhan', $id_keluhan)->update($data);
 
        return redirect()->to('keluhan')->with('after_update', $after_update);
    }
	
	//Tambahan DELETE
	
	public function destroy($id)
	{
		//Cari
		$keluhans = \App\Keluhan::find($id); 
		
		//DELETE
		$keluhans->delete();
		return redirect('keluhan');
	}
	
}
