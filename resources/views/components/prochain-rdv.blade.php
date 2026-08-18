<div class="bg-blue-900 rounded-2xl p-6 text-white h-full">

    <h3 class="text-sm font-semibold uppercase tracking-wide">
        PROCHAIN RENDEZ-VOUS
    </h3>

    @if($prochainRdv)

        <div class="mt-6">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center">
                    <ion-icon
                        name="calendar-outline"
                        class="text-2xl">
                    </ion-icon>
                </div>

                <div>
                    <p class="font-semibold text-lg">
                        Dr. {{ $prochainRdv->medecin->user->name ?? 'Médecin' }}
                    </p>

                    <p class="text-blue-100 text-sm mt-1">
                        {{ $prochainRdv->date }}
                    </p>
                </div>

            </div>

        </div>

    @else

        <div class="mt-8 flex flex-col items-center justify-center text-center">

            <ion-icon
                name="calendar-outline"
                class="text-4xl text-blue-200">
            </ion-icon>

            <p class="text-blue-100 mt-3">
                Aucun rendez-vous à venir.
            </p>

        </div>

    @endif

</div>