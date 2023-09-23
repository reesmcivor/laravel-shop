<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Coupon') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">

            <x-form :action="route('admin.shop.coupons.update', $coupon->id)" method="put">
                @bind($coupon)
                    @livewire('select-user', ['initialSelectedUsers' => $coupon->users])
                    <x-form-input name="code" label="Code" />
                    <x-form-select name="type" label="Type" :options="$types" />
                    <x-form-input name="amount" label="Value" />
                    <x-form-submit />
                @endbind
            </x-form>

        </div>
    </div>
</x-app-layout>
