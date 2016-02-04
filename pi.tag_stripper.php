<?php
// ------------------------------------------------------------------------
//
// USAGE: {exp:tag_stripper}{title}{/exp:tag_stripper}
//
// ------------------------------------------------------------------------

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ExpressionEngine - by EllisLab
 *
 * @package         ExpressionEngine
 * @author          ExpressionEngine Dev Team
 * @copyright       Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license         http://expressionengine.com/user_guide/license.html
 * @link            http://expressionengine.com
 * @since           Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Tag Stripper Plugin
 *
 * @package     ExpressionEngine
 * @subpackage  Addons
 * @category    Plugin
 * @author      Roma
 * @link
 */

$plugin_info = array(
    'pi_name'       => 'Tag Stripper',
    'pi_version'    => '1.0',
    'pi_author'     => 'Roma',
    'pi_author_url' => 'romakuchukov.com',
    'pi_description'=> 'Strips Tags',
    'pi_usage'      => Tag_stripper::usage()
);


class Tag_stripper {

    public $return_data;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE=&get_instance();

        $tagdata = $this->EE->TMPL->tagdata;
        $chars  = $this->EE->TMPL->fetch_param('chars');
        $inline = $this->EE->TMPL->fetch_param('inline');
        $indexPhp = $this->EE->TMPL->fetch_param('index-php');

        $tagdata = strip_tags($tagdata);

        if ($chars) { $tagdata = substr($tagdata, 0, (int)$chars).$inline; }
        if ($indexPhp == 'true') { $tagdata = str_replace('index.php/', '', $tagdata); }

        $this->return_data = $tagdata;
    }

    // ----------------------------------------------------------------
    
    /**
     * Plugin Usage
     */
    public static function usage()
    {
        ob_start();
        echo 'Usage {exp:tag_stripper chars="165" inline="..."}{title}{/exp:tag_stripper}';
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}

/* End of file pi.tag_stripper.php */
/* Location: ./nxstEE/expressionengine/third_party/tag_stripper/pi.tag_stripper.php */
