<div class="bg-white rounded-2xl shadow-md p-6 h-full">

    <div class="flex items-center justify-between">

        <div>
            <h3 class="text-gray-500 text-sm">
                {{ $titre }}
            </h3>

            <h2 class="text-3xl font-bold mt-2">
                {{ $nombre }}
            </h2>

            <p class="text-gray-400 text-sm mt-1">
                {{ $description }}
            </p>
        </div>

        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-3xl text-blue-600">
            {{ $slot }}
        </div>

    </div>

</div>