    <div class="w-full rounded-xl bg-gray-50 dark:bg-gray-700">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($users as $user)
                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-lg shadow-lg p-12 flex flex-col justify-center items-center">
                    <div class="mb-8">
                        <img class="object-center object-cover rounded-full h-36 w-36" src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
                    </div>
                    <div class="text-center">
                        <p class="text-xl text-gray-500 font-bold mb-2">{{$user->name}}</p>
                        <p class="text-base text-gray-400 font-normal">{{$user->email}}</p>
                        <p class="text-xs text-gray-400 font-normal y-2"> Contributions: <span>{{$user->post_count}} </span></p>
                    </div>
                </div>

                @empty <p class="font-semibold">Nothing to show.. </p>
                @endforelse

            </div>
        </section>
    </div>