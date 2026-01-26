<x-app-layout>
    @push('css')
        <style>
            .processing {
                background: #3286e0
            }
            .completed {
                background:#0cba4c
            }
            .canceled {
                background: #b10d0d
            }
        </style>
    @endpush
    <x-slot name="header">
        <div class="flex align-items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('admin.donations') }}
            </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div
                        class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead
                                class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        #
                                    </th>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Donor
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Case
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        status
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Payed With
                                    </th>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Donate At
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donations as $donation)
                                    <tr class="bg-neutral-primary border-b border-default">
                                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>

                                        <td class="px-6 py-4">
                                            {{ $donation->donor->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $donation->case->title_trans }}
                                        </td>
                                        <td class="px-6 py-4">
                                            ${{ $donation->amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="capitalize text-white {{ $donation->status }} bg px-1 py-0.5 rounded">{{ $donation->status }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $donation->payment_gateway }}
                                        </td>


                                        <td class="px-6 py-4">
                                            {{ $donation->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 flex space-x-2 text-center">
                                            {{-- <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'show-donation-{{ $donation->id }}')">
                                                <i class="fas fa-eye"></i>
                                            </x-primary-button>
                                            <x-modal name="show-donation-{{ $donation->id }}" :show="$errors->isNotEmpty()"
                                                focusable>
                                                <div class="p-6">

                                                    {{ $donation->donation }}
                                                </div>
                                            </x-modal>
                                            <form action=" " method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit"><i class="fas fa-trash"></i></x-danger-button>
                                                </form> --}}
                                        </td>

                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center">
                                            No donations found.
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
