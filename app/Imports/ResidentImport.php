<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Residents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // Define the mapping of Excel columns to database columns
        $columnMapping = [
            'email' => 'email',
            'block' => 'block',
            'lot' => 'lot',
            'street' => 'street',
            'first_name' => 'first_name',
            'middle_initial' => 'middle_initial',
            'last_name' => 'last_name',
            'religion' => 'religion',
            'phone_number' => 'phone_number',
            'household_size' => 'household_size',
            'occupation' => 'occupation',
            'status' => 'status',
            'acknowledgement_on_community_rules' => 'acknowledgement_on_community_rules',
            'disability' => 'disability',
            'gender' => 'gender',
            'payment_status' => 'payment_status',
            'violation' => 'violation',
            'relationship_to_homeowner' => 'relationship_to_homeowner'
        ];

        foreach ($rows as $row) {
            
            // Map Excel columns to database columns dynamically
            $mappedRow = [];
            foreach ($columnMapping as $excelColumn => $dbColumn) {
                $mappedRow[$dbColumn] = $row[$excelColumn] ?? null;
            }

            // Check if the resident exists based on email
            $existingResident = Residents::where('email', $mappedRow['email'])->first();
            if ($existingResident) {
                // Update the existing resident
                $updateResult = $existingResident->update($mappedRow);

                if ($updateResult) {
                    $homeowner = $existingResident;
                } else {
                    dd('Failed to update existing resident:', $mappedRow);
                }
            } else {
                // Create a new resident
                $createResult = Residents::create($mappedRow);
                if ($createResult) {
                    $homeowner = $createResult;
                    
                } else {
                    dd('Failed to create new resident:', $mappedRow);
                }
            }

            // Check if the resident is a tenant
            if ($mappedRow['status'] === 'tenant') {
                // Find the corresponding homeowner using block, lot, and street
                $homeownerOfTenant = Residents::where([
                    'block' => $mappedRow['block'],
                    'lot' => $mappedRow['lot'],
                    'street' => $mappedRow['street'],
                    'status' => 'owned', // Assuming status 'owned' for homeowners
                ])->first();

                // Associate the tenant with the homeowner
                if ($homeownerOfTenant) {
                    $homeowner->update(['homeowner_id' => $homeownerOfTenant->id]);
                }
            }
        }
    }
}

