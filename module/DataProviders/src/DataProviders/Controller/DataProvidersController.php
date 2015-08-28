<?php
/**
 * Admin Statistics Controller
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category VuFind2
 * @package  Controller
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
namespace DataProviders\Controller;
use VuFind\Exception\Auth as AuthException,
    VuFind\Exception\Mail as MailException,
    VuFind\Exception\ListPermission as ListPermissionException,
    VuFind\Exception\RecordMissing as RecordMissingException,
    Zend\Stdlib\Parameters;

/**
 * Class controls VuFind statistical data.
 *
 * @category VuFind2
 * @package  Controller
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */

class DataProvidersController extends \VuFind\Controller\AbstractBase
{

    /**
     * Contents
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function homeAction()
    {
		// Not logged in?  Force user to log in:
        if (!$this->getAuthManager()->isLoggedIn()) {
            $this->setFollowupUrlToReferer();
            return $this->forwardTo('MyResearch', 'Login');
        }
        $table = $this->getTable('DataProvider')->select();
        print_r($table);
      //	$section = $this->params()->fromQuery('section', 'test');
        $view = $this->createViewModel();
		$view->setTemplate('dataproviders/my_dataproviders');
		$user = $this->getUser();
        $view->username = $user->username;

        $config = $this->getConfig();

      //  $view->section = $section;

        return $view;
    }

	public function addAction()
    {
	// Not logged in?  Force user to log in:
        if (!$this->getAuthManager()->isLoggedIn()) {
            $this->setFollowupUrlToReferer();
            return $this->forwardTo('MyResearch', 'Login');
        }
        $view = $this->createViewModel(array(
            // 'revistas' => $this->getRevistaTable()->fetchAll(),
         ));
        $view->setTemplate('dataproviders/new_dataprovider');
        $config = $this->getConfig();

        $view->section = $section;

        return $view;
    }

}
