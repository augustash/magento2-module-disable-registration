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

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Augustash_DisableRegistration',
    __DIR__
);
