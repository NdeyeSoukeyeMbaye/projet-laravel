<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

    {{-- Titre --}}
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">

                <ion-icon
                    name="medical-outline"
                    class="text-2xl text-green-600">
                </ion-icon>

            </div>

            <h2 class="text-lg font-semibold text-gray-800">
                Dernières consultations
            </h2>

        </div>

    </div>


    {{-- Aucune consultation --}}
    <div class="rounded-xl bg-gray-50 border border-gray-100 p-5">

        <div class="flex items-center gap-4">

            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">

                <ion-icon
                    name="document-text-outline"
                    class="text-xl text-gray-400">
                </ion-icon>

            </div>

            <div>

                <p class="font-medium text-gray-700">
                    Aucune consultation
                </p>

                <p class="text-sm text-gray-400 mt-1">
                    Vous n'avez encore aucune consultation enregistrée.
                </p>

            </div>

        </div>

    </div>

</div>