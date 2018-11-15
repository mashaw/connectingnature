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



function connectingnature_form_alter(&$form, &$form_state, $form_id) {
  // Check when the right form is passed

   if($form_id == "views_exposed_form"){
    if (isset($form['combine'])) {
            $form['combine']['#attributes'] = array('placeholder' => array(t('Enter search terms:')));
    }
  }

}





function  connectingnature_css_alter(&$css) {
 $exclude = array(
//'sites/all/libraries/leaflet/leaflet.css' => FALSE ,
'sites/all/modules/flexslider/assets/css/flexslider_img.css' => FALSE);
$css = array_diff_key($css, $exclude);

}


