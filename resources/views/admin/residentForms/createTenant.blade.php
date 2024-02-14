<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tenant Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-4">
                        <h1 class="text-2xl font-bold mb-4">Create Tenant</h1>

                        <form action="{{route('admin.residentForms.storeTenant')}}" method="post" class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
                            @csrf
                            
                            <input type="hidden" name="homeownerId" value="{{ $homeownerId }}">
                            <div class="mb-4">
                                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="middle_initial" class="block text-gray-700 text-sm font-bold mb-2">Middle Initial</label>
                                <input type="text" name="middle_initial" id="middle_initial" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>              
                            
                            <div class="mb-4">
                                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="relationship_to_homeowner" class="block text-gray-700 text-sm font-bold mb-2">Relationshp to Homeowner</label>
                                <input type="text" name="relationship_to_homeowner" id="relationship_to_homeowner" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="religion" class="block text-gray-700 text-sm font-bold mb-2">Religion</label>
                                <input type="text" name="religion" id="religion" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="text" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="household_size" class="block text-gray-700 text-sm font-bold mb-2">Household size</label>
                                <input type="text" name="household_size" id="household_size" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="occupation" class="block text-gray-700 text-sm font-bold mb-2">Occupation</label>
                                <input type="text" name="occupation" id="occupation" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="acknowledgement_on_community_rules" class="block text-gray-700 text-sm font-bold mb-2">Community rules compliance</label>
                                <input type="text" name="acknowledgement_on_community_rules" id="acknowledgement_on_community_rules" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="disability" class="block text-gray-700 text-sm font-bold mb-2">Disability</label>
                                <input type="text" name="disability" id="disability" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                                <input type="text" name="gender" id="gender" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>

                            <div class="mb-4">
                                <label for="violation" class="block text-gray-700 text-sm font-bold mb-2">Violation</label>
                                <input type="text" name="violation" id="violation" class="w-full p-2 border border-gray-300 rounded" required>
                            </div>


                            <!-- Add more form fields as needed -->

                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminApp-layout>
