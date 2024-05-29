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

namespace Augustash\DisableRegistration\Api\Service\Customer;

/**
 * Service interface responsible for reporting if customer registration is disabled.
 *
 * @api
 */
interface IsRegistrationDisabledInterface
{
    /**
     * Configuration constants.
     */
    public const XML_PATH_REGISTRATION_DISABLED = 'customer/create_account/disable_registration';

    /**
     * Check if customer registration is disabled.
     *
     * @return bool
     */
    public function execute(): bool;
}
