<?php

namespace Backend\Modules\Utility\Installer;

use Backend\Core\Installer\ModuleInstaller;

/**
 * Installer for the Cache Clear module
 */
class Installer extends ModuleInstaller
{
    public function install()
    {
        $this->addModule('Utility');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'Utility');
        $this->setActionRights(1, 'Utility', 'ClearCache');

        // settings navigation
        $navigationSettingsId = $this->setNavigation(null, 'Settings');
        $navigationModuleId = $this->setNavigation($navigationSettingsId, 'Utility', 'utility/clear_cache');
        $this->setNavigation($navigationModuleId, 'ClearCache', 'utility/clear_cache');
    }
}
