<?php
/**
 * File: InsurancePlanCoPay.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\InsurancePlanCopayRepository")
 * @ORM\Table(name="insurance_plan_copay")
 */
class InsurancePlanCopay extends AbstractSalesForceObjectEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var InsurancePlan
     * @ORM\ManyToOne(targetEntity="InsurancePlan", inversedBy="insurancePlanCopays")
     */
    protected $insurancePlan;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $copayName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $serviceName;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $outOfNetworkPrice;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $inNetworkPrice;

    public function getSfObjectApiName(): string
    {
        return 'Insurance_Plan_Feature__c';
    }

    public function getSfObjectFriendlyName(): string
    {
        return 'Insurance Plan Feature';
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return InsurancePlanCopay
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return InsurancePlan
     */
    public function getInsurancePlan(): InsurancePlan
    {
        return $this->insurancePlan;
    }

    /**
     * @param InsurancePlan $insurancePlan
     * @return InsurancePlanCopay
     */
    public function setInsurancePlan(InsurancePlan $insurancePlan)
    {
        $this->insurancePlan = $insurancePlan;

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
     * @return InsurancePlanCopay
     */
    public function setCopayName(string $copayName)
    {
        $this->copayName = $copayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceName():? string
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     * @return InsurancePlanCopay
     */
    public function setServiceName(string $serviceName)
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * @return float
     */
    public function getOutOfNetworkPrice():? float
    {
        return $this->outOfNetworkPrice;
    }

    /**
     * @param float $outOfNetworkPrice
     * @return InsurancePlanCopay
     */
    public function setOutOfNetworkPrice(float $outOfNetworkPrice)
    {
        $this->outOfNetworkPrice = $outOfNetworkPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getInNetworkPrice():? float
    {
        return $this->inNetworkPrice;
    }

    /**
     * @param float $inNetworkPrice
     * @return InsurancePlanCopay
     */
    public function setInNetworkPrice(float $inNetworkPrice)
    {
        $this->inNetworkPrice = $inNetworkPrice;

        return $this;
    }
}
