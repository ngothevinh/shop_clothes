<?php

namespace App\Respositories;

interface RespositoriesInterface
{
    public function all();
    public function find($id);
    public function create($data);
    public function update($data,$id);
    public function delete($id);
    public function searchAndPaginate($searchBy, $keyword,$perpage = 5);
}
