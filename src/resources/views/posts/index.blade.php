<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            All Posts
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 space-y-6 px-4 sm:px-0">
        @forelse ($posts as $post)
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-xl font-bold text-blue-700 dark:text-blue-400 hover:underline">
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">
                    {{ Str::limit($post->content, 150) }}
                </p>
                <small class="text-gray-500 dark:text-gray-400 block mt-3">
                    By {{ $post->user->name ?? 'Guest' }} • {{ $post->created_at->diffForHumans() }}
                </small>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">No posts found.</p>
        @endforelse

        <div class="pt-4">
            <a
                href="/posts/create"
                class="inline-block bg-green-600 dark:bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 dark:hover:bg-green-600 transition">
                Create New Post
            </a>
        </div>
    </div>
</x-app-layout>