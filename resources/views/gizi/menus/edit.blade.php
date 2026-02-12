<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('gizi.menus.update', $menu) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')

                    <!-- Menu Details -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Target Sekolah & Identitas Menu</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <x-input-label for="school_id" :value="__('Target Sekolah Penerima')" />
                                <select id="school_id" name="school_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                                    <option value="">-- Pilih Sekolah --</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}" {{ old('school_id', $menu->school_id) == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('school_id')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="name" :value="__('Menu Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $menu->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date_served" :value="__('Date Served')" />
                                <x-text-input id="date_served" class="block mt-1 w-full" type="date" name="date_served" :value="old('date_served', $menu->date_served)" required />
                                <x-input-error :messages="$errors->get('date_served')" class="mt-2" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="description" :value="__('Menu Items (List Lauk Pauk)')" />
                                <textarea id="description" name="description" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $menu->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="photo" :value="__('Menu Photo')" />
                                @if($menu->photo_url)
                                <div class="mb-2">
                                    <img src="{{ $menu->photo_url }}" alt="Current Photo" class="h-20 w-20 object-cover rounded-md">
                                </div>
                                @endif
                                <input id="photo" name="photo" type="file" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current photo.</p>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Nutrition Facts -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Nutrition Facts (Per Serving)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                            <div>
                                <x-input-label for="calories" :value="__('Energy (kkal)')" />
                                <x-text-input id="calories" class="block mt-1 w-full" type="number" step="0.01" name="calories" :value="old('calories', $menu->nutritionFact->calories ?? 0)" required />
                                <x-input-error :messages="$errors->get('calories')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="protein" :value="__('Protein (g)')" />
                                <x-text-input id="protein" class="block mt-1 w-full" type="number" step="0.01" name="protein" :value="old('protein', $menu->nutritionFact->protein ?? 0)" required />
                                <x-input-error :messages="$errors->get('protein')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="carbohydrates" :value="__('Carbohydrates (g)')" />
                                <x-text-input id="carbohydrates" class="block mt-1 w-full" type="number" step="0.01" name="carbohydrates" :value="old('carbohydrates', $menu->nutritionFact->carbohydrates ?? 0)" required />
                                <x-input-error :messages="$errors->get('carbohydrates')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="fats" :value="__('Fats (g)')" />
                                <x-text-input id="fats" class="block mt-1 w-full" type="number" step="0.01" name="fats" :value="old('fats', $menu->nutritionFact->fats ?? 0)" required />
                                <x-input-error :messages="$errors->get('fats')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="fiber" :value="__('Serat (g)')" />
                                <x-text-input id="fiber" class="block mt-1 w-full" type="number" step="0.01" name="fiber" :value="old('fiber', $menu->nutritionFact->fiber ?? 0)" required />
                                <x-input-error :messages="$errors->get('fiber')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Update Menu') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>