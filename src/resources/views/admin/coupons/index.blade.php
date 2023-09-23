<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Coupons') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
        <x-crud.data-table
            :items="$coupons->items()"
            title="Coupons"
            description="Manage coupons"
            :columns="[
                ['name' => 'code', 'label' => 'Code', 'attribute' => 'code'],
                ['name' => 'type', 'label' => 'Type', 'attribute' => 'type'],
                ['name' => 'amount', 'label' => 'Amount', 'attribute' => 'amount'],
                ['name' => 'users', 'label' => 'Users', 'callback' =>
                    function($coupon) {
                        return implode(', ', $coupon->users->pluck('name')->toArray());
                    }
                ],
            ]"
            route-prefix="admin.shop.coupons"
        />
    </div>
</x-app-layout>
