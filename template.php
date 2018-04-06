<?php function connectingnature_menu_link__menu_block($variables) {
 return theme_menu_link($variables);
 }




function connectingnature_preprocess_html(&$vars) {
  $path = drupal_get_path_alias();
  $aliases = explode('/', $path);

  foreach($aliases as $alias) {
    $vars['classes_array'][] = drupal_clean_css_identifier($alias);
  }
}
