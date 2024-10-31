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
                    <form action="/transactions" method="post">
                        @csrf
                        <div class="lg:flex justify-evenly gap-6 sm:block">
                            <div class="w-full">
                                <x-input-label for="nama" :value="__('Nama')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                    :value="old('nama')" autofocus placeholder="Masukkan nama..." />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="nominal" :value="__('Nominal')" />
                                <x-text-input id="nominal" class="block mt-1 w-full" type="text" name="nominal"
                                    :value="old('nominal')" autofocus placeholder="Masukkan nominal..." />
                                <x-input-error :messages="$errors->get('nominal')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="tanggal" :value="__('Tanggal')" />
                                <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal"
                                    :value="old('tanggal')" autofocus placeholder="Masukkan admin tanggal..." />
                                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                            </div>
                        </div>

                        <div class="lg:flex justify-evenly gap-6 sm:block mt-4">
                            <div class="w-full">
                                <x-input-label for="admin_bank" :value="__('Admin Bank')" />
                                <x-text-input id="admin_bank" class="block mt-1 w-full" type="text" name="admin_bank"
                                    :value="old('admin_bank')" autofocus placeholder="Masukkan admin bank..." />
                                <x-input-error :messages="$errors->get('admin_bank')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="admin_agent" :value="__('Admin Agent')" />
                                <x-text-input id="admin_agent" class="block mt-1 w-full" type="text"
                                    name="admin_agent" :value="old('admin_agent')" autofocus
                                    placeholder="Masukkan admin agent..." />
                                <x-input-error :messages="$errors->get('admin_agent')" class="mt-2" />
                            </div>
                            <div class="w-full mt-4 lg:mt-0">
                                <x-input-label for="setor_tunai" :value="__('Tipe')" />
                                <div class="flex items-center mb-1 mt-2">
                                    <input id="setor_tunai" type="radio" value="Setor Tunai" name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Setor Tunai' ? 'checked' : '' }}>
                                    <label for="setor_tunai" class="ms-2 text-sm font-medium">Setor Tunai</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="tarik_tunai" type="radio" value="Tarik Tunai" name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Tarik Tunai' ? 'checked' : '' }}>
                                    <label for="tarik_tunai" class="ms-2 text-sm font-medium">Tarik Tunai</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="tarik_tunai_nasabah" type="radio" value="Tarik Tunai Nasabah"
                                        name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Tarik Tunai Nasabah' ? 'checked' : '' }}>
                                    <label for="tarik_tunai_nasabah" class="ms-2 text-sm font-medium">Tarik Tunai
                                        Nasabah</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="cek_saldo" type="radio" value="Cek Saldo" name="tipe"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('tipe') === 'Cek Saldo' ? 'checked' : '' }}>
                                    <label for="cek_saldo" class="ms-2 text-sm font-medium">Cek Saldo</label>
                                </div>
                                <x-input-error :messages="$errors->get('tipe')" class="mt-2" />
                            </div>
                            <div class="w-full mt-4 lg:mt-0">
                                <x-input-label for="status" :value="__('status')" />
                                <div class="flex items-center mb-1 mt-2">
                                    <input id="lunas" type="radio" value="Lunas" name="status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('status') === 'Lunas' ? 'checked' : '' }}>
                                    <label for="lunas" class="ms-2 text-sm font-medium">Lunas</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="belum_lunas" type="radio" value="Belum Lunas" name="status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                        {{ old('status') === 'Belum Lunas' ? 'checked' : '' }}>
                                    <label for="belum_lunas" class="ms-2 text-sm font-medium">Belum Lunas</label>
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
