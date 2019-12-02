<?php
/**
 * @version    2.10.x
 * @package    K2
 * @author     JoomlaWorks https://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2019 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;

?>
<?php
  $iFoto = '';
  $iPC = '';
  $iDT = '';
  $iHI = '';
  $iFC = '';
  $iCT = '';
  $iIA = '';
  foreach ($this->item->extra_fields as $key => $extraField) {
    switch ($extraField->alias) {
      case 'foto':
        $iFoto = $extraField->value;
        break;
      case 'participacioncomprometida':
        $iPC = $extraField->value;
        $iPCImage = "Off";
        if ($iPC == "Si")
          $iPCImage = "On";
        break;
      case 'difusiontransparente':
        $iDT = $extraField->value;
        $iDTImage = "Off";
        if ($iDT == "Si")
          $iDTImage = "On";
        break;
      case 'historiaqueincide':
        $iHI = $extraField->value;
        $iHIImage = "Off";
        if ($iHI == "Si")
          $iHIImage = "On";
        break;
      case 'fotogenicoconcausa':
        $iFC = $extraField->value;
        $iFCImage = "Off";
        if ($iFC == "Si")
          $iFCImage = "On";
        break;
      case 'constructordetransparencia':
        $iCT = $extraField->value;
        $iCTImage = "Off";
        if ($iCT == "Si")
          $iCTImage = "On";
        break;
      case 'influenceractivista':
        $iIA = $extraField->value;
        $iIAImage = "Off";
        if ($iIA == "Si")
          $iIAImage = "On";
        break;
    }
  }  
  $xpath = new DOMXPath(@DOMDocument::loadHTML($iFoto));
  $imgPath = $xpath->evaluate("string(//img/@src)");

?>
<div class="row item-head">
  <div class="col-12 col-md-5 col-lg-3">
    <h2 class="nCatTitle-<?php echo $this->item->category->alias; ?>"><?php echo $this->item->category->name; ?></h2>
  </div>
  <div class="col-12 col-md-7 col-lg-9">
    <div class="pull-right">
      <?php if($this->item->category->name == "Ciudadanía"): ?>
        <a href="<?php echo Route::_('index.php?option=com_content&view=article&id=6'); ?>"><img src="/templates/convos-template/images/icons/catCiudadania.jpg" /></a>
      <?php elseif($this->item->category->name == "Organizaciones"): ?>
        <a href="<?php echo Route::_('index.php?option=com_content&view=article&id=7'); ?>"><img src="/templates/convos-template/images/icons/catOrganizacion.jpg" /></a>
      <?php elseif($this->item->category->name == "Políticos"): ?>
        <a href="<?php echo Route::_('index.php?option=com_content&view=article&id=8'); ?>"><img src="/templates/convos-template/images/icons/catPolitico.jpg" /></a>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-4">
    <div class="catItemImage rounded-circle">        
      <img class="img-fluid" src="/images/uploads<?php echo $imgPath; ?>" />
    </div>
    <h3 class="itemTitle"><?php echo $this->item->title; ?></h3>
  </div>
  <div class="d-none d-md-block col-md-1"></div>
  <div class="col-12 col-md-6">
    <div class="row inRow">
      <div class="col-4">
        <?php if ($iPC != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" data-html="true" title="<h4>Participación comprometida</h4><p>Gana esta insignia al ingresar a la Red de incidencia.</p>" class="gIcon" src="/templates/convos-template/images/icons/Pc<?php echo $iPCImage; ?>.png" />
          <span class="insigniaT">Participación comprometida</span>
        <?php endif; ?>
      </div>
      <div class="col-4">
        <?php if ($iHI != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" class="gIcon" data-html="true" title="<h4>Historia que incide</h4><p>Gana esta insignia al contarnos una historia de cómo afecta la corrupción. Utiliza el hashtag #GuatemalaNítida y etiqueta a Con Vos</p>" src="/templates/convos-template/images/icons/Hi<?php echo $iHIImage; ?>.png" />
          <span class="insigniaT">Historia que incide</span>
        <?php endif; ?>
      </div>      
      <div class="col-4">
        <?php if ($iFC != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" data-html="true" title="<h4>Fotogénico con causa</h4><p>Gana esta insignia al subir una foto con un cartel que tenga el hashtag #GuatemalaNítida, recuerda etiquetarnos.</p>" class="gIcon" src="/templates/convos-template/images/icons/Fc<?php echo $iFCImage; ?>.png" />
          <span class="insigniaT">Fotogénico con causa</span>
        <?php endif; ?>
      </div>      
    </div>
    <div class="row inRow">
      <div class="col-4">
        <?php if ($iDT != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" data-html="true" title="<h4>Difusión transparente</h4><p>Gana esta insignia al compartir tu compromiso en redes sociales.  Recuerda etiquetarnos.</p>" class="gIcon" src="/templates/convos-template/images/icons/Dt<?php echo $iDTImage; ?>.png" />
          <span class="insigniaT">Difusión transparente</span>
        <?php endif; ?>
      </div>
      <div class="col-4">
        <?php if ($iCT != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" data-html="true" title="<h4>Constructor de transparencia</h4><p>Gana esta insignia al recolectar información pública, luego cuentanos cómo lo hiciste usando el hashtag #GuatemalaNítida y etiquetándonos.</p>" class="gIcon" src="/templates/convos-template/images/icons/Ct<?php echo $iCTImage; ?>.png" />
          <span class="insigniaT">Constructor de transparencia</span>
        <?php endif; ?>
      </div>
      <div class="col-4">
        <?php if ($iIA != ''): ?>
          <img class="insigniaI" data-toggle="tooltip" data-html="true" title="<h4>Influencer activista</h4><p>Gana esta insignia al ser difusor de la iniciativa.</p>" class="gIcon" src="/templates/convos-template/images/icons/Ia<?php echo $iIAImage; ?>.png" />
          <span class="insigniaT">Influencer activista</span>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-1"></div>
</div>
<!-- Start K2 Item Layout -->
<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>
<div class="row grayRow">
  <div class="col-2"></div>
  <div class="col-8 comp">
    <h4>Compromiso</h4><img class="checkComp" src="/templates/convos-template/images/icons/iconos13.png" />
    <?php if($this->item->category->name == 'Ciudadanía'): ?>
      <p>Yo: <?php echo $this->item->title; ?>, soy un <b>Ciudadano Nítido</b>.  Estoy comprometido a crear una Guatemala transparente, a través de fiscalizar a las autoridades, denunciar actos de corrupción y no formar parte de ningún acto que falte a la cultura de legalidad. </p>  
    <?php elseif($this->item->category->name == 'Organizaciones'): ?>
      <p>Con Vos, certifica a: <?php echo $this->item->title; ?> como una <b>Organización Nítida</b>.  Que se compromete a estar a favor de la transparencia, e incluir en su agenda estratégica, un proyecto como mínimo, que genere incidencia por la transparencia.</p>
    <?php elseif($this->item->category->name == 'Políticos'): ?>
      <p>Yo: <?php echo $this->item->title; ?>, soy un <b>Político Nítido</b>.  Estoy comprometido a hacer una gestión transparente e impulsar iniciativas que generen transparencia.</p>  
    <?php endif; ?>
  </div>
  <div class="col-2"></div>
</div>
<script>
  jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('.catItemImage').height(jQuery('.catItemImage').width());
  });
</script>

