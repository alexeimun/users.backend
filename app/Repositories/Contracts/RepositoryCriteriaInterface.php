<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface RepositoryCriteriaInterface
{
    /**
     * Skip Criteria
     *
     * @param bool $status
     *
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * Push Criteria for filter the query
     *
     * @param $criteria
     *
     * @return $this
     */
    public function pushCriteria(CriteriaInterface $criteria);

    /**
     * Get Collection of Criteria
     *
     * @return Collection
     */
    public function getCriteria();

    /**
     * Find data by Criteria
     *
     * @param CriteriaInterface $criteria
     *
     * @return mixed
     */

    public function getByCriteria(CriteriaInterface $criteria);

}