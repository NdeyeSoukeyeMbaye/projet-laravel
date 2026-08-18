@extends('layouts.app')

@section('content')

{{-- Header + navigation --}}
<x-navbar />


{{-- ============================== --}}
{{-- CONTENU HISTORIQUE --}}
{{-- ============================== --}}

<main class="max-w-5xl mx-auto px-6 py-10">

    {{-- Titre --}}
    <div class="mb-8">

        <h1 class="text-3xl font-serif font-bold text-slate-900">
            Historique des consultations
        </h1>

        <p class="text-slate-500 mt-2">
            Retrouvez vos consultations et vos rendez-vous passés.
        </p>

    </div>


    {{-- ============================== --}}
    {{-- HISTORIQUE DES CONSULTATIONS --}}
    {{-- ============================== --}}

    <section>

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                <ion-icon
                    name="document-text-outline"
                    class="text-xl text-blue-600">
                </ion-icon>

            </div>

            <h2 class="text-xl font-semibold text-slate-900">
                Historique des consultations
            </h2>

        </div>


        @if($consultations->count() > 0)

            <div class="space-y-4">

                @foreach($consultations as $consultation)

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 hover:shadow-md transition">

                        {{-- En-tête consultation --}}
                        <div class="flex items-start justify-between gap-4">

                            <div class="flex items-center gap-4">

                                {{-- Icône --}}
                                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">

                                    <ion-icon
                                        name="checkmark-circle-outline"
                                        class="text-2xl text-blue-600">
                                    </ion-icon>

                                </div>


                                {{-- Médecin --}}
                                <div>

                                    <h3 class="font-semibold text-lg text-slate-900">

                                        @if($consultation->rendezVous?->medecin?->user)
                                            Dr. {{ $consultation->rendezVous->medecin->user->name }}
                                        @else
                                            Consultation médicale
                                        @endif

                                    </h3>


                                    <p class="text-sm text-slate-500">

                                        @if($consultation->date_consultation)
                                            {{ \Carbon\Carbon::parse($consultation->date_consultation)->translatedFormat('d F Y') }}
                                        @else
                                            Date non renseignée
                                        @endif

                                    </p>

                                </div>

                            </div>


                            {{-- Statut --}}
                            <div class="w-9 h-9 rounded-full bg-green-50 flex items-center justify-center">

                                <ion-icon
                                    name="checkmark-outline"
                                    class="text-green-600 text-xl">
                                </ion-icon>

                            </div>

                        </div>


                        {{-- Observation --}}
                        <div class="mt-5 grid grid-cols-1 gap-4">

                            <div>

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-1">
                                    Observation
                                </p>

                                <p class="text-slate-700">

                                    {{ $consultation->observation ?? 'Aucune observation renseignée.' }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Aucun résultat --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm">

                <div class="w-14 h-14 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-4">

                    <ion-icon
                        name="document-text-outline"
                        class="text-2xl text-slate-400">
                    </ion-icon>

                </div>

                <h3 class="font-semibold text-slate-800">
                    Aucune consultation
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Vous n'avez encore aucune consultation enregistrée.
                </p>

            </div>

        @endif

    </section>



    {{-- ============================== --}}
    {{-- RENDEZ-VOUS PASSÉS --}}
    {{-- ============================== --}}

    <section class="mt-10">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">

                <ion-icon
                    name="calendar-outline"
                    class="text-xl text-slate-600">
                </ion-icon>

            </div>

            <h2 class="text-xl font-semibold text-slate-900">
                Rendez-vous passés
            </h2>

        </div>


        @if($rendezVousPasses->count() > 0)

            <div class="space-y-3">

                @foreach($rendezVousPasses as $rdv)

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">

                        <div class="flex items-center justify-between gap-5">

                            {{-- Gauche --}}
                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">

                                    <ion-icon
                                        name="calendar-outline"
                                        class="text-xl text-blue-600">
                                    </ion-icon>

                                </div>


                                <div>

                                    <h3 class="font-semibold text-slate-900">

                                        @if($rdv->medecin?->user)
                                            Dr. {{ $rdv->medecin->user->name }}
                                        @else
                                            Médecin
                                        @endif

                                    </h3>


                                    <p class="text-sm text-slate-500">

                                        @if($rdv->medecin?->specialite)
                                            {{ $rdv->medecin->specialite->nom }}
                                        @else
                                            Rendez-vous médical
                                        @endif

                                    </p>

                                </div>

                            </div>


                            {{-- Date --}}
                            <div class="text-right">

                                <p class="font-semibold text-slate-800">

                                    {{ \Carbon\Carbon::parse($rdv->date)->translatedFormat('d F Y') }}

                                </p>

                                <p class="text-sm text-slate-500">

                                    {{ $rdv->heure }}

                                </p>

                            </div>


                            {{-- Statut --}}
                            <div>

                                @if(strtolower($rdv->statut) === 'annulé')

                                    <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-red-50 text-red-600 text-sm font-medium">

                                        <ion-icon name="close-circle-outline"></ion-icon>

                                        Annulé

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-green-50 text-green-600 text-sm font-medium">

                                        <ion-icon name="checkmark-circle-outline"></ion-icon>

                                        Terminé

                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm">

                <div class="w-14 h-14 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-4">

                    <ion-icon
                        name="calendar-outline"
                        class="text-2xl text-slate-400">
                    </ion-icon>

                </div>

                <h3 class="font-semibold text-slate-800">
                    Aucun rendez-vous passé
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Vous n'avez encore aucun rendez-vous passé.
                </p>

            </div>

        @endif

    </section>

</main>

@endsection