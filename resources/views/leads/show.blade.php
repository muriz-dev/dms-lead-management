<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Lead') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('leads.edit', $lead) }}" class="bg-dms-orange hover:bg-orange-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Lead Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $lead->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Lead ID: #{{ $lead->id }}</p>
                        </div>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $lead->status->color() }}">
                            {{ $lead->status->label() }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Contact Information -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 uppercase mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-dms-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Informasi Kontak
                            </h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-500">Email</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="mailto:{{ $lead->email }}" class="text-blue-600 hover:text-blue-800">{{ $lead->email }}</a>
                                    </p>
                                </div>
                                
                                <div>
                                    <p class="text-xs text-gray-500">Telepon</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="tel:{{ $lead->phone }}" class="text-blue-600 hover:text-blue-800">{{ $lead->phone }}</a>
                                    </p>
                                </div>
                                
                                <div>
                                    <p class="text-xs text-gray-500">Perusahaan</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $lead->company ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lead Details -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 uppercase mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-dms-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Detail Lead
                            </h4>
                            
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-500">Sumber</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $lead->source ?? '-' }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-xs text-gray-500">Assigned To</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $lead->assignedUser->name ?? 'Belum ditugaskan' }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-xs text-gray-500">Tanggal Dibuat</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $lead->created_at->format('d F Y, H:i') }}</p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500">Terakhir Diupdate</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $lead->updated_at->format('d F Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Message / Kebutuhan -->
            @if($lead->message)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6">
                        <h4 class="text-sm font-semibold text-gray-700 uppercase mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-dms-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Pesan / Kebutuhan
                        </h4>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $lead->message }}</p>
                    </div>
                </div>
            @endif

            <!-- Internal Notes -->
            @if($lead->notes)
                <div class="bg-yellow-50 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-yellow-400">
                    <div class="p-6">
                        <h4 class="text-sm font-semibold text-gray-700 uppercase mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Catatan Internal
                        </h4>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $lead->notes }}</p>
                    </div>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-3">
                <form action="{{ route('leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Lead
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>