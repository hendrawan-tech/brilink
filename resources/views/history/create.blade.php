<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <form action="/histories" method="post">
                        @csrf
                        <div class="lg:flex justify-evenly gap-6 sm:block">
                            <div class="w-full">
                                <x-input-label for="nominal" :value="__('Nominal')" />
                                <x-text-input id="nominal" class="block mt-1 w-full" type="text" name="nominal"
                                    :value="old('nominal')" autofocus placeholder="Masukkan nominal..." />
                                <x-input-error :messages="$errors->get('nominal')" class="mt-2" />
                            </div>
                            <div class="w-full mt-4 lg:mt-0 lg:ms-24 sm:ms-0">
                                <x-input-label for="tipe_transaksi" :value="__('Tipe Transaksi')" />
                                <div class="flex items-center mb-1 mt-2">
                                    <input id="tipe_transaksi_setor" type="radio" value="Setor Tunai"
                                        name="tipe_transaksi"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe_transaksi') === 'Setor Tunai' ? 'checked' : '' }}>
                                    <label for="tipe_transaksi_setor" class="ms-2 text-sm font-medium">Setor
                                        Tunai</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="tipe_transaksi_tarik" type="radio" value="Tarik Tunai"
                                        name="tipe_transaksi"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe_transaksi') === 'Tarik Tunai' ? 'checked' : '' }}>
                                    <label for="tipe_transaksi_tarik" class="ms-2 text-sm font-medium">Tarik
                                        Tunai</label>
                                </div>
                                <x-input-error :messages="$errors->get('tipe_transaksi')" class="mt-2" />
                            </div>

                            <div class="w-full mt-4 lg:mt-0">
                                <x-input-label for="tipe" :value="__('Tipe')" />
                                <div class="flex items-center mb-1 mt-2">
                                    <input id="tipe_fee" type="radio" value="Fee" name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Fee' ? 'checked' : '' }}>
                                    <label for="tipe_fee" class="ms-2 text-sm font-medium">Fee</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="tipe_internal" type="radio" value="Internal" name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Internal' ? 'checked' : '' }}>
                                    <label for="tipe_internal" class="ms-2 text-sm font-medium">Internal</label>
                                </div>
                                <x-input-error :messages="$errors->get('tipe')" class="mt-2" />
                            </div>

                        </div>

                        <x-input-label class="mt-4" for="keterangan" :value="__('Keterangan')" />
                        <textarea id="message" rows="4" name="keterangan"
                            class="block p-2.5 mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Masukkan keterangan...">{{ old('keterangan') }}</textarea>
                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
