<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Narration extends Model
{
	protected $table = 'narration';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'pat_regnno',
        'narration',
		'created_at',
        'status'
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}