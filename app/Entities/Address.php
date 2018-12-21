<?php
/**
 * File: Address.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 */

namespace App\Entities;

class Address
{
    protected $label;

    protected $street1;

    protected $street2;

    protected $city;

    protected $state;

    protected $postalCode;

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Address
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    public function getFullStreet()
    {
        $street = $this->getStreet1();

        if ($street2 = $this->getStreet2()) {
            $street .= "\n$street2";
        }

        return $street;
    }

    public function setFullStreet($fullStreet)
    {
        $streets = \explode("\n", $fullStreet);

        $this->setStreet1($streets[0]);
        if (\count($streets) >= 2) {
            $this->setStreet2((string)$streets[1]);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * @param mixed $street1
     * @return Address
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param mixed $street2
     * @return Address
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Address
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}
