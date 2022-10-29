<?php

// open files in app/modules/controllers and require them

foreach($modules as $module) {
    foreach (glob("app/modules/$module/controllers/*.php") as $filename) {
        // require the file    
        require_once $filename;
    }
}

// view(url, data)
function view($view, $data = [])
{
    // open files in resources/views and require them
    $view_folder = scandir('resources/views');
    // open files in resources/views/$view and require them
    $view_file = 'resources/views/'.$view;
    // require files in resources/views/$view
    // extract data to variables
    // $data_keys = 
    require_once $view_file.'.php';

//     $latte = new Latte\Engine;
// // cache directory
// $latte->setTempDirectory('resources/views/');

// // $params = [ /* template variables */ ];
// $params = new TemplateParameters(items: []);

// // render to output
// $latte->render('resources/views/'.$view.'.latte', $params);
// // or render to variable
// // $output = $latte->renderToString($view.'.latte', $params);

}
