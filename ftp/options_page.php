<?php 
// регистрация настроек
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'section_main_page',
        array(
            'title' => 'Настройки темы: главная страница',
            'description' => 'Главная страница',
            'priority' => 1,
        )
    );

    init_main_page_inputs($customizer);
});

function init_main_page_inputs($customizer){
	// картинка в хидере (слева)
	$customizer->add_setting(
    'input_left_image',
    array('default' => 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic1.jpg')
	);
	// контрол
	$customizer->add_control(
    'input_left_image',
    array(
        'label' => 'Ссылка на картинку вверху слева',
        'section' => 'section_main_page',
        'type' => 'text',
    )
	); 
}
?>