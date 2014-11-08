<?php
function register_menu() {
	register_nav_menu('Assigned Menu', __('Ubercoool'));
}
add_action('init', 'register_menu');

// indsæt her functions til at lægge scripts i kø



?>