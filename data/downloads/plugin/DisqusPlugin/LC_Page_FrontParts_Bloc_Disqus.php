<?php
/*
*
* DisqusPlugin
* Copyright(c) 2014 Cyber-Will Inc. All Rights Reserved.
*
* http://www.cyber-will.co.jp/
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU Lesser General Public
* License as published by the Free Software Foundation; either
* version 2.1 of the License, or (at your option) any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
* Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this library; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
/**
 * Disqus のページクラス.
 *
 * @package Page
 * @author Cyber-Will Inc.
 * @version $ $
 */
class LC_Page_FrontParts_Bloc_Disqus extends LC_Page_FrontParts_Bloc_Ex
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    public function action()
    {
        $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode("DisqusPlugin");
        $this->free_field1 = $plugin['free_field1'];
        // 2だったら無効
        $this->enable = $plugin['enable'];
    }

}
