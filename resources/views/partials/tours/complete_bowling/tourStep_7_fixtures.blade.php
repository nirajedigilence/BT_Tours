<style>
    
.fixture_div {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 5px;
}
.add_more_upload {
    border: 1px solid #eee;
    padding: 10px;
    margin: 0px 15px 15px 15px;
}
</style>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Category, location and tags    
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="1"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Blue bar
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="2"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Tour Details
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="3"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>
<div class="white_part notesSubSection">
    <div class="colspanPerStepMain">
        <div class="colspanPerStepLeft">
        Hotel
        </div>
        <div class="colspanPerStepRight">
            <a href="javascript:;" class="downArrowCls backArrowBtnCls" data-back="4"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>

<div class="white_part">
    <div class="flwMainTitleCls">
        Fixture
    </div>
    
    <div class="fixtureAppend">
        <?php 
        if(isset($experience)){
            if(count($experience->ExperiencesToFixtures) >= 1){
                $cnts = '11565';
            foreach ($experience->ExperiencesToFixtures as $key => $value) { 
                ?>
                <div class="everyFixtureCls">
                    <div class="flwSubTitleCls">
                        <div class="row">
                            <div class="col-sm-11 fixtureCnt">
                                Fixture {{ $key+1 }}
                            </div>
                            <div class="col-sm-1">
                                <label for="Location1">&nbsp;</label>
                                <a href="javascript:;" class="removeFixtureCls redCls"><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="partOneCls">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Category1">Fixture Title</label>
                                    <input name="step8[fixture][{{ $cnts }}][title]" class="form-control" value="{{ $value->title }}" required="" data-msg-required="Please provide name">
                                    <input name="step8[fixture][{{ $cnts }}][id]" class="form-control" value="{{ $value->id }}" type="hidden">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Category1">Fixture Text</label>
                                    <textarea name="step8[fixture][{{ $cnts }}][fixture_text]" class="form-control" required="" data-msg-required="Please provide name">{{ $value->fixture_text }}</textarea>
                                   
                                </div>
                            </div>
                            
                        </div>
                        
                                  
                    </div>
                    <div class="clearfix"></div>
                </div>

        <?php
            $cnts++;
           
         } } }else{ ?>
            <div class="everyFixtureCls">
                <div class="flwSubTitleCls">
                    <div class="row">
                        <div class="col-sm-11 fixtureCnt">
                            Fixture 1
                        </div>
                        <div class="col-sm-1">
                            <label for="Location1">&nbsp;</label>
                            <a href="javascript:;" class="removeFixtureCls redCls"><i class="fas fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="partOneCls">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Fixture Title</label>
                                <input name="step8[fixture][1][title]" class="form-control" >
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Category1">Fixture Text</label>
                                <textarea name="step8[fixture][1][fixture_text]" class="form-control" ></textarea>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="clearfix"></div>
            </div>
            
         <?php } ?> 
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="hidden" name="expFixtureRow" class="expFixtureRow" value="3">
            <div class="addmorelnk centerBtnCls addFixtureBtn" data-id="1">Add Fixture</div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    
</script>