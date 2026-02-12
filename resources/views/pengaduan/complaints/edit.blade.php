<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Respond to Complaint') }} : {{ $complaint->ticket_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Complaint Details (Read Only) -->
                <div class="md:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium border-b pb-2 mb-4">Complaint Details</h3>

                        <div class="mb-4">
                            <span class="block text-sm font-bold text-gray-700">Reporter:</span>
                            <span class="block">{{ $complaint->reporter_name ?? 'Anonymous' }} ({{ $complaint->reporter_contact ?? '-' }})</span>
                        </div>

                        <div class="mb-4">
                            <span class="block text-sm font-bold text-gray-700">Date:</span>
                            <span class="block">{{ $complaint->created_at->format('d M Y H:i') }}</span>
                        </div>

                        <div class="mb-4">
                            <span class="block text-sm font-bold text-gray-700">Content:</span>
                            <p class="mt-1 p-3 bg-gray-50 rounded-md border border-gray-100">{{ $complaint->content }}</p>
                        </div>

                        @if($complaint->photo_evidence)
                        <div class="mb-4">
                            <span class="block text-sm font-bold text-gray-700">Photo Evidence:</span>
                            <img src="{{ $complaint->photo_evidence }}" alt="Evidence" class="mt-2 rounded-lg max-w-full h-auto border">
                        </div>
                        @else
                        <div class="mb-4">
                            <span class="block text-sm text-gray-400 italic">No photo evidence provided.</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Response Form -->
                <div class="md:col-span-1 bg-white overflow-hidden shadow-sm sm:rounded-lg h-fit">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium border-b pb-2 mb-4">Update Status</h3>

                        <form action="{{ route('pengaduan.complaints.update', $complaint) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="process" {{ $complaint->status == 'process' ? 'selected' : '' }}>Process</option>
                                    <option value="done" {{ $complaint->status == 'done' ? 'selected' : '' }}>Done</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="response_note" :value="__('Response Note')" />
                                <textarea id="response_note" name="response_note" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Write your response here..." required>{{ old('response_note', $complaint->response_note) }}</textarea>
                                <x-input-error :messages="$errors->get('response_note')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end">
                                <x-primary-button class="w-full justify-center">
                                    {{ __('Update Complaint') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>