<?php
$term = get_queried_object();

$systems = new WP_Query([
    'post_type' => 'swatches',
    'posts_per_page' => '-1'
]);

$requirementTerms = get_terms( array(
    'taxonomy' => 'requirements'
) );

$subBaseTerms = get_terms( array(
    'taxonomy' => 'sub-bases'
) );

$projectTypesTerms = get_terms( array(
    'taxonomy' => 'project-types'
) );

$systemTerms = get_terms( array(
    'taxonomy' => 'swatch-systems'
) );

$image    = get_field('swatch_a_banner_background_image', 'option');
$title    = get_field('swatch_a_banner_title', 'option');
$text     = get_field('swatch_a_banner_text', 'option');
$button   = get_field('swatch_a_banner_button', 'option');

$gridTitle = get_field('swatch_a_grid_title', 'option');

get_header(); ?>
<style>
    .grid-container .systems-grid-item.gallery-grid-item .overlay-link {
    position: absolute;
    top: 23px;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10;
}
.grid-container .systems-grid-item.gallery-grid-item .text-overlay {
    background-color: #fff;
    position: absolute;
    z-index: 1;
    top: 31px;
    bottom: 3px;
    left: 3px;
    right: 3px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: opacity 0.2s;
    opacity: 0;
    padding: 12px;
}
.gform_wrapper.gravity-theme input[type=color], .gform_wrapper.gravity-theme input[type=date], .gform_wrapper.gravity-theme input[type=datetime-local], .gform_wrapper.gravity-theme input[type=datetime], .gform_wrapper.gravity-theme input[type=email], .gform_wrapper.gravity-theme input[type=month], .gform_wrapper.gravity-theme input[type=number], .gform_wrapper.gravity-theme input[type=password], .gform_wrapper.gravity-theme input[type=search], .gform_wrapper.gravity-theme input[type=tel], .gform_wrapper.gravity-theme input[type=text], .gform_wrapper.gravity-theme input[type=time], .gform_wrapper.gravity-theme input[type=url], .gform_wrapper.gravity-theme input[type=week], .gform_wrapper.gravity-theme select, .gform_wrapper.gravity-theme textarea {
    font-size: 15px;
    margin-bottom: 0;
    margin-top: 0;
    padding: 8px;
    border: 1px solid red !important;
}
.gform_body .gfield_label {
    color: #000000;
    font-family: Gotham-Book;
    font-weight: 500 !important;
    font-size: 14px !important;
    line-height: 22px !important;
}
.gform_wrapper.gravity-theme .ginput_complex select {
    width: 100%;
    padding: 18px;
}
.btn.btnSeeMore.sendme:hover {
    color: #fff;
}
</style>
<div class="systems-banner inner-banner" style="background-image: url('<?php echo $image; ?>')">
        <div class="site-container">
            <div class="overlay-container">
                <h2><?php echo $title; ?></h2>
                <?php echo $text; ?>
                <?php if (!empty($button)): ?><a href="<?php echo $button['url']; ?>" class="button button--red"><?php echo $button['title']; ?></a><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="swatchesBlgo">

    <div id="primary" class="content-area swatches_archive">
        <div id="content" class="site-content wrap" role="main">
            <?php if(get_field('swatch_a_important_notes', 'option')): ?>
                <div class="swatches_archive__important_notes">
                    <?php the_field('swatch_a_important_notes', 'option'); ?>
                </div>
            <?php endif; ?>
            <div class="archive-title-container">
                <h2><?php echo $gridTitle; ?></h2>
            </div>
            <div class="filters-container filters-container--4">
                <select class="filter-selector project-types-filter">
                    <option value="*">Project Types</option>
                    <?php foreach($projectTypesTerms as $projectTypesTerm): ?>
                        <option value=".<?php echo $projectTypesTerm->slug ?>"><?php echo $projectTypesTerm->name ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="filter-selector sub-bases-filter">
                    <option value="*">Type</option>
                     <option value="*">All</option>
                    <?php foreach($subBaseTerms as $subBaseTerm): ?>
                        <option value=".<?php echo $subBaseTerm->slug ?>"><?php echo $subBaseTerm->name ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="filter-selector requirements-filter">
                    <option value="*">Requirements</option>
                    <?php foreach($requirementTerms as $requirementTerm): ?>
                        <option value=".<?php echo $requirementTerm->slug ?>"><?php echo $requirementTerm->name ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="filter-selector systems-filter">
                    <option value="*">Systems</option>
                    <?php foreach($systemTerms as $systemTerm): ?>
                        <option value=".<?php echo $systemTerm->slug ?>"><?php echo $systemTerm->name ?></option>
                    <?php endforeach; ?>
                </select>

                <span class="filter-clear">Clear</span>
            </div>

            <div class="grid-container">
                <?php if ( $systems->have_posts() ) : while ( $systems->have_posts() ) : $systems->the_post();
                    $customThumbnail = get_field('custom_thumbnail_image', get_the_ID());
                    $requirements = get_the_terms( $systems->ID, 'requirements' );
                    $subBases = get_the_terms( $systems->ID, 'sub-bases' );
                    $projectTypes = get_the_terms( $systems->ID, 'project-types' );
                    $systemTerms = get_the_terms( $systems->ID, 'swatch-systems' );

                    if (empty($customThumbnail)) {
                        $customThumbnail = get_the_post_thumbnail_url(get_the_ID(),'box-4-square');
                        $lightbox = get_the_post_thumbnail_url(get_the_ID(),'full');
                    }
                    ?>

                    <div class="systems-grid-item gallery-grid-item <?php foreach ($requirements as $requirement){ echo $requirement->slug . ' '; }?><?php foreach ($subBases as $subBase){ echo $subBase->slug . ' '; }?><?php foreach ($projectTypes as $projectType){ echo $projectType->slug . ' '; }?><?php foreach ($systemTerms as $systemTerm){ echo $systemTerm->slug . ' '; }?>">
                          <input type="checkbox" class="sample_check sample_chk_<?php echo get_the_id(); ?>" id="sample_chk_<?php echo get_the_id(); ?>" data-title="<?php echo get_the_title(); ?>" data-img="<?=$customThumbnail?>" value="<?php echo get_the_id(); ?>">
                        <label for="sample_chk_<?php echo get_the_id(); ?>">Checkbox</label>
                        <a href="<?php echo $lightbox; ?>" class="overlay-link" data-lightbox="gallery">
                            
                        </a>
                        <img src="<?php echo $customThumbnail; ?>" />
                        <div class="text-overlay">
                            <span class="title"><?php echo get_the_title(); ?></span>
                            <span class="description"><?php the_content(); ?></span>
                        </div>
                        <span class="triangle"></span>
                        <img class="case-study-arrow" src="<?php echo get_stylesheet_directory_uri() . '/img/case-study-arrow.png'; ?>" />
                    </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <footer class="fixed-footer" style="display: none;">
                <div class="container">
                    <div class="fixed-footer-flex">
                        <h3 class="fixed-footer__heading">Your Sample Basket</h3> 
                        <ul class="fixed-footer__samples">
                           <!--  <li class="fixed-footer__samples-item">
                                <svg width="14px" height="14px" viewBox="0 0 14 14" class="remove-sample"><g id="Order-a-Sample" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-912.000000, -3831.000000)" id="Product"><g transform="translate(856.000000, 3831.000000)"><g id="Group-2" transform="translate(56.000000, 0.000000)"><circle id="Oval" fill="#FFFFFF" cx="7" cy="7" r="7"></circle> <path d="M4.5,4.5 L10,10" id="Line-3" stroke="#000000" stroke-linecap="square"></path> <path d="M4.5,4.5 L10,10" id="Line-3-Copy" stroke="#000000" stroke-linecap="square" transform="translate(7.000000, 7.000000) scale(-1, 1) translate(-7.000000, -7.000000) "></path></g></g></g></g></svg> <img src="https://millboard.s3-assets.com/productthumbnail/_productSample/enhanced-grain-antique-oak.jpg" alt="Antique Oak" width="70" height="70"> <p class="sample-category-tag">Decking</p> <small>Antique Oak</small>
                            </li> -->
                        </ul> 
                         <!--a href="javascript:void(0);" id="open-basket" class="button">Send me FREE samples</a-->
                        <a href="javascript:void(0);" class="buttonmdl btn btnSeeMore" data-toggle="modal" data-target="#exampleModal">Send me FREE samples</a>
                       </div>
                </div>
            </footer>
            <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-full">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel"></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                    <header class="page-header">
                       <!--  <svg width="5px" height="11px" viewBox="0 0 5 11" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" xmlns:xlink="http://www.w3.org/1999/xlink" class="page-header__back-icon"><g id="Design-Inspiration" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Design-Ideas-Gallery" transform="translate(-225.000000, -170.000000)" stroke="#777777"><polyline id="Path-2-Copy" transform="translate(227.500000, 175.500000) rotate(90.000000) translate(-227.500000, -175.500000) " points="223 173 227.5 178 232 173"></polyline></g></g></svg> <a href="" class="page-header__back" style="color: rgb(255, 255, 255);">
                    Order a Sample
                </a> -->  <form id="filter_mail_send" class="filter_mail_send" name="filter_mail_send" method="post" style="height: auto;width: 98%; display: inline-block;">
                    

                    <section class="page-header__content"><h1 class="page-header__heading">Your Sample Basket</h1> <ul class="fixed-footer__samples_div"></ul> <p class="page-header__text">
                        When processing your sample request, we will do our best to ship samples within 48 hours of
                        order. You will likely be contacted by one of our friendly team who can offer further
                        assistance with your project or additional information about our products and services.
                    </p> 
                    
                    <div class="form-block-inner">
                         <?php echo do_shortcode("[gravityform id='30' title='false']"); ?>
                         
                        <div class="form-row"><p><small class="terms">By submitting this form you agree to our <a href="https://millboard.co.uk/legal/privacy-policy">privacy policy</a> and understand that your information may be used by Millboard to contact you. You can request removal of your information at any time.</small></p></div></div></section></form></header></div>
            
                    </div>
                    <!--div class="modal-footer">
                        <button type="button" class="btn btn-success">Login</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div-->
                  </div>
                </div>
              </div>
                
            
            
            <div class="success_msg">
                
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 60%; margin: 1.75rem auto;">
            <div id="partial_model">
                 <div class="modal-content">
                    <div class="modal-header">
                       <h3 class="ptitle"> Sample</h3>  
                       
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                           X
                            
                        </div>
                    
                    </div>
                    <div class="modal-footer" style="justify-content:center;">
                        <button type="button" style="width:unset;"  class="btn btn-success waves-effect waves-light btn btnClass bg-gradient-info " data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.gform_hidden').remove();
            jQuery('.gform_title').hide();
            jQuery("input#input_30_1").attr("name","firstName");
            jQuery("input#input_30_3").attr("name","lastName");
            jQuery("input#input_30_4").attr("name","email");
            jQuery("input#field_30_5").attr("name","telephone");
            jQuery("input#input_30_6").attr("name","companyName");
            jQuery("input#input_30_7").attr("name","installedAt");
            jQuery("input#input_30_8_1").attr("name","address1");
            jQuery("input#input_30_8_2").attr("name","address2");
            jQuery("input#input_30_8_3").attr("name","townCity");
            jQuery("input#input_30_8_4").attr("name","state");
            jQuery("input#input_30_8_5").attr("name","postcode");
            jQuery("input#input_30_8_6").attr("name","country");
            jQuery("input#gform_submit_button_30").attr("class","btn btnSeeMore sendme");
            jQuery(".gform_body").append('<div class="error accept_term" style="font-weight: bold;display: none;">Please accept terms & condition and Privacy Policy</div>');
            var x = getCookie('samplecookie');
            var arr = x.split(',');
            jQuery.each( arr, function( index, value ) {
                
                jQuery('#sample_chk_'+value).trigger('click');
            });
        })
        jQuery('.sample_check').click(function(){
            var lengthdiv = jQuery('ul.fixed-footer__samples li').length;

                var img = jQuery(this).data('img');
                var title = jQuery(this).data('title');
                var id = jQuery(this).val();
                if (jQuery(this).prop('checked')==true){ 
                var html = '<li data-id="'+id+'" class="fixed-footer__samples-item sample_item_'+id+'">\
                                    <svg width="14px" height="14px" viewBox="0 0 14 14" class="remove-sample"><g id="Order-a-Sample" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-912.000000, -3831.000000)" id="Product"><g transform="translate(856.000000, 3831.000000)"><g id="Group-2" transform="translate(56.000000, 0.000000)"><circle id="Oval" fill="#FFFFFF" cx="7" cy="7" r="7"></circle> <path d="M4.5,4.5 L10,10" id="Line-3" stroke="#000000" stroke-linecap="square"></path> <path d="M4.5,4.5 L10,10" id="Line-3-Copy" stroke="#000000" stroke-linecap="square" transform="translate(7.000000, 7.000000) scale(-1, 1) translate(-7.000000, -7.000000) "></path></g></g></g></g></svg> <img src="'+img+'" alt="Antique Oak" width="70" height="70"><input type="hidden" name="selected_sample[]" value="'+id+'"><input type="hidden" name="selected_img[]" value="'+img+'">  <small>'+title+'</small>\
                                </li>';
                    if(lengthdiv < 3)
                    {
                        jQuery('.fixed-footer').show();
                        jQuery('.fixed-footer__samples').append(html);
                         var speciality = '';
                            jQuery( "ul.fixed-footer__samples li" ).each(function( index ) {
                                speciality1 = jQuery(this).data('id');
                                speciality += speciality1+",";
                            });
                            speciality = speciality.slice(0, -1);
                            setCookie('samplecookie',speciality,7);


                    }
                    else
                    {
                         jQuery('.success_msg').text('You can only add 3 decking samples.To change one please untick a decking sample');
                         toastr.error('You can only add 3 decking samples.To change one please untick a decking sample','Alert');

                        jQuery(this).prop('checked', false);
                    }
                }
                else
                {

                    jQuery('.sample_item_'+id).remove();

                    var lengthdiv = jQuery('ul.fixed-footer__samples li').length;
                    if(lengthdiv == 0)
                    {
                         jQuery('.fixed-footer').hide();
                    }
                    var speciality = '';
                    jQuery( "ul.fixed-footer__samples li" ).each(function( index ) {
                        speciality1 = jQuery(this).data('id');
                        speciality += speciality1+",";
                    });
                    speciality = speciality.slice(0, -1);
                    setCookie('samplecookie',speciality,7);
                }
                jQuery('.remove-sample').click(function(){
                    var id = jQuery(this).parent('li').data('id'); 
                    jQuery('.sample_item_'+id).remove();
                    
                    jQuery('.sample_chk_'+id).prop('checked', false);
                    var lengthdiv = jQuery('ul.fixed-footer__samples li').length;
                    if(lengthdiv == 0)
                    {
                         jQuery('.fixed-footer').hide();
                         jQuery('#exampleModal').modal('hide');
                    }
                    var speciality = '';
                    jQuery( "ul.fixed-footer__samples li" ).each(function( index ) {
                        speciality1 = jQuery(this).data('id');
                        speciality += speciality1+",";
                    });
                    speciality = speciality.slice(0, -1);
                    setCookie('samplecookie',speciality,7);
                });
            
            
        })
       
         jQuery('.buttonmdl').click(function(){
            jQuery('.fixed-footer').hide();
        //jQuery('#exampleModalLong').modal('show');
          var sample =   jQuery('ul.fixed-footer__samples').html();
            jQuery('ul.fixed-footer__samples_div').html(sample);
            jQuery('.remove-sample').click(function(){
                    var id = jQuery(this).parent('li').data('id'); 
                    jQuery('.sample_item_'+id).remove();
                    
                    jQuery('.sample_chk_'+id).prop('checked', false);
                    var lengthdiv = jQuery('ul.fixed-footer__samples li').length;
                    if(lengthdiv == 0)
                    {
                         jQuery('.fixed-footer').hide();
                         jQuery('button.close').trigger('click');
                    }
                });

        //jQuery('.send_mail').show();
        });
         jQuery('.button-text').click(function(){

            jQuery('.address_div').show();
            jQuery('#address-search').hide();
        });
         
         var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

         jQuery(document).on('submit','#filter_mail_send',function(e){

        e.preventDefault();

         if (jQuery('#choice_30_9_1').prop('checked')==true){ 

            jQuery('.accept_term').hide();
        var filter = ajax_url+'?action=filter_mail_send';
       
        var msgTemplate = '<div class="alert alert-{{type}}">' + '{{msg}}' +'</div>';
        //var data = new FormData(this);
        var formData=new FormData(document.getElementById('filter_mail_send')); 
        jQuery.ajax({
            type    : 'POST', 
            url     : filter,
            data    :  formData,     
            contentType: false,      
            cache: false,           
            processData:false,
            dataType: 'json',
           /* beforeSend : function() {
               jQuery('.loader').show();
              },*/
            success : function(res) {
               switch(res.data.type) {
                    case 'success' :
                        //jQuery('#formeMail').html(res.data.html);
                        //jQuery('.loader').hide();
                      // jQuery('.success_msg').text('Sent sample successfully.');
                        toastr.success('Sent sample successfully.','Alert');
                       // alert('Sent sample successfully.');
                        jQuery('button.close').trigger('click');
                        setCookie('samplecookie','',7);
                        break;
                    case 'failure' :
                        //jQuery('.success_msg').text('Something went wrong.');
                        toastr.success('Something went wrong.','Alert');
                        break;
                    default :
                        break;
                }
            },
            complete : function() {
                jQuery('.loader').hide();
                jQuery('#selectEmail').show();
            }
        });
        }
        else
        {
            jQuery('.accept_term').show();
        }
    });
         function setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
        function eraseCookie(name) {   
            document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    </script>
<?php get_footer(); ?>