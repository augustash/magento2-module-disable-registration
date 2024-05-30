<?php

/**
 * August Ash Disable Customer Registration Module
 *
 * A simple module to disable frontend customer registration.
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\DisableRegistration\ViewModel;

use Augustash\DisableRegistration\Api\Service\Customer\IsRegistrationDisabledInterface;
use Magento\Customer\Model\Registration as CustomerRegistration;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Registration implements ArgumentInterface
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @phpcs:disable Generic.Files.LineLength.TooLong
     *
     * @param \Magento\Customer\Model\Registration $customerRegistration
     * @param \Augustash\DisableRegistration\Api\Service\Customer\IsRegistrationDisabledInterface $isRegistrationDisabled
     */
    public function __construct(
        protected CustomerRegistration $customerRegistration,
        protected IsRegistrationDisabledInterface $isRegistrationDisabled,
    ) {
    }

    /**
     * Check if customer registration is allowed.
     *
     * @return bool
     */
    public function isAllowed(): bool
    {
        if ($this->isRegistrationDisabled->execute() === true) {
            return false;
        }

        return $this->customerRegistration->isAllowed();
    }
}
