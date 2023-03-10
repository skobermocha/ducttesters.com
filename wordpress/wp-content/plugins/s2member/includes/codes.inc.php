<?php
/*
Copyright: © 2009 WebSharks, Inc. ( coded in the USA )
<mailto:support@websharks-inc.com> <http://www.websharks-inc.com/>

Released under the terms of the GNU General Public License.
You should have received a copy of the GNU General Public License,
along with this software. In the main directory, see: /licensing/
If not, see: <http://www.gnu.org/licenses/>.
*/
/*
Direct access denial.
*/
if (realpath (__FILE__) === realpath ($_SERVER["SCRIPT_FILENAME"]))
	exit ("Do not access this file directly.");
/*
Add WordPress® Editor Shortcodes.
http://codex.wordpress.org/Shortcode_API
*/
add_shortcode ("s2Get", "c_ws_plugin__s2member_sc_gets::sc_get_details");
/**/
add_shortcode ("s2If", "c_ws_plugin__s2member_sc_if_conds::sc_if_conditionals");
add_shortcode ("_s2If", "c_ws_plugin__s2member_sc_if_conds::sc_if_conditionals");
add_shortcode ("__s2If", "c_ws_plugin__s2member_sc_if_conds::sc_if_conditionals");
add_shortcode ("___s2If", "c_ws_plugin__s2member_sc_if_conds::sc_if_conditionals");
/**/
add_shortcode ("s2Member-Profile", "c_ws_plugin__s2member_sc_profile::sc_profile");
/**/
add_shortcode ("s2Member-PayPal-Button", "c_ws_plugin__s2member_sc_paypal_button::sc_paypal_button");
?>