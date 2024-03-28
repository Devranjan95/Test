<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TestSubCategory extends Model
{
	protected $table = 'test_subcategory';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'test_subcategory_name',
		'test_subcategory_code',
        'test_category',
		'created_at',
		'updated_at',
		'status'
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
