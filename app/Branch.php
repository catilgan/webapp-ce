<?php

namespace App;

use App\Repositories\Projects;
use App\Http\Resources\Git\TreeResource;
use App\Api\Git\BaseModel;

class Branch extends BaseModel
{
    /**
     * @param $userName
     * @param $projecSlug
     * @return array|null
     */
    public function get($userName, $projecSlug)
    {
        $repo = Repo::open($userName, $projecSlug);

        if ($repo && (count($repo->getBranches(true)) != 0)) {
            return $repo->getBranches();
        }
        return null;
    }
}
