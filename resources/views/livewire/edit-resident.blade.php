<!-- resources/views/livewire/edit-resident.blade.php -->

<div>
    <form wire:submit.prevent="updateResident">
        <!-- Input fields for editing residents -->
        <input wire:model="first_name" type="text" placeholder="First Name">
        <input wire:model="middle_initial" type="text" placeholder="Middle Initial">
        <!-- Add other input fields as needed -->

        <!-- Submit button -->
        <button type="submit">Update Resident</button>
    </form>
</div>
