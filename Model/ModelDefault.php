<?php

namespace Model;

use App\Database\Connexion;


abstract class ModelDefault extends Connexion
{

    protected $table;


    private $connexion;


    /**
     * Get list 
     *
     * @param string $request
     * @param array|null $attributs
     * @return void
     */
    public function query(string $request, ?array $attributs = null)
    {
        $this->connexion = $this->getPDO();
        if ($attributs) {
            $query = $this->connexion->prepare($request);
            $query->execute($attributs);
            return $query;
        }
        return $this->connexion->query($request);
    }


    public function  findAll()
    {
        $query = $this->query('SELECT * FROM ' . $this->table);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
