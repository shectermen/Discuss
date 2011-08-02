<?php
/**
 * Discuss
 *
 * Copyright 2010-11 by Shaun McCormick <shaun@modx.com>
 *
 * This file is part of Discuss, a native forum for MODx Revolution.
 *
 * Discuss is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Discuss is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Discuss; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package discuss
 */
/**
 * @package discuss
 * @subpackage controllers
 */
class DiscussMgrUserUpdateManagerController extends DiscussManagerController {
    /** @var disUser $profile */
    public $disUser;
    /** @var modUser $user */
    public $user;

    public function initialize() {
        parent::initialize();
        $this->disUser = $this->modx->getObject('disUser',$this->scriptProperties['user']);
        if (empty($this->disUser)) return $this->failure($this->modx->lexicon('discuss.user_err_nf'));
        
        $this->user = $this->disUser->getOne('User');
        return true;
    }

    public function process(array $scriptProperties = array()) {
    }

    public function getPageTitle() { return $this->modx->lexicon('discuss.user').': '.$this->user->get('username'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->discuss->config['mgrJsUrl'].'widgets/user/user.posts.grid.js');
        $this->addJavascript($this->discuss->config['mgrJsUrl'].'widgets/user/user.panel.js');
        $this->addLastJavascript($this->discuss->config['mgrJsUrl'].'sections/user/update.js');
    }
    public function getTemplateFile() { return $this->discuss->config['templatesPath'].'user/update.tpl'; }
}
