<?php
   
namespace App\Console\Commands;
use Dcblogdev\Xero\Facades\Xero;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;

use GuzzleHttp\Client;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceImage;
use App\Models\Cms\Attraction;
use App\Models\Cms\ExperiencesToAttraction;


use App\Models\Cms\AttractionImage;
use App\Models\Cms\ExperiencesToGallery;
use App\Models\Cms\ExperiencesToGalleryImages;
use App\Models\Cms\Country;
use App\Models\Cms\CountryArea;
use App\Models\Cms\ExperiencesToCountryAreas;
use App\Models\Cms\ExperienceCategory;
use App\Models\Cms\Hotel;
use App\Models\Cms\ExperiencesToHotel;
use App\Models\Cms\ExperiencesToFixtures;
use App\Models\Cms\ExperiencesToReviews;
use App\Models\Cms\ExperiencesToInclusions;
use App\Models\Cms\ExperienceDateAdditionalText;

use App\Models\Cms\Brochures;

use App\Models\Cms\HotelImage;
use App\Models\Cms\HotelAmenity;
use App\Models\Cms\BTExtraMaster;
use App\Models\Cms\BTCoachMaster;
class BTExperienceUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BT:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update experience on BT';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         
        error_reporting(E_ALL);
        $url = getenv('IMAGE_URL').'api/get_experience_data';
        //$url = 'https://tours-system-com.stackstaging.com/api/get_experience_data';
        $client = new Client();

        try {
            $response = $client->request('get', $url, [
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $items = json_decode($response->getBody()->getContents(), true);
            
            if(!empty($items['data'][0]))
            {
                $data = $items['data'];
                
                foreach ($data as $key => $row) {
                    
                    //add/edit experience
                    $addExperienceArray = [];
                    $addExperienceArray['id'] = $row['id'];
                    $addExperienceArray['exp_type'] = $row['exp_type'];
                    $addExperienceArray['experience_types_id'] = 5;
                    $addExperienceArray['tour_id'] = $row['tour_id'];
                    $addExperienceArray['country'] = $row['country'];
                    $addExperienceArray['name'] = $row['name'];
                    $addExperienceArray['slug_name'] = $row['slug_name'];
                    $addExperienceArray['excerpt'] = $row['excerpt'];
                    $addExperienceArray['description'] = $row['description'];
                    $addExperienceArray['hotel_label_1'] = $row['hotel_label_1'];
                    $addExperienceArray['hotel_label_2'] = $row['hotel_label_2'];
                    $addExperienceArray['price'] = $row['price'];
                    $addExperienceArray['price_ss'] = $row['price_ss'];
                    $addExperienceArray['mobility'] = $row['mobility'];
                    $addExperienceArray['show_tour'] = $row['show_tour'];
                    
                    $addExperienceArray['fixtures'] = $row['fixtures'];
                    $addExperienceArray['accommodation'] = $row['accommodation'];
                    $addExperienceArray['fixture_option'] = $row['fixture_option'];
                    $addExperienceArray['map_url'] = $row['map_url'];
                    $addExperienceArray['video_title'] = $row['video_title'];
                    $addExperienceArray['video'] = $row['video'];
                    $addExperienceArray['country'] = $row['country'];
                    $addExperienceArray['currency'] = !empty($row['currency'])?$row['currency']:'';
                    $addExperienceArray['rate'] = !empty($row['rate'])?$row['rate']:'';
                    $addExperienceArray['enquiry_rate'] = !empty($row['enquiry_rate'])?$row['enquiry_rate']:'';
                    $addExperienceArray['srs'] = !empty($row['srs'])?$row['srs']:'';
                    $addExperienceArray['nights'] = !empty($row['nights'])?$row['nights']:'';
                    $addExperienceArray['ref_number'] = $row['ref_number'];
                    $addExperienceArray['eta'] = $row['eta'];
                    $addExperienceArray['etd'] = $row['etd'];
                    $addExperienceArray['dinner'] = $row['dinner'];
                    $addExperienceArray['breakfast'] = $row['breakfast'];
                    $addExperienceArray['tour_inclusions'] = $row['tour_inclusions'];   
                    $addExperienceArray['coach_hire_cost'] = $row['coach_hire_cost'];
                    $addExperienceArray['avg_cost_fixture'] = $row['avg_cost_fixture'];                
                    $addExperienceArray['created_by'] = $row['created_by'];
                    $addExperienceArray['updated_by'] = $row['updated_by'];
                    // $addExperienceArray['active'] = '1';
                    $addExperienceArray['active'] = $row['active'];
                    
                    $experience = Experience::where('id',$row['id'])->first();

                    if(!empty($experience))
                    {
                        $experience->update($addExperienceArray);
                        
                    }
                    else
                    {

                        $experience = Experience::create($addExperienceArray);
                        
                    }
                   
                    //experience image
                    $photos = [];
                    if(isset($row["experience_images"])){
                        foreach ($row["experience_images"] as $photo) {
                             $experienceImg = ExperienceImage::where('experiences_id',$photo['experiences_id'])->first();

                                if (!empty($experienceImg)) {
                                    ExperienceImage::where('experiences_id',$photo['experiences_id'])->update([
                                        'experiences_id' => $photo['experiences_id'],
                                        'file' => $photo['file']
                                    ]);
                                }
                                else
                                {
                                    $experience_photo = ExperienceImage::create([
                                        'experiences_id' => $photo['experiences_id'],
                                        'file' => $photo['file']
                                    ]);
                                }
                           
                        }
                    }
                    //experience attraction
                    if(isset($row["experience_attractions"])){
                        $attraction_id=array();
                         $pivot_id=array();
                           $att_img_id=array();

                        foreach ($row["experience_attractions"] as $attraction) {
                            //check attaction
                            
                            $addAttArray['id'] = !empty($attraction['id'])?$attraction['id']:'';
                            $addAttArray['type_id'] = !empty($attraction['type_id'])?$attraction['type_id']:'';
                            $addAttArray['country_areas_id'] = !empty($attraction['country_areas_id'])?$attraction['country_areas_id']:'';
                            $addAttArray['name'] = !empty($attraction['name'])?$attraction['name']:'';
                            $addAttArray['score'] = !empty($attraction['score'])?$attraction['score']:'';
                            $addAttArray['distance_from_vip_miles'] = !empty($attraction['distance_from_vip_miles'])?$attraction['distance_from_vip_miles']:'';
                            $addAttArray['icon'] = !empty($attraction['icon'])?$attraction['icon']:'';
                            $addAttArray['website'] = !empty($attraction['website'])?$attraction['website']:'';
                            $addAttArray['"tripadvisor_url'] = !empty($attraction['"tripadvisor_url'])?$attraction['"tripadvisor_url']:'';
                            $addAttArray['mobility'] = !empty($attraction['mobility'])?$attraction['mobility']:'';
                            $addAttArray['activity_level'] = !empty($attraction['activity_level'])?$attraction['activity_level']:'';
                            $addAttArray['pos'] = !empty($attraction['pos'])?$attraction['pos']:'';
                            $addAttArray['active'] = !empty($attraction['active'])?$attraction['active']:'';
                            $addAttArray['vip'] = !empty($attraction['vip'])?$attraction['vip']:'';
                            $addAttArray['big'] = !empty($attraction['big'])?$attraction['big']:'';
                            $addAttArray['local'] = !empty($attraction['local'])?$attraction['local']:'';
                            $addAttArray['reason_considaring'] = !empty($attraction['reason_considaring'])?$attraction['reason_considaring']:'';
                            $addAttArray['estimated_cost_pp'] = !empty($attraction['estimated_cost_pp'])?$attraction['estimated_cost_pp']:'';
                            $addAttArray['estimated_in_rate'] = !empty($attraction['estimated_in_rate'])?$attraction['estimated_in_rate']:'';
                            $addAttArray['estimated_cost_pp_euro'] = !empty($attraction['estimated_cost_pp_euro'])?$attraction['estimated_cost_pp_euro']:'';
                            $addAttArray['estimated_in_rate_euro'] = !empty($attraction['estimated_in_rate_euro'])?$attraction['estimated_in_rate_euro']:'';
                            $addAttArray['location_url'] = !empty($attraction['ocation_url'])?$attraction['ocation_url']:'';
                            $addAttArray['owner'] = !empty($attraction['owner'])?$attraction['owner']:'';
                            $addAttArray['half_full'] = !empty($attraction['half_full'])?$attraction['half_full']:'';
                            $addAttArray['contact_name'] = !empty($attraction['contact_name'])?$attraction['contact_name']:'';
                            $addAttArray['contact_position'] = !empty($attraction['contact_position'])?$attraction['contact_position']:'';
                            $addAttArray['main_contact_number'] = !empty($attraction['main_contact_number'])?$attraction['main_contact_number']:'';
                            $addAttArray['direct_contact_number'] = !empty($attraction['direct_contact_number'])?$attraction['direct_contact_number']:'';
                            $addAttArray['email'] = !empty($attraction['email'])?$attraction['email']:'';
                            $addAttArray['street'] = !empty($attraction['street'])?$attraction['street']:'';
                            $addAttArray['city'] = !empty($attraction['city'])?$attraction['city']:'';
                            $addAttArray['postcode'] = !empty($attraction['postcode'])?$attraction['postcode']:'';
                            $addAttArray['satnav_postcode'] = !empty($attraction['satnav_postcode'])?$attraction['satnav_postcode']:'';
                            $addAttArray['arrival_procedure'] = !empty($attraction['arrival_procedure'])?$attraction['arrival_procedure']:'';
                            $addAttArray['coach_parking'] = !empty($attraction['coach_parking'])?$attraction['coach_parking']:'';
                            $addAttArray['latitude'] = !empty($attraction['latitude'])?$attraction['latitude']:'';
                            $addAttArray['longitude'] = !empty($attraction['longitude'])?$attraction['longitude']:'';
                            $addAttArray['country'] = !empty($attraction['country'])?$attraction['country']:'';
                            $addAttArray['confirm_description'] = !empty($attraction['confirm_description'])?$attraction['confirm_description']:'';
                            $addAttArray['free_place'] = !empty($attraction['free_place'])?$attraction['free_place']:'';
                            $addAttArray['group_size'] = !empty($attraction['group_size'])?$attraction['group_size']:'';
                            $addAttArray['mobility_access'] = !empty($attraction['mobility_access'])?$attraction['mobility_access']:'';
                            $addAttArray['terms_conditions'] = !empty($attraction['terms_conditions'])?$attraction['terms_conditions']:'';
                            $addAttArray['story'] = !empty($attraction['story'])?$attraction['story']:'';
                            $addAttArray['inclusions'] = !empty($attraction['inclusions'])?$attraction['inclusions']:'';
                            $addAttArray['date'] = !empty($attraction['date'])?$attraction['date']:'';
                            $addAttArray['time'] = !empty($attraction['time'])?$attraction['time']:'';
                            $addAttArray['inclusion_name'] = !empty($attraction['inclusion_name'])?$attraction['inclusion_name']:'';
                            $addAttArray['ref_nr'] = !empty($attraction['ref_nr'])?$attraction['ref_nr']:'';
                            $addAttArray['attractionsAvailability'] = !empty($attraction['attractionsAvailability'])?$attraction['attractionsAvailability']:'';
                            $addAttArray['attractionsDaysAvailability'] = !empty($attraction['attractionsDaysAvailability'])?$attraction['attractionsDaysAvailability']:'';
                            $addAttArray['exp_inclusions'] = !empty($attraction['exp_inclusions'])?$attraction['exp_inclusions']:'';
                            $addAttArray['coach_dropoff'] = !empty($attraction['coach_dropoff'])?$attraction['coach_dropoff']:'';
                            $addAttArray['coach_parking_voucher'] = !empty($attraction['coach_parking_voucher'])?$attraction['coach_parking_voucher']:'';
                            $addAttArray['general_info'] = !empty($attraction['general_info'])?$attraction['general_info']:'';
                            $addAttArray['additional_info'] = !empty($attraction['additional_info'])?$attraction['additional_info']:'';
                            $addAttArray['created_at'] = !empty($attraction['created_at'])?$attraction['created_at']:'';
                            $addAttArray['updated_at'] = !empty($attraction['updated_at'])?$attraction['updated_at']:'';
                            $addAttArray['deleted_at'] = (!empty($attraction['deleted_at']) && $attraction['deleted_at'] !='0000-00-00 00:00:00')?$attraction['deleted_at']:NULL;
                            $attractionData = Attraction::where('id',$attraction['id'])->first();
                            if(!empty($attractionData))
                            {
                                $attractionData->update($addAttArray);
                                $attraction_id[] = $attraction['id'];
                            }
                            else
                            {
                                $attractionData = Attraction::create($addAttArray);
                               
                                $attraction_id[] = $attractionData->id;
                            }

                                //update experience to attraction
                                if(isset($attraction["pivot"])){
                                   

                                    
                                        $attractionPivot = ExperiencesToAttraction::where('experiences_id',$attraction["pivot"]['experiences_id'])->where('attractions_id',$attraction["pivot"]['attractions_id'])->first();

                                        $addAttPivotArray['experiences_id'] = !empty($attraction["pivot"]['experiences_id'])?$attraction["pivot"]['experiences_id']:'';
                                        $addAttPivotArray['attractions_id'] = !empty($attraction["pivot"]['attractions_id'])?$attraction["pivot"]['attractions_id']:'';

                                        if(!empty($attractionPivot))
                                        {
                                            $attractionPivot->update($addAttPivotArray);
                                            $pivot_id[]=$attraction["pivot"]['attractions_id'];
                                        }
                                        else
                                        {
                                            $attractionPivot = ExperiencesToAttraction::create($addAttPivotArray);
                                            $pivot_id[]=$attraction["pivot"]['attractions_id'];
                                        }
                                       
                                }
                                //update attraction image
                                if(isset($attraction["attraction_images"])){
                                  
                                    foreach ($attraction["attraction_images"] as $atImage) {
                                        

                                        $addAttImgArray['id'] = !empty($atImage['id'])?$atImage['id']:'';
                                        $addAttImgArray['attractions_id'] = !empty($atImage['attractions_id'])?$atImage['attractions_id']:'';
                                        $addAttImgArray['file'] = !empty($atImage['file'])?$atImage['file']:'';
                                        $addAttImgArray['name'] = !empty($atImage['name'])?$atImage['name']:'';
                                        $addAttImgArray['description'] = !empty($atImage['description'])?$atImage['description']:'';
                                        $addAttImgArray['pos'] = !empty($atImage['pos'])?$atImage['pos']:'';
                                        $addAttImgArray['created_at'] = !empty($atImage['created_at'])?$atImage['created_at']:'';
                                        $addAttImgArray['updated_at'] = !empty($atImage['updated_at'])?$atImage['updated_at']:'';
                                        $addAttImgArray['deleted_at'] = (!empty($atImage['deleted_at']) && $atImage['deleted_at'] !='0000-00-00 00:00:00')?$atImage['deleted_at']:NULL;   
                                        $attractionImg = DB::table('attraction_images')->where('id',$atImage['id'])->first();

                                        if(!empty($attractionImg))
                                        {
                                            DB::table('attraction_images')->where('id',$atImage['id'])->update($addAttImgArray);
                                            $att_img_id[] = $atImage['id'];
                                        }
                                        else
                                        {
                                            $attractionImg = AttractionImage::create($addAttImgArray);
                                            $att_img_id[] = $attractionImg->id;
                                        }
                                    }
                                    //delete extra pivot

                                    
                                }
                            
                        }
                        if(!empty($attraction_id))
                        {
                           
                             //delete extra pivot
                             ExperiencesToAttraction::where('experiences_id',$attraction["pivot"]['experiences_id'])->whereNotIn('attractions_id', $attraction_id)->delete();
                        }
                        else
                        {
                            if(empty($row["experience_attractions"]))
                            {
                                 ExperiencesToAttraction::where('experiences_id',$row['id'])->delete();
                            }
                        }
                        if(!empty($att_img_id))
                        {
                             //delete extra pivot
                             AttractionImage::where('attractions_id',$atImage['attractions_id'])->whereNotIn('id', $att_img_id)->delete();
                        }

                        
                    }//end attraction
                    else
                    {

                    }
                    //start gallery

                    if(isset($row["experiences_to_gallerys_image"])){
                        $gallery_id=array();
                        foreach ($row["experiences_to_gallerys_image"] as $expGallery) {
                            
                            $gallery = DB::table('experiences_to_gallery')->where('id',$expGallery['id'])->first();

                            $addGalleryArray['id'] = !empty($expGallery['id'])?$expGallery['id']:'';
                            $addGalleryArray['experiences_id'] = !empty($expGallery['experiences_id'])?$expGallery['experiences_id']:'';
                            $addGalleryArray['name'] = !empty($expGallery['name'])?$expGallery['name']:'';
                            $addGalleryArray['is_new'] = !empty($expGallery['is_new'])?$expGallery['is_new']:'';
                            $addGalleryArray['created_at'] = !empty($expGallery['created_at'])?$expGallery['created_at']:'';
                            $addGalleryArray['updated_at'] = !empty($expGallery['updated_at'])?$expGallery['updated_at']:'';
                            $addGalleryArray['deleted_at'] = (!empty($expGallery['deleted_at']) && $expGallery['deleted_at'] !='0000-00-00 00:00:00')?$atImage['deleted_at']:NULL;   
                            
                            if(!empty($gallery))
                            {
                                DB::table('experiences_to_gallery')->where('id',$expGallery['id'])->update($addGalleryArray);
                                $gallery_id[] = $expGallery['id'];
                            }
                            else
                            {
                                $gallery = ExperiencesToGallery::create($addGalleryArray);
                                $gallery_id[] = $gallery->id;
                            }

                             //update gallery image
                            if(isset($expGallery["experiences_to_gallery_imagesh"])){
                                    $gallery_img_id=array();
                                    foreach ($expGallery["experiences_to_gallery_imagesh"] as $gaImage) {
                                        
                                        $galleryImg = ExperiencesToGalleryImages::where('id',$gaImage['id'])->first();
                                        $addGalImgArray['id'] = !empty($gaImage['id'])?$gaImage['id']:'';
                                        $addGalImgArray['experiences_to_gallery_id'] = !empty($gaImage['experiences_to_gallery_id'])?$gaImage['experiences_to_gallery_id']:'';
                                        $addGalImgArray['image_name'] = !empty($gaImage['image_name'])?$gaImage['image_name']:'';
                                        $addGalImgArray['image_order'] = !empty($gaImage['image_order'])?$gaImage['image_order']:'';
                                        $addGalImgArray['images'] = !empty($gaImage['images'])?$gaImage['images']:'';
                                        

                                        if(!empty($galleryImg))
                                        {
                                            $galleryImg->update($addGalImgArray);
                                            $gallery_img_id[] = $gaImage['id'];
                                        }
                                        else
                                        {
                                            $galleryImg = ExperiencesToGalleryImages::create($addGalImgArray);
                                            $gallery_img_id[] = $galleryImg->id;
                                        }
                                    }
                                    if(!empty($gallery_img_id))
                                    {
                                        //delete extra pivot
                                        ExperiencesToGalleryImages::where('experiences_to_gallery_id',$gaImage['experiences_to_gallery_id'])->whereNotIn('id', $gallery_img_id)->delete();
                                    }
                                    
                            }
                        }
                        //delete extra pivot
                        if(!empty($gallery_id))
                        {
                            ExperiencesToGallery::where('experiences_id',$expGallery['experiences_id'])->whereNotIn('id', $gallery_id)->delete();
                        }
                        
                    } //end gallery
                    
                    //country area
                    if(isset($row["country_areas"])){
                        $country_area_id=array();
                        foreach ($row["country_areas"] as $carea) {
                            //check attaction
                            
                            $addCountryAreaArray['id'] = !empty($carea['id'])?$carea['id']:'';
                            $addCountryAreaArray['countries_id'] = !empty($carea['countries_id'])?$carea['countries_id']:'';
                            $addCountryAreaArray['name'] = !empty($carea['name'])?$carea['name']:'';
                            $addCountryAreaArray['excerpt'] = !empty($carea['excerpt'])?$carea['excerpt']:'';
                            $addCountryAreaArray['description'] = !empty($carea['description'])?$carea['description']:'';
                            $addCountryAreaArray['active'] = !empty($carea['active'])?$carea['active']:'';
                            $addCountryAreaArray['pos'] = !empty($carea['pos'])?$carea['pos']:'';
                            $addCountryAreaArray['created_at'] = !empty($carea['created_at'])?$carea['created_at']:'';
                            $addCountryAreaArray['updated_at'] = !empty($carea['updated_at'])?$carea['updated_at']:'';
                            $addCountryAreaArray['deleted_at'] = (!empty($carea['deleted_at']) && $carea['deleted_at'] !='0000-00-00 00:00:00')?$carea['deleted_at']:NULL;
                            $country_area = CountryArea::where('id',$carea['id'])->first();
                            if(!empty($country_area))
                            {
                                $country_area->update($addCountryAreaArray);
                                $country_area_id[] = $country_area['id'];
                            }
                            else
                            {
                                $country_area = CountryArea::create($addCountryAreaArray);
                                $country_area_id[] = $country_area->id;
                            }
                            //update experience to attraction
                            if(isset($carea["pivot"])){
                                $country_pivot_id=array();
                               
                                    $countryAreaPivot = ExperiencesToCountryAreas::where('experiences_id',$carea["pivot"]['experiences_id'])->where('country_areas_id',$carea["pivot"]['country_areas_id'])->first();
                                    $addCounPivotArray['experiences_id'] = !empty($carea["pivot"]['experiences_id'])?$carea["pivot"]['experiences_id']:'';
                                    $addCounPivotArray['country_areas_id'] = !empty($carea["pivot"]['country_areas_id'])?$carea["pivot"]['country_areas_id']:'';

                                    if(!empty($countryAreaPivot))
                                    {
                                        $countryAreaPivot->update($addCounPivotArray);
                                        $country_pivot_id[]=$countryAreaPivot->id;
                                    }
                                    else
                                    { 
                                        $countryAreaPivot = ExperiencesToCountryAreas::create($addCounPivotArray);
                                        $country_pivot_id[]=$countryAreaPivot->id;
                                    }
                               
                                //delete extra pivot
                                    if(!empty($country_pivot_id))
                                    {
                                        ExperiencesToCountryAreas::where('experiences_id',$carea["pivot"]['experiences_id'])->whereNotIn('id', $country_pivot_id)->delete(); 
                                    }
                                
                           }
                        } //end foreach country area
                    }//end country area
                    
                    //category

                    if(isset($row["experience_categories"])){
                        $category_id=array();
                        $cat_pivot_id=array();
                        foreach ($row["experience_categories"] as $exp_cat) {
                            //check attaction
                            
                            $addExperienceCategoryArray['id'] = !empty($exp_cat['id'])?$exp_cat['id']:'';
                            $addExperienceCategoryArray['name'] = !empty($exp_cat['name'])?$exp_cat['name']:'';
                            $addExperienceCategoryArray['description'] = !empty($exp_cat['description'])?$exp_cat['description']:'';
                            $addExperienceCategoryArray['photos'] = !empty($exp_cat['photos'])?$exp_cat['photos']:'';
                            $addExperienceCategoryArray['htaccess_url'] = !empty($exp_cat['htaccess_url'])?$exp_cat['htaccess_url']:'';
                            $addExperienceCategoryArray['meta_title'] = !empty($exp_cat['meta_title'])?$exp_cat['meta_title']:'';
                            $addExperienceCategoryArray['meta_description'] = !empty($exp_cat['meta_description'])?$exp_cat['meta_description']:'';
                            $addExperienceCategoryArray['meta_keywords'] = !empty($exp_cat['meta_keywords'])?$exp_cat['meta_keywords']:'';
                            $addExperienceCategoryArray['meta_metatags'] = !empty($exp_cat['meta_metatags'])?$exp_cat['meta_metatags']:'';
                            $addExperienceCategoryArray['pos'] = !empty($exp_cat['pos'])?$exp_cat['pos']:'';
                            $addExperienceCategoryArray['active'] = !empty($exp_cat['active'])?$exp_cat['active']:'';
                            $addExperienceCategoryArray['created_at'] = !empty($exp_cat['created_at'])?$exp_cat['created_at']:'';
                            $addExperienceCategoryArray['updated_at'] = !empty($exp_cat['updated_at'])?$exp_cat['updated_at']:'';
                            $addExperienceCategoryArray['deleted_at'] = (!empty($exp_cat['deleted_at']) && $exp_cat['deleted_at'] !='0000-00-00 00:00:00')?$exp_cat['deleted_at']:NULL;
                            $categoryData = ExperienceCategory::where('id',$exp_cat['id'])->first();
                            if(!empty($categoryData))
                            {
                                $categoryData->update($addExperienceCategoryArray);
                                $category_id[] = $categoryData['id'];
                            }
                            else
                            {
                                $categoryData = ExperienceCategory::create($addExperienceCategoryArray);
                                $category_id[] = $categoryData->id;
                            }
                             //update experience to attraction
                            if(isset($exp_cat["pivot"])){
                                
                                
                                    $countryAreaPivot = DB::table('experiences_to_experience_categories')->where('experiences_id',$exp_cat["pivot"]['experiences_id'])->where('experience_categories_id',$exp_cat["pivot"]['experience_categories_id'])->first();

                                    $addCatPivotArray['experiences_id'] = !empty($exp_cat["pivot"]['experiences_id'])?$exp_cat["pivot"]['experiences_id']:'';
                                    $addCatPivotArray['experience_categories_id'] = !empty($exp_cat["pivot"]['experience_categories_id'])?$exp_cat["pivot"]['experience_categories_id']:'';

                                    if(!empty($countryAreaPivot))
                                    {
                                        DB::table('experiences_to_experience_categories')->where('experiences_id',$exp_cat["pivot"]['experiences_id'])->where('experience_categories_id',$exp_cat["pivot"]['experience_categories_id'])->update($addCatPivotArray);
                                        $cat_pivot_id[]=$countryAreaPivot->id;
                                    }
                                    else
                                    {
                                         
                                        $countryAreaPivot = DB::table('experiences_to_experience_categories')->insertGetId($addCatPivotArray);
                                        $cat_pivot_id[]=$countryAreaPivot;
                                    }
                               
                                
                               
                            }
                        } //end foreach category
                        //delete extra pivot
                         DB::table('experiences_to_experience_categories')->where('experiences_id',$exp_cat["pivot"]['experiences_id'])->whereNotIn('id', $cat_pivot_id)->delete(); 
                    }//end category

                    //fixture

                    if(isset($row["experiences_to_fixtures"])){
                        $fixture_id=array();
                        foreach ($row["experiences_to_fixtures"] as $exp_fixture) {
                            //check attaction
                           
                            $addExperienceFixtureArray['id'] = !empty($exp_fixture['id'])?$exp_fixture['id']:'';
                            $addExperienceFixtureArray['experiences_id'] = !empty($exp_fixture['experiences_id'])?$exp_fixture['experiences_id']:'';
                            $addExperienceFixtureArray['title'] = !empty($exp_fixture['title'])?$exp_fixture['title']:'';
                            $addExperienceFixtureArray['fixture_text'] = !empty($exp_fixture['fixture_text'])?$exp_fixture['fixture_text']:'';
                            $addExperienceFixtureArray['created_at'] = !empty($exp_fixture['created_at'])?$exp_fixture['created_at']:'';
                            $addExperienceFixtureArray['updated_at'] = !empty($exp_fixture['updated_at'])?$exp_fixture['updated_at']:'';
                            $addExperienceFixtureArray['deleted_at'] = (!empty($exp_fixture['deleted_at']) && $exp_fixture['deleted_at'] !='0000-00-00 00:00:00')?$exp_fixture['deleted_at']:NULL;

                            $fixtureData = DB::table('experiences_to_fixture')->where('id',$exp_fixture['id'])->first();
                             //pr($addExperienceFixtureArray);
                            if(!empty($fixtureData))
                            {
                                DB::table('experiences_to_fixture')->where('id',$exp_fixture['id'])->update($addExperienceFixtureArray);
                                $fixture_id[] = $fixtureData->id;
                            }
                            else
                            {
                                 $categoryData_id = ExperiencesToFixtures::create($addExperienceFixtureArray);
                                $fixture_id[] = $categoryData_id->id;
                            }
                             //update experience to attraction
                            
                        } //end foreach category
                        
                        //delete extra pivot
                        if(!empty($fixture_id))
                        {
                             $dd =DB::table('experiences_to_fixture')->where('experiences_id',$exp_fixture['experiences_id'])->whereNotIn('id', $fixture_id)->delete(); 
                        }
                      
                     
                    }//end fixture
                    //fixture
                    //fixture

                    if(isset($row["experience_date_additional_texts"])){
                        $additional_id=array();
                        foreach ($row["experience_date_additional_texts"] as $exp_additional) {
                            //check attaction
                           
                            $addExperienceAdditionalArray['id'] = !empty($exp_additional['id'])?$exp_additional['id']:'';
                            $addExperienceAdditionalArray['experiences_id'] = !empty($exp_additional['experiences_id'])?$exp_additional['experiences_id']:'';
                            $addExperienceAdditionalArray['name'] = !empty($exp_additional['name'])?$exp_additional['name']:'';
                            $addExperienceAdditionalArray['text'] = !empty($exp_additional['text'])?$exp_additional['text']:'';
                            $addExperienceAdditionalArray['created_at'] = !empty($exp_additional['created_at'])?$exp_additional['created_at']:'';
                            $addExperienceAdditionalArray['updated_at'] = !empty($exp_additional['updated_at'])?$exp_additional['updated_at']:'';
                           

                            $additonalData = DB::table('experiences_to_dates_additional_text')->where('id',$exp_additional['id'])->first();
                             //pr($addExperienceAdditionalArray);
                            if(!empty($additonalData))
                            {
                                DB::table('experiences_to_dates_additional_text')->where('id',$exp_additional['id'])->update($addExperienceAdditionalArray);
                                $additional_id[] = $additonalData->id;
                            }
                            else
                            {
                                
                                 $categoryData_id = ExperienceDateAdditionalText::create($addExperienceAdditionalArray);
                                $additional_id[] = $categoryData_id->id;
                            }
                             //update experience to attraction
                            
                        } //end foreach category
                        
                        //delete extra pivot
                        if(!empty($additional_id))
                        {
                             $dd =DB::table('experiences_to_dates_additional_text')->where('experiences_id',$exp_fixture['experiences_id'])->whereNotIn('id', $additional_id)->delete(); 
                        }
                      
                     
                    }//end fixture
                    //fixture
                    
                    if(isset($row["experiences_to_reviews"])){
                        $review_id=array();
                        foreach ($row["experiences_to_reviews"] as $exp_review) {
                            //check attaction
                           
                            $addExperienceReviewArray['id'] = !empty($exp_review['id'])?$exp_review['id']:'';
                            $addExperienceReviewArray['experiences_id'] = !empty($exp_review['experiences_id'])?$exp_review['experiences_id']:'';
                            //$addExperienceReviewArray['title'] = !empty($exp_review['title'])?$exp_review['title']:'';
                            $addExperienceReviewArray['review_text'] = !empty($exp_review['review_text'])?$exp_review['review_text']:'';
                            $addExperienceReviewArray['created_at'] = !empty($exp_review['created_at'])?$exp_review['created_at']:'';
                            $addExperienceReviewArray['updated_at'] = !empty($exp_review['updated_at'])?$exp_review['updated_at']:'';
                            $addExperienceReviewArray['deleted_at'] = (!empty($exp_review['deleted_at']) && $exp_review['deleted_at'] !='0000-00-00 00:00:00')?$exp_review['deleted_at']:NULL;
                            //pr($addExperienceReviewArray);
                            $reviewData = DB::table('experiences_to_review')->where('id',$exp_review['id'])->first();
                             //pr($addExperienceFixtureArray);
                            if(!empty($reviewData))
                            {
                                DB::table('experiences_to_review')->where('id',$exp_review['id'])->update($addExperienceReviewArray);
                                $review_id[] = $reviewData->id;
                            }
                            else
                            {
                                 $categoryData_id = ExperiencesToReviews::create($addExperienceReviewArray);
                                $review_id[] = $categoryData_id->id;
                            }
                             //update experience to attraction
                            
                        } //end foreach category
                        
                        //delete extra pivot
                        if(!empty($review_id))
                        {
                             $dd =DB::table('experiences_to_review')->where('experiences_id',$exp_review['experiences_id'])->whereNotIn('id', $review_id)->delete(); 
                        }
                      
                     
                    }//end review
                    
                     if(isset($row["get_experiences_to_inclusions_blue_bar"])){
                        $inc_id=array();
                        foreach ($row["get_experiences_to_inclusions_blue_bar"] as $exp_inc) {
                            //check attaction
                           
                            $addExperienceIncArray['id'] = !empty($exp_inc['id'])?$exp_inc['id']:'';
                            $addExperienceIncArray['experiences_id'] = !empty($exp_inc['experiences_id'])?$exp_inc['experiences_id']:'';
                            $addExperienceIncArray['inclusions_id'] = !empty($exp_inc['inclusions_id'])?$exp_inc['inclusions_id']:'';
                            $addExperienceIncArray['inclusions_text'] = !empty($exp_inc['inclusions_text'])?$exp_inc['inclusions_text']:'';
                            $addExperienceIncArray['icon_list_id'] = !empty($exp_inc['icon_list_id'])?$exp_inc['icon_list_id']:'';
                            $addExperienceIncArray['type_id'] = !empty($exp_inc['type_id'])?$exp_inc['type_id']:'';
                            $addExperienceIncArray['created_at'] = !empty($exp_inc['created_at'])?$exp_inc['created_at']:'';
                            $addExperienceIncArray['updated_at'] = !empty($exp_inc['updated_at'])?$exp_inc['updated_at']:'';
                           
                            $incData = DB::table('experiences_to_inclusions')->where('id',$exp_inc['id'])->first();
                             //pr($addExperienceIncArray);
                            if(!empty($incData))
                            {
                                DB::table('experiences_to_inclusions')->where('id',$exp_inc['id'])->update($addExperienceIncArray);
                                $inc_id[] = $incData->id;
                            }
                            else
                            {
                                 $categoryData_id = ExperiencesToInclusions::create($addExperienceIncArray);
                                $inc_id[] = $categoryData_id->id;
                            }
                             //update experience to attraction
                            
                        } //end foreach inclusions
                        
                        //delete 
                        if(!empty($inc_id))
                        {
                             $dd =DB::table('experiences_to_inclusions')->where('experiences_id',$exp_inc['experiences_id'])->whereNotIn('id', $inc_id)->delete(); 
                        }
                      
                     
                    }//end inclusions
                    if(isset($row["experience_brochures"])){
                        $bro_id=array();
                        
                            $exp_bro = $row["experience_brochures"];
                            //check attaction
                          
                            $addExperienceBroArray['id'] = !empty($exp_bro['id'])?$exp_bro['id']:'';
                            $addExperienceBroArray['experience_id'] = !empty($exp_bro['experience_id'])?$exp_bro['experience_id']:'';
                            $addExperienceBroArray['hotel_id'] = !empty($exp_bro['hotel_id'])?$exp_bro['hotel_id']:'';
                            $addExperienceBroArray['rate_pp'] = !empty($exp_bro['rate_pp'])?$exp_bro['rate_pp']:'';
                            $addExperienceBroArray['srs_pp'] = !empty($exp_bro['srs_pp'])?$exp_bro['srs_pp']:'';
                            $addExperienceBroArray['image_1'] = !empty($exp_bro['image_1'])?$exp_bro['image_1']:'';
                            $addExperienceBroArray['image_2'] = !empty($exp_bro['image_2'])?$exp_bro['image_2']:'';
                            $addExperienceBroArray['image_3'] = !empty($exp_bro['image_3'])?$exp_bro['image_3']:'';
                            $addExperienceBroArray['textarea_1'] = !empty($exp_bro['textarea_1'])?$exp_bro['textarea_1']:'';
                            $addExperienceBroArray['textarea_2'] = !empty($exp_bro['textarea_2'])?$exp_bro['textarea_2']:'';
                            $addExperienceBroArray['textarea_3'] = !empty($exp_bro['textarea_3'])?$exp_bro['textarea_3']:'';
                            $addExperienceBroArray['textarea_4'] = !empty($exp_bro['textarea_4'])?$exp_bro['textarea_4']:'';
                            $addExperienceBroArray['textarea_5'] = !empty($exp_bro['textarea_5'])?$exp_bro['textarea_5']:'';
                            $addExperienceBroArray['textarea_6'] = !empty($exp_bro['textarea_6'])?$exp_bro['textarea_6']:'';
                            $addExperienceBroArray['inclusions'] = !empty($exp_bro['inclusions'])?$exp_bro['inclusions']:'';
                            $addExperienceBroArray['dates'] = !empty($exp_bro['dates'])?$exp_bro['dates']:'';
                            $addExperienceBroArray['breakfast'] = !empty($exp_bro['breakfast'])?$exp_bro['breakfast']:'';
                            $addExperienceBroArray['created_at'] = !empty($exp_bro['created_at'])?$exp_bro['created_at']:'';
                            $addExperienceBroArray['updated_at'] = !empty($exp_bro['updated_at'])?$exp_bro['updated_at']:'';
                            $addExperienceBroArray['deleted_at'] = (!empty($exp_bro['deleted_at']) && $exp_bro['deleted_at'] !='0000-00-00 00:00:00')?$exp_bro['deleted_at']:NULL;
                            $incData = DB::table('brochures')->where('id',$exp_bro['id'])->first();
                             
                            if(!empty($incData))
                            {
                                DB::table('brochures')->where('id',$exp_bro['id'])->update($addExperienceBroArray);
                                $bro_id[] = $incData->id;
                            }
                            else
                            {
                                 $categoryData_id = Brochures::create($addExperienceBroArray);
                                $bro_id[] = $categoryData_id->id;
                            }
                             //update experience to attraction
                            
                       
                        
                        //delete 
                        /*if(!empty($bro_id))
                        {
                             $dd =DB::table('brochures')->where('experience_id',$exp_bro['experience_id'])->whereNotIn('id', $bro_id)->delete(); 
                        }*/
                      
                     
                    }//end inclusions
                    //experience hotel
                    if(isset($row["experience_hotels"])){
                        $hotel_id=array();
                        $hotel_img_id=array();
                        $hotel_pivot_id=array();
                        $hot_amt_id=array();
                        foreach ($row["experience_hotels"] as $hotel) {
                            //check attaction
                            
                            $addHotelArray['id'] = $hotel['id'];
                            $addHotelArray['country_areas_id'] = $hotel['country_areas_id'];
                            $addHotelArray['name'] = $hotel['name'];
                            $addHotelArray['excerpt'] = $hotel['excerpt'];
                            $addHotelArray['description'] = $hotel['description'];
                            $addHotelArray['stars'] = $hotel['stars'];
                            $addHotelArray['phone'] = $hotel['phone'];
                            $addHotelArray['address'] = $hotel['address'];
                            $addHotelArray['rating'] = $hotel['rating'];
                            $addHotelArray['email'] = $hotel['email'];
                            $addHotelArray['contact_name'] = $hotel['contact_name'];
                            $addHotelArray['contact_position'] = $hotel['contact_position'];
                            $addHotelArray['contact_number'] = $hotel['contact_number'];
                            $addHotelArray['menu_url'] = $hotel['menu_url'];
                            $addHotelArray['location_link'] = $hotel['location_link'];
                            $addHotelArray['booking_url'] = $hotel['booking_url'];
                            $addHotelArray['triadvisor_url'] = $hotel['triadvisor_url'];
                            $addHotelArray['website'] = $hotel['website'];
                            $addHotelArray['street'] = $hotel['street'];
                            $addHotelArray['city'] = $hotel['city'];
                            $addHotelArray['postcode'] = $hotel['postcode'];
                            $addHotelArray['latitude'] = $hotel['latitude'];
                            $addHotelArray['longitude'] = $hotel['longitude'];
                            $addHotelArray['parking_amenity'] = $hotel['parking_amenity'];
                            $addHotelArray['porterage_amenity'] = $hotel['porterage_amenity'];
                            $addHotelArray['lift_access_amenity'] = $hotel['lift_access_amenity'];
                            $addHotelArray['leisure_amenity'] = $hotel['leisure_amenity'];
                            $addHotelArray['brand'] = $hotel['brand'];
                            $addHotelArray['disabled_bedrooms'] = $hotel['disabled_bedrooms'];
                            $addHotelArray['bedrooms_with_walk'] = $hotel['bedrooms_with_walk'];
                            $addHotelArray['ground_floor_rooms'] = $hotel['ground_floor_rooms'];
                            $addHotelArray['hotel_city'] = $hotel['hotel_city'];
                            $addHotelArray['estimated_cost'] = $hotel['estimated_cost'];
                            $addHotelArray['distance_from_vip_miles'] = $hotel['distance_from_vip_miles'];
                            $addHotelArray['owner'] = $hotel['owner'];
                            $addHotelArray['main_contact_number'] = $hotel['main_contact_number'];
                            $addHotelArray['pos'] = $hotel['pos'];
                            $addHotelArray['country'] = $hotel['country'];
                            $addHotelArray['ratesallocation'] = $hotel['ratesallocation'];
                            $addHotelArray['mean_arrangements'] = $hotel['mean_arrangements'];
                            $addHotelArray['inclusions'] = $hotel['inclusions'];
                            $addHotelArray['services_facilities'] = $hotel['services_facilities'];
                            $addHotelArray['terms_conditions'] = $hotel['terms_conditions'];
                            $addHotelArray['virtual_tour'] = $hotel['virtual_tour'];
                            $addHotelArray['house_keeping'] = $hotel['house_keeping'];
                            $addHotelArray['contacts'] = $hotel['contacts'];
                            $addHotelArray['preferred_currency'] = $hotel['preferred_currency'];
                            $addHotelArray['main_menu'] = $hotel['main_menu'];
                            $addHotelArray['festive_menu'] = $hotel['festive_menu'];
                            $addHotelArray['active'] = $hotel['active'];
                            $addHotelArray['created_at'] = $hotel['created_at'];
                            $addHotelArray['updated_at'] = $hotel['updated_at'];
                            $addHotelArray['deleted_at'] = (!empty($hotel['deleted_at']) && $hotel['deleted_at'] !='0000-00-00 00:00:00')?$hotel['deleted_at']:NULL;
                            $hotelData = Hotel::where('id',$hotel['id'])->first();

                            if(!empty($hotelData))
                            {
                                $hotelData->update($addHotelArray);
                                $hotel_id[] = $hotel['id'];
                                $hotelId= $hotel['id'];
                            }
                            else
                            {
                                $hotelData = Hotel::create($addHotelArray);
                                $hotel_id[] = $hotelData->id;
                                $hotelId= $hotelData->id;
                            }

                            //update experience to hotel
                            if(isset($hotel["pivot"])){
                                
                               
                                    $hotelPivot = ExperiencesToHotel::where('experiences_id',$hotel["pivot"]['experiences_id'])->where('hotels_id',$hotel["pivot"]['hotels_id'])->first();
                                    $addHotPivotArray['experiences_id'] = !empty($hotel["pivot"]['experiences_id'])?$hotel["pivot"]['experiences_id']:'';
                                    $addHotPivotArray['hotels_id'] = !empty($hotel["pivot"]['hotels_id'])?$hotel["pivot"]['hotels_id']:'';
                                    $addHotPivotArray['standard_hotel'] = !empty($hotel["pivot"]['standard_hotel'])?$hotel["pivot"]['standard_hotel']:'';
                                    $addHotPivotArray['selected_menu'] = !empty($hotel["pivot"]['selected_menu'])?$hotel["pivot"]['selected_menu']:'';
                                    $addHotPivotArray['other_menu'] = !empty($hotel["pivot"]['other_menu'])?$hotel["pivot"]['other_menu']:'';
                                    $addHotPivotArray['tour_amenities'] = !empty($hotel["pivot"]['tour_amenities'])?$hotel["pivot"]['tour_amenities']:'';
                                    $addHotPivotArray['tour_amenities_url'] = !empty($hotel["pivot"]['tour_amenities_url'])?$hotel["pivot"]['tour_amenities_url']:'';
                                    $addHotPivotArray['about_hotel'] = !empty($hotel["pivot"]['about_hotel'])?$hotel["pivot"]['about_hotel']:'';
                                    $addHotPivotArray['parking_amenity'] = !empty($hotel["pivot"]['parking_amenity'])?$hotel["pivot"]['parking_amenity']:'';
                                    $addHotPivotArray['porterage_amenity'] = !empty($hotel["pivot"]['porterage_amenity'])?$hotel["pivot"]['porterage_amenity']:'';
                                    $addHotPivotArray['lift_access_amenity'] = !empty($hotel["pivot"]['lift_access_amenity'])?$hotel["pivot"]['lift_access_amenity']:'';
                                    $addHotPivotArray['leisure_amenity'] = !empty($hotel["pivot"]['leisure_amenity'])?$hotel["pivot"]['leisure_amenity']:'';
                                    $addHotPivotArray['parking_amenity_url'] = !empty($hotel["pivot"]['parking_amenity_url'])?$hotel["pivot"]['parking_amenity_url']:'';
                                    $addHotPivotArray['porterage_amenity_url'] = !empty($hotel["pivot"]['porterage_amenity_url'])?$hotel["pivot"]['porterage_amenity_url']:'';
                                    $addHotPivotArray['lift_access_amenity_url'] = !empty($hotel["pivot"]['lift_access_amenity_url'])?$hotel["pivot"]['lift_access_amenity_url']:'';
                                    $addHotPivotArray['leisure_amenity_url'] = !empty($hotel["pivot"]['leisure_amenity_url'])?$hotel["pivot"]['leisure_amenity_url']:'';


                                    if(!empty($hotelPivot))
                                    {
                                        $hotelPivot->update($addHotPivotArray);
                                        $hotel_pivot_id[]=$hotelPivot->id;
                                    }
                                    else
                                    {
                                        $hotelPivot = ExperiencesToHotel::create($addHotPivotArray);
                                        $hotel_pivot_id[]=$hotelPivot->id;
                                    }
                                
                                //delete extra pivot
                               
                            }
                            //update hotel image
                            if(isset($hotel["hotel_images"])){
                                
                                foreach ($hotel["hotel_images"] as $hotImage) {
                                    $hotelImg = DB::table('hotel_images')->where('id',$hotImage['id'])->first();
                                    $addHotImgArray['id'] = !empty($hotImage['id'])?$hotImage['id']:'';
                                    $addHotImgArray['hotels_id'] = !empty($hotImage['hotels_id'])?$hotImage['hotels_id']:'';
                                    $addHotImgArray['file'] = !empty($hotImage['file'])?$hotImage['file']:'';
                                    $addHotImgArray['name'] = !empty($hotImage['name'])?$hotImage['name']:'';
                                    $addHotImgArray['description'] = !empty($hotImage['description'])?$hotImage['description']:'';
                                    $addHotImgArray['pos'] = !empty($hotImage['pos'])?$hotImage['pos']:'';
                                    

                                    if(!empty($hotelImg))
                                    {
                                        DB::table('hotel_images')->where('id',$hotImage['id'])->update($addHotImgArray);
                                        $hotel_img_id[] = $hotImage['id'];
                                    }
                                    else
                                    {
                                        $hotelImg = HotelImage::create($addHotImgArray);
                                        $hotel_img_id[] = $hotelImg->id;
                                    }
                                }
                                
                            }
                            //update hotel amenity
                            if(isset($hotel["hotel_amenities"])){
                                
                                foreach ($hotel["hotel_amenities"] as $hotAmenity) {
                                    $hotelAmenity = HotelAmenity::where('id',$hotAmenity['id'])->first();
                                    $addAmenityImgArray['id'] = !empty($hotAmenity['id'])?$hotAmenity['id']:'';
                                    $addAmenityImgArray['name'] = !empty($hotAmenity['name'])?$hotAmenity['name']:'';
                                    $addAmenityImgArray['icon'] = !empty($hotAmenity['icon'])?$hotAmenity['icon']:'';
                                    $addAmenityImgArray['pos'] = !empty($hotAmenity['pos'])?$hotAmenity['pos']:'';
                                    $addAmenityImgArray['active'] = !empty($hotAmenity['active'])?$hotAmenity['active']:'';
                                    

                                    if(!empty($hotelAmenity))
                                    {
                                        $hotelAmenity->update($addAmenityImgArray);
                                        $hot_amt_id[] = $hotAmenity['id'];
                                    }
                                    else
                                    {
                                        $hotelAmenity = HotelAmenity::create($addAmenityImgArray);
                                        $hot_amt_id[] = $hotelAmenity->id;
                                    }
                                    //update experience to attraction
                                    if(isset($hotAmenity["pivot"])){
                                        $hotel_am_pivot_id=array();
                                       
                                            $hotelPivot = DB::table('hotels_to_hotel_amenities')->where('hotel_amenities_id',$hotAmenity["pivot"]['hotel_amenities_id'])->where('hotels_id',$hotAmenity["pivot"]['hotels_id'])->first();

                                            $addHotPivotAmeArray['hotels_id'] = !empty($hotAmenity["pivot"]['hotels_id'])?$hotAmenity["pivot"]['hotels_id']:'';
                                            $addHotPivotAmeArray['hotel_amenities_id'] = !empty($hotAmenity["pivot"]['hotel_amenities_id'])?$hotAmenity["pivot"]['hotel_amenities_id']:'';
                                            if(!empty($hotelPivot))
                                            {
                                                DB::table('hotels_to_hotel_amenities')->where('hotel_amenities_id',$hotAmenity["pivot"]['hotel_amenities_id'])->where('hotels_id',$hotAmenity["pivot"]['hotels_id'])->update($addHotPivotAmeArray);
                                                $hotel_am_pivot_id[]=$hotelPivot->id;
                                            }
                                            else
                                            {
                                                $hotelPivot = DB::table('hotels_to_hotel_amenities')->insertGetId($addHotPivotAmeArray);
                                                $hotel_am_pivot_id[]=$hotelPivot;
                                            }
                                      
                                        
                                    }
                                }
                                //delete extra pivot
                                //HotelAmenity::where('hotels_id',$hotAmenity['hotels_id'])->whereNotIn('id', $hot_amt_id)->delete();
                            }

                            
                        }

                        if(!empty($hotel_id))
                        {
                         DB::table('experiences_to_hotels')->where('experiences_id',$row['id'])->whereNotIn('hotels_id', $hotel_id)->delete();
                        
                        }
                        else
                        {
                            if(empty($row["experience_attractions"]))
                            {
                                 DB::table('experiences_to_hotels')->where('experiences_id',$row['id'])->delete();
                            }
                        }
                        if(!empty($hotel_img_id)){
                            //delete extra pivot
                        DB::table('hotel_images')->where('hotels_id',$hotelId)->whereNotIn('id', $hotel_img_id)->delete();
                        }
                        if(!empty($hotel_am_pivot_id))
                        {
                            //delete extra pivot
                            DB::table('hotels_to_hotel_amenities')->where('hotels_id',$hotelId)->whereNotIn('id', $hotel_am_pivot_id)->delete();
                        }
                    }//end hotel
                   
                $updateurl = getenv('IMAGE_URL').'api/update_experience_flag'; 
                  $response = $client->request('post', $updateurl, [
                    'form_params' => [
                        'id' => $row['id'],
                    ],
                    'auth' => ['Tours-user', 'L3tM3L00kd']
                ]);
                $update_exp = json_decode($response->getBody()->getContents(), true);
                
                if(!empty($update_exp['message']))
                {
                    //echo $update_exp['message'];
                }   
                }//end main foreach
                
                 
            }
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
           // return response()->json(['error' => $e->getMessage()], 500);
            $items = array();
        }
        \Log::info("BT is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}