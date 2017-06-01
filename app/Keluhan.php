<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
	public $timestamps = true;
	protected $primaryKey = 'id_keluhan';
    protected $table = 'keluhans';
	protected $fillable = [
    	'id_user',
		'jenis_keluhan',
		'isi_keluhan',
		'keanoniman',
		'status_keluhan',
		'created_at',
		'updated_at'
    ];
		
    /**
     * Untuk mendapatkan data yang berelasi
     */
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
	public function jeniskeluhan()
    {
        return $this->belongsTo(JenisKeluhan::class, 'jenis_keluhan');
    }
	
	public function statuskeluhan()
    {
        return $this->belongsTo(StatusKeluhan::class, 'status_keluhan');
    }
}
