<?php

namespace App\Imports;

use app\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        // Map the columns from the Excel file to the User model attributes.
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            // Add any additional columns as needed.
        ]);
    }
}
