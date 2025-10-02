<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 px-4 sm:px-0">

        <form method="POST" action="/posts/{{ $post->id }}" class="space-y-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Title
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $post->title) }}"
                    required
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2
                           bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100
                           focus:outline-none focus:ring focus:ring-blue-500 dark:focus:ring-blue-400"
                />
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Content
                </label>
                <textarea
                    name="content"
                    id="content"
                    rows="6"
                    required
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2
                           bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100
                           focus:outline-none focus:ring focus:ring-blue-500 dark:focus:ring-blue-400"
                >{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <a
                    href="/posts/{{ $post->id }}"
                    class="text-gray-600 dark:text-gray-400 hover:underline"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent
                           rounded-md font-semibold text-white hover:bg-blue-700 dark:hover:bg-blue-600
                           focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-600 transition"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>