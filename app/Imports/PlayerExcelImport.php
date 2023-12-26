<?php

namespace App\Imports;

use App\Models\PlatformDetails;
use App\Models\UserRegistration;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class PlayerExcelImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    protected $totalCount = 0;    // Initialize the total count
    protected $duplicateCount = 0; // Initialize the duplicate count
    protected $correctlyAddedCount = 0;    // Initialize the failed count
    public function model(array $row)
    {
        $existingUser = UserRegistration::where('mobile', $row[2])->first();

        // You can add more validation conditions here
        if (!$existingUser && is_numeric($row[2]) && !empty($row[2])) {
            $branch_id = 1;
            $auth_id = Auth::user()->id;

            // Only add a new user if the mobile number doesn't already exist
            $user_register_id = UserRegistration::create([
                'name' => $row[3],
                'mobile' => $row[2],
                'branch_id' => $branch_id,
                'created_by' => $auth_id,
            ]);

            PlatformDetails::create([
                'player_id' => $user_register_id->id,
                'platform_id' => 1,
                'platform_username' => $row[1],
                'platform_password' => "dummy",
                'status' => "Active"
            ]);

            $this->correctlyAddedCount++; // Increment the total count for each record added
        } elseif ($existingUser) {
            $this->duplicateCount++; // Increment the duplicate count for each duplicate
        }
        $this->totalCount++; // Increment the total count for each record added

        return null; // Skip adding a duplicate user or failed record
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function getDuplicateCount()
    {
        return $this->duplicateCount;
    }

    public function getCorrectlyAddedCount()
    {
        return $this->correctlyAddedCount;
    }
}
