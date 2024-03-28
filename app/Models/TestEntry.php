<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TestEntry extends Model
{
	protected $table = 'test_entry';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'test_name',
		'test_subcategory',
		'test_category',
		'test_code',
		'max_val',
        'min_val',
        'test_time',
        'test_price',
        'discounts',
		'fprice',
        'gst',
        'created_at',
        'updated_at',
        'status'
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
