<?php

function desk_contact_chat_widget(){

    $widget = <<<WIDGET
    <script type="text/javascript">
	<!--
	deskwidget();
	//--></script>
WIDGET;

    return $widget;
}
add_shortcode( 'desk_contact_chat_widget_embed', 'desk_contact_chat_widget' );

?>