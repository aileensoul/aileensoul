<div class="col-md-7 col-sm-7">
                        <div class="job-search-box1 clearfix">

                        	
                        
                       <?php
                         echo form_open('search/freelancer_post_search'); ?>
                            <fieldset class="col-md-3">
                             <!--    <label>Find Your Skills</label>
                              -->  
                              <input type="text" id="tags" name="skills" placeholder="Find Your freelancer">
                                </select>

                            </fieldset>
                            <fieldset class="col-md-3">
                             <!--    <label>Find Your Location</label>
                              -->  

                               <input type="text" id="searchplace" name="searchplace" placeholder="Find Your freelancer"> 
                             <!-- <select class="" name="searchplace[]" id="searchplace" multiple="multiple"></select> -->
                             
                            </fieldset><!-- 
                            <fieldset class="col-md-2">
                                <button onclick="return checkvalue()"> Search</button>
                            </fieldset> -->

                              <fieldset class="col-md-2">

                              <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                                <button onclick="return checkvalue()"  id="search_btn" style="display: none;"> Search</button>
                            </fieldset>
                        <?php echo form_close();?>
                        </div>
                    </div>