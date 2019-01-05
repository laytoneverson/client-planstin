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
     * @var BenefitPlan
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="prescriptionCopays")
     */
    protected $benefitPlan;

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

    public static function getSfObjectApiName(): string
    {
        return 'Prescription_Copay__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Prescription Copay';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Name' => 'copayName',
            'Drug_Tier__c' => 'drugTier',
            'CoPay__c' => 'copay',
        ];
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
     * @return BenefitPlan
     */
    public function getBenefitPlan():? BenefitPlan
    {
        return $this->benefitPlan;
    }

    /**
     * @param BenefitPlan $benefitPlan
     * @return PrescriptionCopay
     */
    public function setBenefitPlan(BenefitPlan $benefitPlan)
    {
        $this->benefitPlan = $benefitPlan;

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
