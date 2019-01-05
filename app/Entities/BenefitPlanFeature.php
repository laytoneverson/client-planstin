<?php
/**
 * File: BenefitPlanFeaturehp
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\BenefitPlanFeatureRepository")
 * @ORM\Table(name="benefit_plan_feature")
 */
class BenefitPlanFeature extends AbstractSalesForceObjectEntity
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $additionalDetailsLink;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $featureDetails;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $featureName;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $featureTitle;

    /**
     * @var BenefitPlan
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="benefitPlanFeatures")
     */
    private $benefitPlan;

    public static function getSfObjectApiName(): string
    {
        return 'Benefit_Plan_Feature__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Benefit Plan Feature';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Additional_Details_Link__c' => 'additionalDetailsLink',
            'Feature_Details__c' => 'featureDetails',
            'Name' => 'featureName',
            'Feature_Title__c' => 'featureTitle',
        ];
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
     * @return BenefitPlanFeature
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
     * @return BenefitPlanFeature
     */
    public function setAdditionalDetailsLink(?string $additionalDetailsLink)
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
     * @return BenefitPlanFeature
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
     * @return BenefitPlanFeature
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
     * @return BenefitPlanFeature
     */
    public function setFeatureTitle(string $featureTitle)
    {
        $this->featureTitle = $featureTitle;

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
     * @return BenefitPlanFeature
     */
    public function setBenefitPlan(BenefitPlan $benefitPlan)
    {
        $this->benefitPlan = $benefitPlan;

        return $this;
    }
}
