<?php
add_filter( 'mce_buttons', 'mce_add_more_buttons_1', 1, 2 );
function mce_add_more_buttons_1( $buttons, $id ){

   if ( 'content' != $id )
       return $buttons;

   array_splice( $buttons, 13, 0, 'wp_page' );
   $buttons[] = 'fullscreen';

   return $buttons;
}

add_filter( 'mce_buttons_2', 'mce_add_more_buttons_2', 1, 2 );
function mce_add_more_buttons_2( $buttons, $id ){

   if ( 'content' != $id )
       return $buttons;

   array_splice( $buttons, 0, 0, 'fontselect' );
   array_splice( $buttons, 1, 0, 'fontsizeselect' );
   array_splice( $buttons, 2, 0, 'styleselect' );
   array_splice( $buttons, 6, 0, 'backcolor' );

   return $buttons;
}

// add_filter( 'mce_buttons_3', 'mce_add_more_buttons_3', 1, 2 );
// function mce_add_more_buttons_3( $buttons, $id ){
//
//   if ( 'content' != $id )
//     return $buttons;
//
//   $buttons[] = '|';
//
//   return $buttons;
// }

// bold
// italic
// underline
// strikethrough
// justifyleft
// justifycenter
// justifyright
// justifyfull
// bullist
// numlist
// outdent
// indent
// cut
// copy
// paste
// undo
// redo
// link
// unlink
// image
// cleanup
// help
// code
// hr
// removeformat
// formatselect
// fontselect
// fontsizeselect
// styleselect
// sub
// sup
// forecolor
// backcolor
// forecolorpicker
// backcolorpicker
// charmap
// visualaid
// anchor
// newdocument
// blockquote
// separator ( | is possible as separator, too/)

// plugins:
// advhr
// emotions
// fullpage
// fullscreen
// iespell
// media
// nonbreaking
// pagebreak
// preview
// print
// spellchecker
// visualchars


// Plugins with custom buttons:
// advlink
// Will override the "link" button
// advimage
// Will override the "image" button
// paste
// pastetext
// pasteword
// selectall
// searchreplace
// search
// replace
// insertdatetime
// insertdate
// inserttime
// table
// tablecontrols
// table
// row_props
// cell_props
// delete_col
// delete_row
// col_after
// col_before
// row_after
// row_before
// split_cells
// merge_cells
// directionality
// ltr
// rtl
// layer
// moveforward
// movebackward
// absolute
// insertlayer
// save
// save
// cancel
// style
// styleprops
// xhtmlxtras
// cite
// abbr
// acronym
// ins
// del
// attribs
// template
// template
