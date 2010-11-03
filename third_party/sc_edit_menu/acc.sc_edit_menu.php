<?php
/**
* Sassafras Consulting Edit Menu Accessory class
*
* @package			SC_Edit_Menu
* @version			1.0
* @author			Andrew Gunstone ~ <andrew@thirststudios.com>
* @link				http://sassafrasconsulting.com.au/software/edit-menu/
* @license			http://creativecommons.org/licenses/by-sa/3.0/
*/

/**
 * Changelog
 * 
 * Version 1.0 20101103
 * --------------------
 * Initial public release
 */

class Sc_edit_menu_acc 
{
	var $name	 		= 'SC Edit Menu';
	var $id	 			= 'sc_edit_menu';
	var $version	 	= '1.0.0';
	var $description	= 'Accessory to add an Edit dropdown menu';
	var $sections	 	= array();

	/**
	* Set Sections
	*
	* Set content for the accessory
	*
	* @access	public
	* @return	void
	*/
	function set_sections()
	{
		$EE =& get_instance();
		
		$js = <<<EOF
$(document).ready(function() {
	el = $("#navigationTabs li a:contains('Publish')").siblings().clone();
	el.html( el.html().replace(/content_publish&amp;M=entry_form/g, "content_edit") );
	$("#navigationTabs li a:contains('Edit')").parent().addClass("parent");
	$("#navigationTabs li a:contains('Edit')").parent().append( "<ul>"+el.html()+"</ul>" );
});
EOF;
    	$EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">'.$js.'</script>');

		$this->sections[] = '<script type="text/javascript" charset="utf-8">$("#accessoryTabs a.sc_edit_menu").parent().remove();</script>';
	}
}
// END CLASS

/* End of file acc.sc_edit_menu_acc.php */