<?php

namespace App\Imports;

use App\Models\register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class RegisterImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $email = Auth::user()->email;   
        $password = $row['first_name'].'@123';
        $closing_bal = $row['points'];
		$guserid = $row['pcc'].'-'.$row['sign_on'];
        return new register([
            'admin_id' => $email,
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'password' => $password,
            'country_name' => $row['country_name'],
            'date_of_birth' => $row['date_of_birth'],
            'contact' => $row['contact'],
            'points' => $row['points'],
            'closing_bal' => $closing_bal,
			'agency_group' => $row['agency_group'],
            'pcc' => $row['pcc'],
            'sign_on' => $row['sign_on'],
			'guserid' =>$guserid,
        ]);
    }
}
