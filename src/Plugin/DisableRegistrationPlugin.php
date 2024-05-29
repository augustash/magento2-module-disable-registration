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

namespace Augustash\DisableRegistration\Plugin;

use Augustash\DisableRegistration\Api\Service\Customer\IsRegistrationDisabledInterface;
use Magento\Customer\Model\Registration as Subject;

class DisableRegistrationPlugin
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @phpcs:disable Generic.Files.LineLength.TooLong
     *
     * @param \Augustash\DisableRegistration\Api\Service\Customer\IsRegistrationDisabledInterface $isRegistrationDisabled
     */
    public function __construct(
        protected IsRegistrationDisabledInterface $isRegistrationDisabled,
    ) {
    }

    /**
     * Prevent access to customer registration based on config.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param \Magento\Customer\Model\Registration $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsAllowed(Subject $subject, bool $result): bool
    {
        if ($this->isRegistrationDisabled->execute() === true) {
            return false;
        }

        return $result;
    }
}
