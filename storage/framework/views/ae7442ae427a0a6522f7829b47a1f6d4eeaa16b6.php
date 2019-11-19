<?php $__env->startSection('css_link'); ?>
<link rel="stylesheet" type="text/css" href="/css/home_style.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_content'); ?>
<h1>Acceuil</h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<h2>Tu y trouveras toutes les informations que tu cherches sur le CESI Arras
      et sa vie
      étudiante.</h2>
<div class="container">
   
                        <div class="image"><a href="cesi"><img src="/pictures/cesi.jpg" alt="Photo Cesi"/></a></div>
                        <div class="image"><a href="arras"><img src="/pictures/arras.jpg" alt="Photo Arras"/></a></div>
                        <div class="image"><a href="bde"><img src="/pictures/bde.jpg" alt="Photo BDE"/></a></div>
                  </div>
                  
                  <div class="container">
                         
                        <div class="image"><a href="events"><img src="/pictures/evenements.jpg" alt="Photo évènements"/></a></div>
                        <div class="image"><a href="suggestion_box"><img src="/pictures/boite_a_idees.jpg" alt="Photo boîte à idées"/></a></div>
                        <div class="image"><a href="past_events"><img src="/pictures/past_events.png" alt="Photo évènements passé"/></a></div>
                  </div>
                  
                  <div class="container">
                         <div class="image"><a href="associations"><img src="/pictures/associations.jpg" alt="Photo associations"/></a></div>
                        <div class="image"><a href="shop"><img src="/pictures/shop.jpg" alt="Photo boutique"/></a></div>
                  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script_link'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>