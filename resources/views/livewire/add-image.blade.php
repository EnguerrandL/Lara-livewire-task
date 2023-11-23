<div  class="  w-50">


    @if (session('alert'))
        <div role="alert">
            <div class="bg-red-500  text-white font-bold rounded-t px-4 py-2">
                Info
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ session('alert') }}</p>
            </div>
        </div>
    @endif
    <form wire:submit.prevent="addImage" enctype="multipart/form-data">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="url">Choisir une
            image</label>
        <input wire:model="url" accept="image/png, image/jpeg"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="url" type="file">

            <input wire:model="name" type="text">

        @error('url')
            <span class="text-red-500 text-xs"> {{ $message }}</span>
        @enderror

        {{-- wire:loading.remove --}}

        <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Ajouter une image
        </button>
    </form>

    <div wire:loading.delay wire:target="addImage">
        <span class="text-green-500">En cours d'ajout...</span>
    </div>




    @if ($url)
        <img class="transition ease-in-out delay-150" src="{{ $url->temporaryUrl() }}" alt="Image">
    @endif

    @foreach ($images as $uploadedFile)
        @if ($uploadedFile)
            <div class="relative">
                <img src="{{ asset($uploadedFile->imgUrl()) }}" alt="Image">


                <button wire:click="delete({{ $uploadedFile->id }})"
                    class="absolute top-0 right-0  text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
        @endif
    @endforeach
</div>
