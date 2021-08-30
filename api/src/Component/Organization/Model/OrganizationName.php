<?php

namespace Yawik\Component\Organization\Model;

use Yawik\Module\Resource\Contracts\ResourceInterface;
use Yawik\Module\Resource\Contracts\ResourceTrait;

class OrganizationName implements ResourceInterface
{
    use ResourceTrait;

    protected string $name;

    protected int $rankingByCompany = 0;

    protected int $ranking = 0;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getRankingByCompany(): int
    {
        return $this->rankingByCompany;
    }

    /**
     * @param int $rankingByCompany
     */
    public function setRankingByCompany(int $rankingByCompany): void
    {
        $this->rankingByCompany = $rankingByCompany;
    }

    /**
     * @return int
     */
    public function getRanking(): int
    {
        return $this->ranking;
    }

    /**
     * @param int $ranking
     */
    public function setRanking(int $ranking): void
    {
        $this->ranking = $ranking;
    }
}
