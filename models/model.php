<?php

namespace App\Models;

use App\Database\Connexion;

class Model extends Connexion
{

    protected $table;


    private $connexion;



    public function query(string $request, array $attributs = null)
    {

        // Get the instance
        $this->connexion = Connexion::getPDO();

        // Check if we have attributs
        if ($attributs !== null) {

            $query = $this->connexion->prepare($request);
            $query->execute($attributs);
            return query;
        } else {
            return $this->query->execute($request);
        }
    }
}
