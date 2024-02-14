<div class="container mx-auto ">

    <div class="flex items-center space-x-2 mb-4">
        <input type="text" wire:model.live="search" class="px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Search...">
        
        <select wire:model.live="pagination" class="px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>

    <table class="mx-auto border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <!-- Personal Information -->
            <th class="px-4 py-2">Full Name</th>

            <!-- Address Information -->
            <th class="px-4 py-2">Address</th>

            <!-- Religion -->
            <th class="px-4 py-2 ">Religion</th>

            <!-- Household Information -->
            <th class="px-4 py-2">Occupants</th>
            <th class="px-4 py-2">Status</th>

            <th class="px-4 py-2">Payment Status</th>
            <th class="px-4 py-2">Options</th>

            
        </tr>

        </thead>
        <tbody>
            @foreach ($residents as $resident)
            <tr class="border-b border-gray-300">
                <!-- Personal Information -->
                <td class="px-4 py-2">{{ $resident->first_name }} {{ $resident->middle_initial }} {{ $resident->last_name }}</td>

                <!-- Address Information -->
                <td class="px-4 py-2">Blk. {{ $resident->block }} lot {{ $resident->lot }} {{ $resident->street }} st.</td>

                <!-- Religion -->
                <td class="px-4 py-2">{{ $resident->religion }}</td>

                <!-- Household Information -->
                <td class="px-4 py-2">{{ $resident->household_size }}</td>
                <td class="px-4 py-2">{{ $resident->status }}</td>
                <td class="px-4 py-2">{{ $resident->payment_status }}</td>
                <td class="px-4 py-2">
                <a href="" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                @if($resident->status != 'tenant')
                <a href="{{ route('admin.residentForms.createTenant', ['residentId' => $resident->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Add Tenant
                </a>
                @endif
                <a href="{{ route('admin.resident.additionalInfo', ['residentId' => $resident->id]) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Additional Info
                </a>

                </td>
                
            </tr>

            
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $residents->links() }}
    </div>

</div>
