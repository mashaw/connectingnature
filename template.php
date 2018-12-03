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


function connectingnature_file_icon($variables) {
  $file = $variables['file'];
  $alt = $variables['alt'];
  $icon_directory = $variables['icon_directory'];

  $mime = check_plain($file->filemime);
  $icon_url = file_icon_url($file, $icon_directory);
  return '<img class="file-icon xxxxx" alt="' . check_plain($alt) . '" title="' . $mime . '" src="' . $icon_url . '" />';
}



function connectingnature_file_link($variables) {
 $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];
  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));
  $options = array(
    'attributes' => array(
       'type' => $file->filemime . '; length=' . $file->filesize,
     ),
  );
  if (empty($file->description)) {
    $link_text = $file->filename;
  } else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }
  return '<span class="file"'  . l($link_text, $url, $options) . '</span>';
}

