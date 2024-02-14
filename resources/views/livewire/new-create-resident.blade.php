<!-- resources/views/livewire/create-resident.blade.php -->

<div>
    <form wire:submit.prevent="createResident">
        <!-- Input fields for creating residents -->
        <input wire:model="block" type="text" placeholder="block">
        <input wire:model="lot" type="text" placeholder="lot">
        <input wire:model="street" type="text" placeholder="street">
        <input wire:model="first_name" type="text" placeholder="First Name">
        <input wire:model="middle_initial" type="text" placeholder="middle initial">
        <input wire:model="last_name" type="text" placeholder="last Name">
        <input wire:model="religion" type="text" placeholder="religion">
        <input wire:model="email" type="text" placeholder="email">
        <input wire:model="phone_number" type="text" placeholder="phone number">
        <input wire:model="household_size" type="text" placeholder="household size">
        <input wire:model="occupation" type="text" placeholder="occupation">
        <input wire:model="status" type="text" placeholder="status">
        <input wire:model="acknowledgement_on_community_rules" type="text" placeholder="Community rules compliance">
        <input wire:model="disability" type="text" placeholder="disability">
        <input wire:model="gender" type="text" placeholder="gender">
        <input wire:model="payment_status" type="text" placeholder="payment status">
        <input wire:model="violation" type="text" placeholder="violation">
        <!-- Add other input fields as needed -->

        <!-- Submit button -->
        <button type="submit">Create Resident</button>
    </form>
    @if(session()->has('message'))
    <div>{{ session('message') }}</div>
    @endif
</div>