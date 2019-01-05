<?php
/**
 * File: BenefitPlanFamily.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entities\BenefitPlan;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\BenefitPlanFamilyRepository")
 * @ORM\Table(name="benefit_plan_family")
 */
class BenefitPlanFamily extends AbstractSalesForceObjectEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $displayOrder = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $displayName;

    /**
     * @var BenefitPlan[]|Collection
     *
     * @ORM\OneToMany(targetEntity="BenefitPlan", mappedBy="planFamily")
     */
    private $benefitPlans;

    public function __construct()
    {
        $this->benefitPlans = new ArrayCollection();
    }

    public static function getSfObjectApiName(): string
    {
        return 'Benefit_Plan_Family__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Planstin Plan Family';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Active__c' => 'active',
            'Display_Order__c' => 'displayOrder',
            'Family_Display_Name__c' => 'displayName',
        ];
    }

    public static function getChildRelationships()
    {
        return [
            BenefitPlan::class => new SalesForceChildRelationship(
                BenefitPlan::class,
                'Planstin_Benefit_Plans',
                'benefitPlans',
                'planFamily'
            ),
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return BenefitPlanFamily
     */
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    /**
     * @param int $displayOrder
     * @return BenefitPlanFamily
     */
    public function setDisplayOrder(?int $displayOrder)
    {
        $this->displayOrder = (int)$displayOrder;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     * @return BenefitPlanFamily
     */
    public function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return BenefitPlan[]|Collection
     */
    public function getBenefitPlans()
    {
        return $this->benefitPlans;
    }

    /**
     * @param BenefitPlan[]|Collection $benefitPlans
     * @return BenefitPlanFamily
     */
    public function setBenefitPlans($benefitPlans)
    {
        $this->benefitPlans = $benefitPlans;

        return $this;
    }
}
