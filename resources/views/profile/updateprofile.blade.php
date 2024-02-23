<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Profile</h1>

            <form method="post" action="/profile/update" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                        value="{{ auth()->user()->name }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                        value="{{ auth()->user()->email }}" required>

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Reset Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required>

                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-50001">
                        Update information
                    </button>
                </div>
            </form>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Avatar
                </label>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Select an image for your profile.") }}
                </p>
                <img src="/{{ auth()->user()->avatar }}" width="150px" height="150px">

                <form method="post" action="/profile/updateAvatar" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="avatar" :value="__('Avatar')"></label>
                        <input id="avatar" name="avatar" type="file" class="mt-1 block w-full" required autofocus />

                    </div>
                    <div class="mb-6">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-50001">
                            Update Avatar
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </section>
</x-layout>