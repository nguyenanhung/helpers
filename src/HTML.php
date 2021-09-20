<?php
/**
 * Project helpers.
 * Created by PhpStorm.
 * User: 713uk13m <dev@nguyenanhung.com>
 * Date: 2018-12-27
 * Time: 22:25
 */

namespace nguyenanhung\Classes\Helper;

use nguyenanhung\Libraries\HTML\HTML as BaseHtml;

if (!class_exists('nguyenanhung\Classes\Helper\HTML')) {
    /**
     * @abstract
     * @author        Miranda <miranda@lunnaly.com> & Gustavo <guustavo_59@hotmail.com>
     * @version       1.0.7
     * @link          https://github.com/over9k/HTML-Helper
     * @license       http://www.opensource.org/licenses/mit-license.php MIT License
     * @package       HTML Helper
     */
    class HTML extends BaseHtml
    {
    }
}
