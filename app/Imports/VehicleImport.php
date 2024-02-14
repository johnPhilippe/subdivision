<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Residents;
use App\Models\Vehicles;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $vehicleData = [
                'type' => $row['type'] ?? null,
                'model' => $row['model'] ?? null,
                'make' => $row['make'] ?? null,
                'plate_number' => $row['plate_number'] ?? null,
                'color' => $row['color'] ?? null,
                'sticker_number' => $row['sticker_number'] ?? null,
            ];

            // Check if there is an existing resident with the provided email
            $resident = Residents::where('email', $row['email'])->first();

            if ($resident) {
                // Associate the pet with the resident by setting homeowner_id
                $vehicleData['homeowner_id'] = $resident->id;

                // Create or update the pet
                Vehicles::updateOrCreate(['type' => $vehicleData['type']], $vehicleData);
            } else {
                // Handle the case where the resident with the given email is not found
                // You may log an error, skip the record, or take appropriate action
                // Example: Log::error('Resident not found for email: ' . $row['email']);
            }
        }
    }
}
