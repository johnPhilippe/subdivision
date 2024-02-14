<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resident Information') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <h4 class="text-2xl font-semibold mb-2">Import Resident/tenant Data</h4>
                
                <form action="{{ url('resident/import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf

                    <label for="import_file" class="block text-sm font-medium text-gray-700">Choose Excel File</label>
                    <input type="file" name="import_file" id="import_file" class="mt-1 p-2 border rounded-md" />
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Import</button>
                </form>

                <h4 class="text-2xl font-semibold mb-2">Import Pet Data</h4>

                <form action="{{ url('resident/petImport') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf

                    <label for="import_file" class="block text-sm font-medium text-gray-700">Choose Excel File</label>
                    <input type="file" name="import_file" id="import_file" class="mt-1 p-2 border rounded-md" />
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Import</button>
                </form>

                <h4 class="text-2xl font-semibold mb-2">Import Vehicle Data</h4>

                <form action="{{ url('resident/vehicleImport') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf

                    <label for="import_file" class="block text-sm font-medium text-gray-700">Choose Excel File</label>
                    <input type="file" name="import_file" id="import_file" class="mt-1 p-2 border rounded-md" />
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Import</button>
                </form>

                <hr class="my-4">
                
                <x-nav-link :href="route('admin.residentForms.createResident')" :active="request()->routeIs('admin.residentForms.createResident')">
                    INSERT RESIDENT RECORD
                </x-nav-link>
                @livewire('resident-search')
                
            </div>
        </div>
    </div>
</x-adminApp-layout>
