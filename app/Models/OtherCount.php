<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OtherCount extends Model
{
	protected $table = 'other_count';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'other_count',
		'date',
		'created_at',
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}