<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 space-y-8">

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-700 dark:text-gray-300">{{ $post->content }}</p>
            <small class="block text-gray-500 dark:text-gray-400 mt-4">
                By {{ $post->user->name ?? 'Guest' }} • {{ $post->created_at->diffForHumans() }}
            </small>
        </div>

        @auth
    @if (auth()->id() === $post->user_id)
        <div class="flex justify-end space-x-4">
            <a
            href="/posts/{{ $post->id }}/edit"
            class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition"
            >
                Edit Post
            </a>
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
                >
                    Delete Post
                </button>
            </form>
        </div>
    @endif
@endauth

        <div>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Comments</h3>

            @forelse ($post->comments as $comment)
                <div class="border dark:border-gray-700 rounded p-4 mb-4 bg-white dark:bg-gray-800">
                    <p class="text-gray-800 dark:text-gray-100">{{ $comment->comment }}</p>
                    <small class="italic text-gray-500 dark:text-gray-400 block mt-2">
                        By {{ $comment->user->name ?? 'Guest' }}
                    </small>

                    @auth
                        @if (auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                            <form method="POST" action="/comments/{{ $comment->id }}" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-600 hover:text-red-800 font-medium transition">
                                    Delete Comment
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Leave a Comment</h3>
            <form method="POST" action="/posts/{{ $post->id }}/comments" class="space-y-4">
                @csrf
                <textarea
                    name="comment"
                    rows="4"
                    required
                    class="w-full border dark:border-gray-700 rounded p-3 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                    placeholder="Write your comment…"></textarea>
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Submit
                </button>
            </form>
        </div>

    </div>
</x-app-layout>