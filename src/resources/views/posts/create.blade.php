<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Create New Post
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 px-4 sm:px-0">

        <form method="POST" action="/posts" class="space-y-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Title
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
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
                ></textarea>
            </div>

            <div class="text-right">
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent
                           rounded-md font-semibold text-white hover:bg-green-700 dark:hover:bg-green-600
                           focus:outline-none focus:ring focus:ring-green-300 dark:focus:ring-green-600 transition"
                >
                    Publish
                </button>
            </div>
        </form>
    </div>
</x-app-layout>