<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Residents;
use App\Models\Pets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PetImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $petData = [
                'type_of_pets' => $row['type_of_pets'] ?? null,
                'breed' => $row['breed'] ?? null,
                'vaccinated' => $row['vaccinated'] ?? null,
                'age' => $row['age'] ?? null,
                'color' => $row['color'] ?? null,
            ];

            // Check if there is an existing resident with the provided email
            $resident = Residents::where('email', $row['email'])->first();

            if ($resident) {
                // Associate the pet with the resident by setting homeowner_id
                $petData['homeowner_id'] = $resident->id;

                // Create or update the pet
                Pets::updateOrCreate(['type_of_pets' => $petData['type_of_pets']], $petData);
            } else {
                // Handle the case where the resident with the given email is not found
                // You may log an error, skip the record, or take appropriate action
                // Example: Log::error('Resident not found for email: ' . $row['email']);
            }
        }
    }
}
