<?php
/**
 * File: PrescriptionCopay.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\PrescriptionCopayRepository")
 * @ORM\Table(name="prescription_copay")
 */
class PrescriptionCopay extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var InsurancePlan
     * @ORM\ManyToOne(targetEntity="InsurancePlan", inversedBy="prescriptionCopays")
     */
    protected $insurancePlan;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $drugTier;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $copayName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $copay;

    public function getSfObjectApiName(): string
    {
        return 'Prescription_Copay__c';
    }

    public function getSfObjectFriendlyName(): string
    {
        return 'Prescription Copay';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PrescriptionCopay
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return InsurancePlan
     */
    public function getInsurancePlan():? InsurancePlan
    {
        return $this->insurancePlan;
    }

    /**
     * @param InsurancePlan $insurancePlan
     * @return PrescriptionCopay
     */
    public function setInsurancePlan(InsurancePlan $insurancePlan)
    {
        $this->insurancePlan = $insurancePlan;

        return $this;
    }

    /**
     * @return string
     */
    public function getDrugTier():? string
    {
        return $this->drugTier;
    }

    /**
     * @param string $drugTier
     * @return PrescriptionCopay
     */
    public function setDrugTier(string $drugTier)
    {
        $this->drugTier = $drugTier;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopayName():? string
    {
        return $this->copayName;
    }

    /**
     * @param string $copayName
     * @return PrescriptionCopay
     */
    public function setCopayName(string $copayName)
    {
        $this->copayName = $copayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopay():? string
    {
        return $this->copay;
    }

    /**
     * @param string $copay
     * @return PrescriptionCopay
     */
    public function setCopay(string $copay)
    {
        $this->copay = $copay;

        return $this;
    }
}
