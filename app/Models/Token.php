<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
	protected $table = 'tokens';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'

	];

	protected $fillable = [
		'pat_regno',
		'tok_no',
		'test_category',
		'test_subcategory',
		'test_name',
        'test_charge',
		'discount',
		'final_price',
        'test_result',
        'test_comments',
        'date_of_testing',
        'status'
	];

	

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
