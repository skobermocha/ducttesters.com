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
/**/
if (!class_exists ("c_ws_plugin__s2member_ptags_sp"))
	{
		class c_ws_plugin__s2member_ptags_sp
			{
				/*
				Checks Tag Level Access permissions - for a specific Tag.
				
				Don't call this function directly, use one of these API functions:
					
					Is it protected by s2Member at all?
					- is_tag_protected_by_s2member($tag_id [ or slug, or tag name ]);
					- is_protected_by_s2member($tag_id [ or slug, or tag name ], "tag");
					
					Is the current User permitted/authorized?
					- is_tag_permitted_by_s2member($tag_id [ or slug, or tag name ]);
					- is_permitted_by_s2member($tag_id [ or slug, or tag name ], "tag");
				
				See: `/s2member/includes/functions/api-functions.inc.php`.
				*/
				public static function check_specific_ptag_level_access ($__tag = FALSE, $check_user = TRUE)
					{
						do_action ("ws_plugin__s2member_before_check_specific_ptag_level_access", get_defined_vars ());
						/**/
						if ($__tag && is_numeric ($__tag) && is_object ($term = get_term_by ("id", $__tag, "post_tag")))
							{
								$tag_id = $__tag; /* We need the $tag_id, $tag_slug, and also the $tag_name. */
								$tag_slug = $term->slug; /* Tag slug. */
								$tag_name = $term->name; /* Tag name. */
							}
						else if ($__tag && is_string ($__tag)) /* A string? Either a Tag name or a slug. */
							{
								/* Here, we give "name" priority, because it's likely to be a Tag name. */
								if (is_object ($term = get_term_by ("name", $__tag, "post_tag")))
									{
										$tag_name = $__tag; /* A name was passed in. */
										$tag_id = $term->term_id; /* Tag ID. */
										$tag_slug = $term->slug; /* Tag slug. */
									}
								else if (is_object ($term = get_term_by ("slug", $__tag, "post_tag")))
									{
										$tag_slug = $__tag; /* A slug was passed in. */
										$tag_id = $term->term_id; /* Tag ID. */
										$tag_name = $term->name; /* Tag name. */
									}
							}
						/**/
						$excluded = apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access_excluded", false, get_defined_vars ());
						/**/
						if (!$excluded && $tag_id && $tag_slug && $tag_name && $GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["membership_options_page"])
							{
								$tag_link = get_tag_link ($tag_id); /* Determine link to this Tag. */
								$tag_path = parse_url ($tag_link, PHP_URL_PATH); /* Parse req path. */
								$tag_query = parse_url ($tag_link, PHP_URL_QUERY); /* Parse query. */
								$tag_uri = ($tag_query) ? $tag_path . "?" . $tag_query : $tag_path;
								/**/
								$current_user = (is_user_logged_in ()) ? wp_get_current_user () : false; /* Get the current User's object. */
								/**/
								if ($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["login_redirection_override"] && ($login_redirection_uri = c_ws_plugin__s2member_login_redirects::login_redirection_uri ($current_user)) && preg_match ("/^" . preg_quote ($login_redirection_uri, "/") . "$/", $tag_uri) && (!$check_user || !$current_user || !current_user_can ("access_s2member_level0")))
									return apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access", array ("s2member_level_req" => 0), get_defined_vars ());
								/**/
								else if (!c_ws_plugin__s2member_systematics_sp::is_systematic_use_specific_page (null, $tag_uri)) /* Never restrict Systematic Use Pages. However, there is 1 exception above ^. */
									{
										for ($i = 0; $i <= 4; $i++) /* Tag Level restrictions. Go through each Membership Level. This is pretty simple. We're just checking Tags. */
											{
												if ($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["level" . $i . "_ptags"] === "all" && (!$check_user || !$current_user || !current_user_can ("access_s2member_level" . $i)))
													return apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access", array ("s2member_level_req" => $i), get_defined_vars ());
												/**/
												else if ($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["level" . $i . "_ptags"] && (in_array ($tag_name, ($tags = preg_split ("/[\r\n\t;,]+/", $GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["level" . $i . "_ptags"]))) || in_array ($tag_slug, $tags)) && (!$check_user || !$current_user || !current_user_can ("access_s2member_level" . $i)))
													return apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access", array ("s2member_level_req" => $i), get_defined_vars ());
											}
										/**/
										for ($i = 0; $i <= 4; $i++) /* URIs. Go through each Membership Level. */
											{
												if ($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["level" . $i . "_ruris"])
													foreach (preg_split ("/[\r\n\t]+/", c_ws_plugin__s2member_ruris::fill_ruri_level_access_rc_vars ($GLOBALS["WS_PLUGIN__"]["s2member"]["o"]["level" . $i . "_ruris"], $current_user)) as $str)
														if ($str && preg_match ("/" . preg_quote ($str, "/") . "/", $tag_uri) && (!$check_user || !$current_user || !current_user_can ("access_s2member_level" . $i)))
															return apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access", array ("s2member_level_req" => $i), get_defined_vars ());
											}
									}
								/**/
								do_action ("ws_plugin__s2member_during_check_specific_ptag_level_access", get_defined_vars ());
							}
						/**/
						return apply_filters ("ws_plugin__s2member_check_specific_ptag_level_access", null, get_defined_vars ());
					}
			}
	}
?>