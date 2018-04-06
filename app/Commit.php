<?php

namespace App;

use App\Repositories\Projects;
use App\Api\Git\BaseModel;

class Commit extends BaseModel
{
    /**
     * @param $userName
     * @param $projecSlug
     * @return \GitElephant\Objects\Log|null
     */
    public function get($userName, $projecSlug)
    {
        $repo = Repo::open($userName, $projecSlug);

        if ($repo && (count($repo->getBranches(true)) != 0)) {
            return $repo->getLog('HEAD');
        }

        return null;
    }

    /**
     * @param $userName
     * @param $projecSlug
     * @param $sha
     * @return \GitElephant\Objects\Commit|null
     */
    public function getSingle($userName, $projecSlug, $sha)
    {
        $repo = Repo::open($userName, $projecSlug);

        if ($repo && (count($repo->getBranches(true)) != 0)) {
            return $repo->getCommit($sha);
        }

        return null;
    }
}
