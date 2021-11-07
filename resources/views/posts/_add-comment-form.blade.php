@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full ">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <x-form.field>
                <textarea name="body"rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, think of something to say!" required></textarea>

                <x-form.error name="body" />
            </x-form.field>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <div class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
    </div>
@endauth
