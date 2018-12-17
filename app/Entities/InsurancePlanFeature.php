<?php
/**
 * File: InsurancePlanFeature.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\InsurancePlanFeatureRepository")
 * @ORM\Table(name="insurance_plan_feature")
 */
class InsurancePlanFeature extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $additionalDetailsLink;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $featureDetails;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $featureName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $featureTitle;

    /**
     * @var InsurancePlan
     * @ORM\ManyToOne(targetEntity="InsurancePlan", inversedBy="insurancePlanFeatures")
     */
    private $insurancePlan;

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
    public function getId():? int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return InsurancePlanFeature
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDetailsLink():? string
    {
        return $this->additionalDetailsLink;
    }

    /**
     * @param string $additionalDetailsLink
     * @return InsurancePlanFeature
     */
    public function setAdditionalDetailsLink(string $additionalDetailsLink)
    {
        $this->additionalDetailsLink = $additionalDetailsLink;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeatureDetails():? string
    {
        return $this->featureDetails;
    }

    /**
     * @param string $featureDetails
     * @return InsurancePlanFeature
     */
    public function setFeatureDetails(string $featureDetails)
    {
        $this->featureDetails = $featureDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeatureName():? string
    {
        return $this->featureName;
    }

    /**
     * @param string $featureName
     * @return InsurancePlanFeature
     */
    public function setFeatureName(string $featureName)
    {
        $this->featureName = $featureName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeatureTitle():? string
    {
        return $this->featureTitle;
    }

    /**
     * @param string $featureTitle
     * @return InsurancePlanFeature
     */
    public function setFeatureTitle(string $featureTitle)
    {
        $this->featureTitle = $featureTitle;

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
     * @return InsurancePlanFeature
     */
    public function setInsurancePlan(InsurancePlan $insurancePlan)
    {
        $this->insurancePlan = $insurancePlan;

        return $this;
    }


}
