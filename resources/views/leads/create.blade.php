<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Lead Baru') }}
            </h2>
            <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    
                    <form action="{{ route('leads.store') }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('name') border-red-500 @enderror"
                                required
                            >
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('email') border-red-500 @enderror"
                                required
                            >
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('phone') border-red-500 @enderror"
                                required
                            >
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Company -->
                        <div class="mb-4">
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">
                                Perusahaan
                            </label>
                            <input 
                                type="text" 
                                id="company" 
                                name="company" 
                                value="{{ old('company') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('company') border-red-500 @enderror"
                            >
                            @error('company')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Source -->
                        <div class="mb-4">
                            <label for="source" class="block text-sm font-medium text-gray-700 mb-1">
                                Sumber Lead
                            </label>
                            <select 
                                id="source" 
                                name="source" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('source') border-red-500 @enderror"
                            >
                                <option value="">-- Pilih Sumber --</option>
                                <option value="Website Form" {{ old('source') == 'Website Form' ? 'selected' : '' }}>Website Form</option>
                                <option value="Referral" {{ old('source') == 'Referral' ? 'selected' : '' }}>Referral</option>
                                <option value="LinkedIn" {{ old('source') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                <option value="Cold Call" {{ old('source') == 'Cold Call' ? 'selected' : '' }}>Cold Call</option>
                                <option value="Email Campaign" {{ old('source') == 'Email Campaign' ? 'selected' : '' }}>Email Campaign</option>
                                <option value="Trade Show" {{ old('source') == 'Trade Show' ? 'selected' : '' }}>Trade Show</option>
                            </select>
                            @error('source')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="status" 
                                name="status" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('status') border-red-500 @enderror"
                                required
                            >
                                @foreach($statuses as $status)
                                    <option value="{{ $status['value'] }}" {{ old('status', 'new') == $status['value'] ? 'selected' : '' }}>
                                        {{ $status['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Assigned To -->
                        <div class="mb-4">
                            <label for="assigned_to" class="block text-sm font-medium text-gray-700 mb-1">
                                Assigned To
                            </label>
                            <select 
                                id="assigned_to" 
                                name="assigned_to" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('assigned_to') border-red-500 @enderror"
                            >
                                <option value="">-- Tidak Ada --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                                Pesan / Kebutuhan
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="4"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                                Catatan Internal
                            </label>
                            <textarea 
                                id="notes" 
                                name="notes" 
                                rows="3"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-dms-orange focus:ring-dms-orange @error('notes') border-red-500 @enderror"
                                placeholder="Catatan untuk staff internal..."
                            >{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-dms-orange hover:bg-orange-600 text-white font-bold py-2 px-6 rounded">
                                Simpan Lead
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>