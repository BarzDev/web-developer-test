<x-layout>
    <x-slot name="header">
        {{ __('Cruds Edit') }}
    </x-slot>

    <x-panel>
        <x-splade-form :default="['title' => $crud->title, 'content' => $crud->content]" :action="route('cruds.update', $crud->id)" class="flex flex-col gap-4" method="put">
            <div class="flex gap-4">
                {{-- form input --}}
                <div class="w-1/2 flex flex-col gap-4">
                    <div class="border-b p-2">
                        <h1 class="text-lg text-gray-700 font-semibold">UPDATE DATA</h1>
                    </div>
                    <x-splade-file name="image" :show-filename="true" label="Image" />
                    <x-splade-input name="name" type="text" label="Name" placeholder="{{ $crud->name }}"/>
                    <x-splade-select name="position" label="Position">
                    <option value="" disabled selected>Select Position</option>
                        <option value="Manager">Manager</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Sales">Sales</option>
                    </x-splade-select>
                    <div class="flex gap-2 items-center">
                        <button type="submit"
                            class="bg-indigo-500 text-white p-2 rounded-md text-sm flex items-center gap-1 hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-device-floppy w-4 h-4" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                            </svg>
                            Update
                        </button>
                        <Link href="/cruds"
                        class="btn btn-danger p-2 text-white rounded-md text-sm flex items-center gap-1 hover:bg-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-arrow-narrow-left w-4 h-4" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l14 0"></path>
                            <path d="M5 12l4 4"></path>
                            <path d="M5 12l4 -4"></path>
                        </svg>
                        Back
                        </Link>
                    </div>
                </div>
                {{-- preview image --}}
                <div class="w-1/2">
                    <div class="flex flex-col gap-4" v-if="form.image">
                        <div class="border-b p-2">
                            <h1 class="text-lg text-gray-700 font-semibold">PREVIEW IMAGE</h1>
                        </div>
                        <img v-if="form.image" :src="form.$fileAsUrl('image')" class="rounded-md" />
                    </div>
                </div>
            </div>
        </x-splade-form>
    </x-panel>
</x-layout>