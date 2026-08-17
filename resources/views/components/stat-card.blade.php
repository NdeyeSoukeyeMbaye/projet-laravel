@php
    $couleurs = [
        'RDV à venir' => [
            'fond' => 'bg-blue-50',
            'iconeFond' => 'bg-blue-100',
            'icone' => 'text-blue-600',
            'nombre' => 'text-blue-700',
            'titre' => 'text-blue-700',
            'description' => 'text-blue-400',
        ],

        'Consultations' => [
            'fond' => 'bg-green-50',
            'iconeFond' => 'bg-green-100',
            'icone' => 'text-green-600',
            'nombre' => 'text-green-700',
            'titre' => 'text-green-700',
            'description' => 'text-green-400',
        ],

        'Traitements' => [
            'fond' => 'bg-purple-50',
            'iconeFond' => 'bg-purple-100',
            'icone' => 'text-purple-600',
            'nombre' => 'text-purple-700',
            'titre' => 'text-purple-700',
            'description' => 'text-purple-400',
        ],

        'Médecins suivis' => [
            'fond' => 'bg-amber-50',
            'iconeFond' => 'bg-amber-100',
            'icone' => 'text-amber-600',
            'nombre' => 'text-amber-700',
            'titre' => 'text-amber-700',
            'description' => 'text-amber-500',
        ],
    ];

    $couleur = $couleurs[$titre] ?? [
        'fond' => 'bg-white',
        'iconeFond' => 'bg-gray-100',
        'icone' => 'text-gray-600',
        'nombre' => 'text-gray-900',
        'titre' => 'text-gray-700',
        'description' => 'text-gray-400',
    ];
@endphp

<div class="{{ $couleur['fond'] }} rounded-2xl p-6 min-h-[210px] shadow-sm border border-white">

    <div class="flex flex-col h-full justify-between">

        {{-- Icône --}}
        <div class="flex justify-end">

            <div class="w-14 h-14 rounded-xl {{ $couleur['iconeFond'] }} flex items-center justify-center">

                <span class="{{ $couleur['icone'] }} text-3xl">
                    {{ $slot }}
                </span>

            </div>

        </div>

        {{-- Informations --}}
        <div class="mt-4">

            <h3 class="{{ $couleur['titre'] }} text-sm font-medium">
                {{ $titre }}
            </h3>

            <h2 class="{{ $couleur['nombre'] }} text-4xl font-bold mt-2">
                {{ $nombre }}
            </h2>

            <p class="{{ $couleur['description'] }} text-sm mt-1">
                {{ $description }}
            </p>

        </div>

    </div>

</div>