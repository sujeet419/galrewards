<?php

namespace App\Imports;

use App\Models\bonus_point;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Carbon\Carbon;

class BonusPointImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $email = Auth::user()->email;
	   $guserid = $row['pcc'].'-'.$row['sign_on'];
        return new bonus_point([
            'admin_id' => $email,
			'guserid' => $guserid,
            'pcc' => $row['pcc'],
			'sign_on' => $row['sign_on'],
            'bonus_point' => $row['bonus_point'],
            'bonus_reason' => $row['bonus_reason'],
			'bonus_date' => $row['bonus_date'],
        ]);
    }
}
