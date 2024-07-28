<div class="logo">
                        <a href="<?php echo esc_url(home_url()); ?>"><?php

							if (!empty($ROSEMARY_GLOBALS['logo']) || !empty($ROSEMARY_GLOBALS['logo_fixed'])  ) {
								echo !empty($ROSEMARY_GLOBALS['logo'])
									? '<img src="'.esc_url($ROSEMARY_GLOBALS['logo']).'" class="logo_main" alt="">'
									: '';
								echo !empty($ROSEMARY_GLOBALS['logo_fixed'])
									? '<img src="'.esc_url($ROSEMARY_GLOBALS['logo_fixed']).'" class="logo_fixed" alt="">'
									: '';
//								echo ($ROSEMARY_GLOBALS['logo_text']
//									? '<div class="logo_text">'.($ROSEMARY_GLOBALS['logo_text']).'</div>'
//									: '<div class="logo_text">'.get_bloginfo('name').'</div>');
								echo ($ROSEMARY_GLOBALS['logo_slogan']
									? '<br><div class="logo_slogan">' . esc_html($ROSEMARY_GLOBALS['logo_slogan']) . '</div>'
									: '');
							} else {
								echo ($ROSEMARY_GLOBALS['logo_text']
									? '<div class="logo_text">'.($ROSEMARY_GLOBALS['logo_text']).'</div>'
									: '<div class="logo_text">'.get_bloginfo('name').'</div>');
								echo ($ROSEMARY_GLOBALS['logo_slogan']
									? '<br><div class="logo_slogan">' . esc_html($ROSEMARY_GLOBALS['logo_slogan']) . '</div>'
									: '');
							}

							?></a>
                    </div>