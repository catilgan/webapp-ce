<?php

namespace App;

use App\Repositories\Projects;
use App\Http\Resources\Git\TreeResource;
use App\Api\Git\BaseModel;
use GitElephant\Objects\Tree as GitTree;

class Tree extends BaseModel
{
    protected $branch = 'master';

    /**
     * @param $userName
     * @param $projecSlug
     * @param null $options
     * @return GitTree|null
     */
    public function get($userName, $projecSlug, $options = null) : ?GitTree
    {
        // initialize null branch
        $branch = null;

        if ($options !== null) {
            $this->_configure($options);
        }

        $repo = Repo::open($userName, $projecSlug);
        if ($repo) {
            $branch = $repo->getBranch($this->branch);
        }

        if (null !== $branch) {
            return $repo->getTree($branch, $this->path);
        }

        return null;
    }
}
