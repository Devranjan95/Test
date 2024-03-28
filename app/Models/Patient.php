<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	protected $table = 'patients';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'pat_name',
		'pat_regno',
		'pat_phno',
		'pat_email',
		'pat_gender',
		'dob',
        'pat_age',
        'total_visit',
        'created_at',
        'status'
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
