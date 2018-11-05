<?php
/**
 * File: Employee.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Employee
{
    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var string
     */
    protected $employeeRoll;

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Employee
     */
    public function setContact(Contact $contact): Employee
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeRoll(): string
    {
        return $this->employeeRoll;
    }

    /**
     * @param string $employeeRoll
     * @return Employee
     */
    public function setEmployeeRoll(string $employeeRoll): Employee
    {
        $this->employeeRoll = $employeeRoll;

        return $this;
    }
}
