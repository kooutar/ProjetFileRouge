<?php

namespace App\services;

use App\repositories\Interfaces\InterfaceChapitre;

class ServiceChapitre
{
    /**
     * Create a new class instance.
     */
    protected $chapitreRepository;
    public function __construct( InterfaceChapitre $chapitreRepository)
    {
        $this->chapitreRepository = $chapitreRepository;

    }

    public function create(array $data)
    {
        // dd($data);
        // $chapitreData = [];
        // foreach ($data['chapters'] as $chapter) {
        //     $chapitreData[] = [
        //         'titreChapitre' => $chapter['title'],
        //         'pathVedio' => $chapter['video']->store('chapitres', 'public'),
        //         'id_cours' => $data['id_cours'],
        //     ];
        // }
        return $this->chapitreRepository->create($data);
    }
}
