<?php
/**
 * File: ProductSubscription.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_subscription")
 */
class ProductSubscription extends AbstractSalesForceObjectEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productSubscriptions")
     *
     * @var Product
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productSubscriptions")

     * @var GroupClient
     */
    private $groupClient;

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var float
     */
    private $monthlyBaseRate;

    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Product_Subscription_c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Product Subscription';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Monthly_Base_Rate__c' => '',
            'Start_Date__c' => '',
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
     * @return Product
     */
    public function getProduct():? Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return ProductSubscription
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient():? GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupClient
     * @return ProductSubscription
     */
    public function setGroupClient(GroupClient $groupClient)
    {
        $this->groupClient = $groupClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate():? string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return ProductSubscription
     */
    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getMonthlyBaseRate():? float
    {
        return $this->monthlyBaseRate;
    }

    /**
     * @param float $monthlyBaseRate
     * @return ProductSubscription
     */
    public function setMonthlyBaseRate(?float $monthlyBaseRate)
    {
        $this->monthlyBaseRate = $monthlyBaseRate;

        return $this;
    }
}
