<div>
    <form wire:submit.prevent="addImage" enctype="multipart/form-data">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="url">Choisir une image</label>
        <input wire:model="url" accept="image/png, image/jpeg"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="url" type="file">

        @error('url')
            <span class="text-red-500 text-xs"> {{ $message }}</span>
        @enderror

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Ajouter une image
        </button>
    </form>

    <div wire:loading wire:target="addImage">
        <span class="text-green-500">En cours d'ajout...</span>
    </div>

    @if ($url)

     <img src="{{ $url->temporaryUrl() }}" alt="Image">
        
    @endif

    @foreach ($images as $uploadedFile)
        @if ($uploadedFile)
           
            <img src="{{ asset('public/' . $uploadedFile->url)}}" alt="Image">
        @endif
    @endforeach
</div>