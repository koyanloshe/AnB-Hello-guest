<?php

add_action( 'customize_register', 'themename_customize_register' );
function themename_customize_register($wp_customize) {
	$wp_customize->add_setting( 'developedbya&b_theme_options[color_scheme]', array(
    'default'        => 'some-default-value',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

	}
?>

<!-- <?php if ($video) : ?><? echo "$video";?>"
<?php else : ?>
<?php endif; ?> -->