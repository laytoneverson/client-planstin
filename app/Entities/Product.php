<?php
/**
 * File: Product.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $displayUrl;

    /**
     * @ORM\OneToMany(targetEntity="ProductFeature", mappedBy="product")
     *
     * @var ProductFeature[]|Collection
     */
    private $productFeatures;

    /**
     * @ORM\ManyToOne(targetEntity="ProductSubscription", inversedBy="product")
     *
     * @var ProductSubscription[]|Collection
     */
    private $productSubscriptions;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $productFamily;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $productDescription;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $productName;

    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Product2';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Product';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'IsActive' => 'active',
            'DisplayUrl' => 'displayUrl',
            'Description' => 'productDescription',
            'Family' => 'productFamily',
            'Name' => 'productName',
        ];
    }

    public static function getChildRelationships()
    {
        return [
            ProductSubscription::class => new SalesForceChildRelationship(
                ProductSubscription::class,
                'Product_Subscriptions',
                'productSubscriptions',
                'product'
            ),
            ProductFeature::class => new SalesForceChildRelationship(
                ProductFeature::class,
                'Product_Features',
                'productFeatures',
                'product'
            ),
        ];
    }

    public function __construct()
    {
        $this->productFeatures = new ArrayCollection();
        $this->productSubscriptions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId():? int
    {
        return $this->id;
    }


    /**
     * @return bool
     */
    public function isActive():? bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Product
     */
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayUrl():? string
    {
        return $this->displayUrl;
    }

    /**
     * @param string $displayUrl
     * @return Product
     */
    public function setDisplayUrl(string $displayUrl)
    {
        $this->displayUrl = $displayUrl;

        return $this;
    }

    /**
     * @return ProductFeature[]|Collection
     */
    public function getProductFeatures()
    {
        return $this->productFeatures;
    }

    /**
     * @param ProductFeature[]|Collection $productFeatures
     * @return Product
     */
    public function setProductFeatures($productFeatures)
    {
        $this->productFeatures = $productFeatures;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductFamily():? string
    {
        return $this->productFamily;
    }

    /**
     * @param string $productFamily
     * @return Product
     */
    public function setProductFamily(string $productFamily)
    {
        $this->productFamily = $productFamily;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductDescription():? string
    {
        return $this->productDescription;
    }

    /**
     * @param string $productDescription
     * @return Product
     */
    public function setProductDescription(string $productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductName():? string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return Product
     */
    public function setProductName(string $productName)
    {
        $this->productName = $productName;

        return $this;
    }


}
