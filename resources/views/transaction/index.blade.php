<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="mb-5 flex justify-between">
                        <div>
                            <x-text-input class="py-2 text-xs min-w-56" placeholder="Pencarian..."></x-text-input>
                            <x-primary-button type="submit">
                                Cari
                            </x-primary-button>
                        </div>
                        <a href="/transactions/create">
                            <x-primary-button type="submit">
                                Tambah +
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Nama</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Tipe</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Status</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Nominal</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Tanggal</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Admin
                                            Bank</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Admin
                                            Agent</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">Keterangan</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse ($data as $item)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->tipe }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->nominal }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->tanggal }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->admin_bank }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->admin_agent }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->keterangan }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="3"
                                            class="px-6 py-4 text-center whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        {{ $data->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
