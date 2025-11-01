<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Lead') }}
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
                    
                    <form action="{{ route('leads.update', $lead) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Sama seperti create form, tapi dengan value dari $lead -->
                        <!-- Copy semua fields dari create.blade.php dan ubah value="{{ old('name') }}" menjadi value="{{ old('name', $lead->name) }}" -->
                        
                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('leads.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-dms-orange hover:bg-orange-600 text-white font-bold py-2 px-6 rounded">
                                Update Lead
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>