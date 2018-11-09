<?php
/**
 * File: Memberhp
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Member
{
    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var string
     */
    protected $memberRoll;

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Member
     */
    public function setContact(Contact $contact): Member
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getMemberRoll(): string
    {
        return $this->memberRoll;
    }

    /**
     * @param string $memberRoll
     * @return Member
     */
    public function setMemberRoll(string $memberRoll): Member
    {
        $this->memberRoll = $memberRoll;

        return $this;
    }
}
