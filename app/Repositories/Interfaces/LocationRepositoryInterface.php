<?php

namespace App\Repositories\Interfaces;

interface LocationRepositoryInterface
{
    public function all();
    public function getByLocation($id);
    public function delete($id);
    public function save($request);
}
