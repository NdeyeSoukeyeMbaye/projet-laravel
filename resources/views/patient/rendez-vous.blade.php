@extends('layouts.app')

@section('content')

{{-- Header + navigation --}}
<x-navbar />


{{-- Contenu --}}
<main class="max-w-7xl mx-auto px-8 py-8">

    {{-- Titre --}}
    <div class="mb-8">

        <h1 class="text-4xl font-serif font-bold text-gray-900">
            Mes rendez-vous
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Consultez vos rendez-vous médicaux.
        </p>

    </div>


    {{-- Conteneur des rendez-vous --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

        {{-- En-tête --}}
        <div class="flex items-center gap-3 mb-6">

            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                <ion-icon
                    name="calendar-outline"
                    class="text-2xl text-blue-600">
                </ion-icon>

            </div>

            <h2 class="text-lg font-semibold text-gray-800">
                Mes rendez-vous
            </h2>

        </div>


        {{-- Aucun rendez-vous --}}
        @if($rendezVous->isEmpty())

            <div class="rounded-xl bg-gray-50 border border-gray-100 p-8 text-center">

                <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 flex items-center justify-center">

                    <ion-icon
                        name="calendar-outline"
                        class="text-3xl text-blue-400">
                    </ion-icon>

                </div>

                <h3 class="mt-4 font-semibold text-gray-700">
                    Aucun rendez-vous
                </h3>

                <p class="text-sm text-gray-400 mt-2">
                    Vous n'avez actuellement aucun rendez-vous enregistré.
                </p>

            </div>

        @else

            {{-- Liste des rendez-vous --}}
            <div class="space-y-4">

                @foreach($rendezVous as $rendezVousItem)

                    <div class="border border-gray-100 rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <h3 class="font-semibold text-gray-800">
                                    Dr.
                                    {{ $rendezVousItem->medecin?->user?->name ?? 'Médecin non renseigné' }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">

                                    {{ $rendezVousItem->date }}

                                    @if($rendezVousItem->heure)
                                        à {{ $rendezVousItem->heure }}
                                    @endif

                                </p>

                                @if($rendezVousItem->motif)

                                    <p class="text-sm text-gray-500 mt-2">
                                        Motif : {{ $rendezVousItem->motif }}
                                    </p>

                                @endif

                            </div>


                            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-sm">

                                {{ $rendezVousItem->statut }}

                            </span>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</main>

@endsection