<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RadioCount extends Model
{
	protected $table = 'radiology_count';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'radiology_count',
		'date',
		'created_at',
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}