<div>
    <x-slot name="header">
        <div class="px-12 flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
            <a wire:navigate href="{{ route('posts.create') }}" class="px-4 py-2 rounded-md bg-indigo-500 text-white">New
                Posts</a>
        </div>
    </x-slot>

    <div class="relative overflow-x-auto px-5 py-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->author->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->slug }}
                        </td>
                        <td class="px-6 py-4">

                            <img src="{{ Storage::url($post->image) }}" class="rounded-md shadow-lg shadow-amber-300"
                                width="50" height="50" alt="">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <input {{ $post->published_at ? 'checked' : '' }} id="checked-checkbox" type="checkbox"
                                    value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500focus:ring-2">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <a wire:navigate href="{{ route('posts.edit', $post->id) }}"
                                    class=" text-xs focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-4 py-2 me-2 mb-2">Edit</a>
                                <button wire:click="delete({{ $post->id }})"
                                    wire:confirm="Are you sure you want to delete this post?" type="button"
                                    class="
                                    text-xs focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4
                                    focus:ring-red-300 font-medium rounded-lg px-4 py-2 me-2 mb-2 ">Delete</button>
                            </div>

                        </td>
                    </tr>
                @empty
                    <td class="colspan-5">No Posts</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
