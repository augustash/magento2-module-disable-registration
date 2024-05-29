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

namespace Augustash\DisableRegistration\Service\Customer;

use Augustash\DisableRegistration\Api\Service\Customer\IsRegistrationDisabledInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class IsRegistrationDisabled implements IsRegistrationDisabledInterface
{
    /**
     * Constructor.
     *
     * Initialize class dependencies.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    ) {
    }

    /**
     * Check if customer registration is disabled.
     *
     * @return bool
     */
    public function execute(): bool
    {
        return (bool) $this->scopeConfig->getValue(
            self::XML_PATH_REGISTRATION_DISABLED,
            ScopeInterface::SCOPE_STORES,
        );
    }
}
