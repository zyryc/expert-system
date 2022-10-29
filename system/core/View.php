<?php
namespace system;
// use Composer\Autoload\ClassLoader;
use Latte\Engine;
use Latte\Loaders\FileLoader;
use Latte\Macros\MacroSet;
use Latte\MacroNode;
use Latte\PhpWriter;
use Latte\Runtime\Filters;
use Latte\Runtime\FilterInfo;
use Latte\Runtime\SnippetBridge;
use Latte\Runtime\Template;
use Latte\Runtime\TemplateHelpers;
use Latte\Runtime\UIMacros;
use Latte\Runtime\UIRuntime;
use Latte\Runtime\UIRuntimeHelper;
use Latte\Runtime\UIRuntimeHtml;
use Latte\Runtime\UIRuntimeMacros;
use Latte\Runtime\UIRuntimeSnippet;
use Latte\Runtime\UIRuntimeVar;
use Latte\Runtime\UIRuntimeVarBlock;
use Latte\Runtime\UIRuntimeVarCapture;
use Latte\Runtime\UIRuntimeVarContent;
use Latte\Runtime\UIRuntimeVarElement;
use Latte\Runtime\UIRuntimeVarForm;
use Latte\Runtime\UIRuntimeVarInput;
use Latte\Runtime\UIRuntimeVarLabel;
use Latte\Runtime\UIRuntimeVarLink;
use Latte\Runtime\UIRuntimeVarSelect;
use Latte\Runtime\UIRuntimeVarTag;
use Latte\Runtime\UIRuntimeVarTemplate;
use Latte\Runtime\UIRuntimeVarText;
use Latte\Runtime\UIRuntimeVarTextarea;
use Latte\Runtime\UIRuntimeVarUpload;
use Latte\Runtime\UIRuntimeVarUploadFile;
use Latte\Runtime\UIRuntimeVarUploadImage;
use Latte\Runtime\UIRuntimeVarUploadMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleImage;
use Latte\Runtime\UIRuntimeVarUploadMultipleImageFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleImageFileMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleImageMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleImage;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleImageFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleImageFileMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleImageMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleImage;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleImageFile;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleImageFileMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleImageMultiple;
use Latte\Runtime\UIRuntimeVarUploadMultipleMultipleMultipleMultiple;

trait View
{
    public function __construct()
    {
        echo 'View.php';
    }
    public function view($view, $data = [])
    {
        $view_file = MODULES . 'views/' . $view . '.latte';
        // check if view file exists
        if (file_exists($view_file)) {
            $latte->render('$view_file', new MailTemplateParameters(
                $data
            ));
        }
    }
}
function view($view, $data = [])
    {
        $view_file = MODULES . 'views/' . $view . '.latte';
        // check if view file exists
        if (file_exists($view_file)) {
            $latte->render('$view_file', new MailTemplateParameters(
                $data
            ));
        }
    }