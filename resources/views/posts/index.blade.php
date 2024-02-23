<x-layout>


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @auth
<x-panel class="max-w-xl mt-0">
    <form method="POST" action="/posts">
        @csrf
        <header class="flex items-center">
            <img src="/{{ auth()->user()->avatar }}" alt="" width="40" height="40" class="rounded-xl">

            <h2 class="ml-4">Want to status ?</h2>
        </header>

        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Quick, thing of something to say!" required></textarea>
            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 w-xl ">


            <x-submit-button>Post</x-submit-button>
        </div>
    </form>
</x-panel>
@endauth
    @include ('posts._header')
        @if ($posts->count())
        <x-posts-grid :posts="$posts" />
        {{ $posts->links() }}
        @else
        <p class="text-center">No posts yet. Plese check back later.</p>
        @endif
    </main>
</x-layout>