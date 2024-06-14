<div>
    <x-slot name="header">
        <div class="px-12 flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post
            </h2>
            <a wire:navigate href="{{ route('posts.index') }}" class="px-4 py-2 rounded-md bg-indigo-500 text-white">All
                Posts</a>
        </div>
    </x-slot>
    <div class="w-1/2 bg-white mx-auto mt-2 px-5 py-4">
        @if (session('status'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
            </div>
        @endif
        <form class="w-full mx-auto">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input wire:model='form.title' type="text" id="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
                @error('form.title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                <input wire:model='form.image'
                    class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    id="default_size" type="file">
                @error('form.image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50
                    <div class="px-4
                    py-2 bg-white rounded-b-lg dark:bg-gray-800">
                    <textarea wire:model='form.content' id="editor" rows="8"
                        class="block w-full px-0 text-sm text-gray-800 bg-white border-0 focus:ring-0 
                        placeholder="Write
                        an article..."></textarea>
                </div>
                @error('form.content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button wire:click='save' type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add
                Post</button>
    </div>
    </form>
</div>
</div>
