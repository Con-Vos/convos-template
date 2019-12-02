<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if ($task == "edit" || $layout == "form") {
    $fullWidth = 1;
} else {
    $fullWidth = 0;
}

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Add scripts
JHtml::_('jquery.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/popper.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// Adjusting content width
if ($this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
    $span = "col-md-6";
} elseif ($this->countModules('sidebar-left') && !$this->countModules('sidebar-right')) {
    $span = "col-md-9";
} elseif (!$this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
    $span = "col-md-9";
} else {
    $span = "col-md-12";
}

use Joomla\CMS\Factory;
$menu = JFactory::getApplication()->getMenu();

$this->setGenerator(null);
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <jdoc:include type="head" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800,900&display=swap" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
        <![endif]-->
        <meta property=og:image content=http://www.estoyconvos.org/logo-og.jpg>
        <meta property=og:title content="Con Vos">
        <meta property=og:description content="El espacio en el que las y los guatemaltecos analicen la realidad nacional y generen conocimiento que pueda transformarse en proyectos válidos y viables que solucionen las problemáticas identificadas para el beneficio de todos y todas.">
    </head>
    <body>
        <header class="navbar navbar-expand-lg navbar-light bg-faded">
          <div class="container">
            <div class="row">
              <div class="col-6 col-lg-3">
      			    <a class="navbar-brand" href="<?php echo JURI::base(); ?>"><img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logo.png'; ?>" alt="<?php echo $app->get('sitename'); ?>" /></a>
			        </div>
			        <div class="col-lg-7 d-none d-lg-block">
                <div class="collapse navbar-collapse">
                  <jdoc:include type="modules" name="navbar-1" style="none" />
                </div>
			        </div>
			        <div class="col-6 col-lg-2">
			          <div class="header-buttons float-right">
			            <jdoc:include type="modules" name="navbar-2" style="none" />
			            <button class="navbar-toggler navbar-inverse navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarHoverMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				            <span class="navbar-toggler-icon"></span>
                    <div class="d-lg-none">
                      <div class="collapse navbar-collapse" id="navbarHoverMenu">
                          <jdoc:include type="modules" name="navbar-1" style="none" />
                      </div>
                    </div>
			            </button>
		            </div>
              </div>
            </div>
          </div>
        </header>
        <div class="body">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div id="content" role="main" class="<?php echo $span; ?>">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer bg-faded text-muted" role="contentinfo">
            <hr />
            <div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
                <div class="row">
                    <div class="col-sm-4"><p>
                            &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <jdoc:include type="modules" name="footer" style="none" />
                        <p></p>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
        </footer>
        <jdoc:include type="modules" name="debug" style="none" />
    </body>
    <script>
      jQuery(document).ready(function() {
        jQuery('.cover-img-col').height(jQuery('.cover-img').width()/2.77);
      });
    </script>
</html>
