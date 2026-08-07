<div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">

    <div class="flex items-center gap-4">

        <div class="w-14 h-14 rounded-full bg-blue-200 flex items-center justify-center">

            <span class="text-xl font-bold">
                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
            </span>

        </div>

        <div>

            <h2 class="font-bold text-xl">

                {{ Auth::user()->name }}

            </h2>

            <p class="text-gray-500">

                Patient

            </p>

        </div>

    </div>

    <a href="" class="text-gray-300 font-semibold">

        Déconnexion

    </a>

</div>