<?php

namespace App\Imports;

use App\Models\point;
use App\Models\register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
use Mail;

class PointsImports implements ToModel,WithHeadingRow
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
        return new point([
            'admin_id' => $email,
            'sign_on' => $row['sign_on'],
            'pcc' => $row['pcc'],
            'points' => $row['points'],
            'guserid' => $guserid,
            'point_date' => $row['point_date'],
        ]);


    }
}
