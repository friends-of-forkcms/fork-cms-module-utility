<?php

namespace Backend\Modules\Utility\Actions;

use Backend\Core\Engine\Base\ActionEdit as BackendBaseActionEdit;
use Backend\Core\Engine\Authentication;
use Backend\Core\Engine\Model as BackendModel;
use Backend\Core\Engine\Form as BackendForm;
use Backend\Core\Engine\Language;
use Backend\Modules\Utility\Engine\Model as BackendCacheClearModel;

class ClearCache extends BackendBaseActionEdit
{

    /**
     * Execute the action
     */
    public function execute()
    {
        parent::execute();

        $this->loadForm();
        $this->validateForm();
        $this->parse();
        $this->display();
    }

    /**
     * Load the form
     */
    private function loadForm()
    {
        // create form
        $this->frm = new BackendForm('settings');
    }

    /**
     * Parse the form
     */
    protected function parse()
    {
        // parse the form
        $this->tpl->assign('cleared', BackendModel::getModuleSetting('Utility', 'last_cleared', false));
        $this->frm->parse($this->tpl);
    }



    /**
     * Validates the form
     */
    private function validateForm()
    {
        // is the form submitted?
        if ($this->frm->isSubmitted()) {
            if ($this->frm->isCorrect()) {
                BackendCacheClearModel::clear();
                BackendModel::setModuleSetting('Utility', 'last_cleared', strtotime('now'));
                $this->redirect(BackendModel::createURLForAction('ClearCache'). '&report=success');
            }
        }
    }
}
