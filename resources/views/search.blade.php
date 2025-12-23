@extends('layouts.front')

@section('content')
<div class="notIndexContainer" style="margin-bottom: 200px;">
    <div class="propertiesListContainer">
        <div class="container">
            <div class="containerRow">
                 <form method="GET" action="{{ route('search.main.ajax') }}" class="filtersBox ajax" id="filterForm">
                    {{ csrf_field() }}
                    <div class="filterBox">
                        <div class="filterBtn open">
                            <span class="heading">Locations & Areas</span>
                            <span class="iconMore"><i class="fas fa-plus"></i></span>
                            <span class="iconLess"><i class="fas fa-minus"></i></span>
                        </div>
                        <div class="hiddenFilter">
                             <div class="parentBox">
                                <div class="checkAllBtn">
                                    <div class="left">
                                        <div class="round">
                                            <input type="checkbox" id="checkbox-select-all" checked/>
                                            <label for="checkbox-select-all">Select All</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($countries as $k => $country)
                            <?php $country = (object) $country; ?>
                            <div class="parentBox">
                                <div class="checkAllBtn">
                                    <div class="left">
                                        <div class="round">
                                            <?php //$countryar = array('1','2','3','4');?>
                                            <input type="checkbox" class="location_cls" name="countries_id[]"  value="{{$country->id}}" id="checkbox-c-{{$country->id}}"  @if ( isset($country->countryAreas[0]->selected) && $country->countryAreas[0]->selected) checked  @endif  />
                                            <label for="checkbox-c-{{$country->id}}">{{$country->name}}</label>
                                        </div>
                                        <span class="toogleIcon2 iconMore" style="margin-left: 10px;color: #fff;cursor: pointer;font-size: 16px;line-height: 14px;"><i class="fas fa-plus"></i></span>
                                        <span class="toogleIcon2 iconLess" style="display: none;margin-left: 10px;color: #fff;cursor: pointer;font-size: 16px;line-height: 14px;"><i class="fas fa-minus"></i></span>
                                        <!-- <div class="toogleIcon rotateIcon"><i class="fas fa-sort-down"></i></div> -->
                                    </div>
                                    <div class="right">
                                    </div>
                                </div>
                                @if (isset(optional($country)->countryAreas))
                                <div class="childrensBox countryAreasBoxCls" data-id="{{$country->id}}">
                                    @foreach ($country->countryAreas as $kk => $countryArea)
                                    <div class="item">
                                        <div class="left">
                                            <div class="round">
                                                 <input type="checkbox" class="country_areas_id checkboxCLs-{{$country->id}}" name="country_areas_id[]" value="{{ $countryArea->id }}" @if ( isset($countryArea->selected) && $countryArea->selected) checked @endif id="checkbox-ca-{{ $countryArea->id }}" />
                                                <label for="checkbox-ca-{{ $countryArea->id }}">{{ $countryArea->name }}</label>
                                            </div>
                                        </div>
                                        <div class="right">
                                            {{ $countryArea->experiences->count() }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="filterBox grayFilterBox">
                        <div class="filterBtn filterBtnCatCls">
                            <span class="heading">CATEGORIES</span>
                            <span class="iconMore"><i class="fas fa-plus"></i></span>
                            <span class="iconLess"><i class="fas fa-minus"></i></span>
                        </div>
                        <div class="hiddenFilter hiddenFilterCat">
                            <div class="parentBox">
                                <div class="childrensBox">
                                    <div class="item">
                                        <div class="left">
                                            <div class="round">
                                                <input type="checkbox" id="checkbox-select-all2" checked/>
                                                <label for="checkbox-select-all2">Select All</label>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($experienceCategories as $ec)
                                    <?php $ec = (object) $ec; ?>
                                    <div class="item">
                                        <div class="left">
                                            <div class="round">
                                                <input type="checkbox" name="experience_categories_id[]" class="ecatIdCls" value="{{$ec->id}}" id="checkbox-ec-{{$ec->id}}" @if ( isset($ec->selected) && $ec->selected) checked @endif>
                                                <label for="checkbox-ec-{{$ec->id}}">{{$ec->name}}</label>
                                            </div>
                                        </div>
                                        <div class="right">
{{--                                            13--}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php /* <div class="filterBox grayFilterBox filterBtnExtraCls">
                        <div class="filterBtn">
                            <span class="heading">EXTRAS</span>
                            <span class="iconMore"><i class="fas fa-plus"></i></span>
                            <span class="iconLess"><i class="fas fa-minus"></i></span>
                        </div>
                        <div class="hiddenFilter filterBtnExtraSubCls">
                            <div class="parentBox">
                                <div class="childrensBox">
                                   <!--  @foreach($experienceExtras as $ee)
                                    <div class="item">
                                        <div class="left">
                                            <div class="round">
                                                <input type="checkbox" class="eExtraIdCls" name="experience_extras_id[]" value="{{$ee->id}}" id="checkbox-ee-{{$ee->id}}" @if ( isset($ee->selected) && $ee->selected) checked @endif>
                                                <label for="checkbox-ee-{{$ee->id}}">{{$ee->name}}</label>
                                            </div>
                                        </div>
                                        <div class="right">
                                            {{--13--}}
                                        </div>
                                    </div>
                                    @endforeach -->
                                     <div class="item">
                                        <div class="left">
                                            <div class="round">
                                                <input type="checkbox" class="eExtraIdCls" name="experience_date" value="dates" id="checkbox-ee-dates" @if ( isset($ee->selected) && $ee->selected) checked @endif>
                                                <label for="checkbox-ee-dates">Available dates </label>
                                            </div>
                                        </div>
                                        <div class="right">
               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> */?>

                    <input id="inputSortBy" type="hidden" name="sortby" value="price-desc">
                    <input id="inputView" type="hidden" name="view" value="grid">
                    <input id="filter_serial" type="hidden" name="filter_serial">
                </form>

                <div class="pageContent" id="pageSearchContent">
                    @include ('search_part-page_content', [
                                            'items' => $items,
                                            //'country_areas_id' => $country_areas_id,
                                          ])
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBQKrJGchDZO3J-xnAlgrNezRe9SotfeTc" type="text/javascript"  async defer></script>  
<script type="text/javascript">
    <?php if(isset($_GET['category']) && $_GET['category'] == 'indoor'){ ?> 
        $('.indoor ').trigger('click');
        $('#filterForm').submit();
    <?php } else if(isset($_GET['category']) && $_GET['category'] == 'outdoor'){ ?> 
        $('.outdoor ').trigger('click');
        $('#filterForm').submit();
    <?php } else if(isset($_GET['category']) && $_GET['category'] == 'premium'){ ?> 
        $('.premium ').trigger('click');
        $('#filterForm').submit();
     <?php } ?>

</script>

@endsection
