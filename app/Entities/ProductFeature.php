<?php
/**
 * File: ProductFeature.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_feature")
 */
class ProductFeature extends AbstractSalesForceObjectEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productFeatures")
     *
     * @var Product
     */
    private $product;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $active = true;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $additionalDetailsUrl;

    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Product_Feature__c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Product Feature';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Active__c' => 'active',
            'Additional_Details_Url__c' => 'additionalDetailsUrl',
            'Description__c' => 'description',
            'Display_Title__c' => 'title',
        ];
    }

    /**
     * @return int
     */
    public function getId()
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
     * @return ProductFeature
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        return $this;
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
     * @return ProductFeature
     */
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription():? string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ProductFeature
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle():? string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ProductFeature
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDetailsUrl(): ?string
    {
        return $this->additionalDetailsUrl;
    }

    /**
     * @param string $additionalDetailsUrl
     * @return ProductFeature
     */
    public function setAdditionalDetailsUrl(string $additionalDetailsUrl)
    {
        $this->additionalDetailsUrl = $additionalDetailsUrl;

        return $this;
    }
}
