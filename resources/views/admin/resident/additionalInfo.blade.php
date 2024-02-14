<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $resident->first_name }}'s Records
            @if($resident->status === 'owned')
                (Homeowner)
            @elseif($resident->status === 'tenant')
                (Tenant)
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="bg-gray-200 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Vehicle Information</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                        @foreach ($vehicles as $vehicles)
                            <p class="text-gray-700 mb-2"><span class="font-bold">Name:</span> {{ $resident->first_name }} {{ $resident->middle_initial }} {{ $resident->last_name }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Type:</span> {{ $vehicles->type }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Model:</span> {{ $vehicles->model }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Make:</span> {{ $vehicles->make }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Color:</span> {{ $vehicles->color }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Plate number:</span> {{ $vehicles->plate_number }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Sticker number:</span> {{ $vehicles->sticker_number }}</p>
                            <a href="{{ route('admin.resident.editVehicle',['homeownerId' => $resident->id, 'vehicleId' => $vehicles->id]) }}" class="inline-block bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Edit Vehicle Information
                            </a>
                        @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.resident.createVehicle', ['homeownerId' => $resident->id]) }}" class="inline-block bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Add Vehicle Information
                        </a>

                        
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="bg-gray-200 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Pet Information</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                        @foreach ($pets as $pets)
                            <p class="text-gray-700 mb-2"><span class="font-bold">Name:</span> {{ $resident->first_name }} {{ $resident->middle_initial }} {{ $resident->last_name }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Type:</span> {{ $pets->type_of_pets }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Breed:</span> {{ $pets->breed }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Vaccinated:</span> {{ $pets->vaccinated }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Age:</span> {{ $pets->age }}</p>
                            <p class="text-gray-700 mb-2"><span class="font-bold">Color:</span> {{ $pets->color }}</p>
                            

                            <a href="{{ route('admin.resident.editPet',['homeownerId' => $resident->id, 'petId' => $pets->id]) }}" class="inline-block bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Edit Pet Information
                            </a>
                        @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.resident.createPet', ['homeownerId' => $resident->id]) }}" class="inline-block bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Add Pet Information
                        </a>

                        
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

</x-adminApp-layout>
