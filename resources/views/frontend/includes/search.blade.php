<section>
   <div class="ipro-search ">
      <div class="container">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
               <div class="search-filter">
                  <div class="filter-area">
                     <form>
                        <div class="row">
                           <div class="col-12 col-sm-12 col-md-12 {{ isset($fromMemberSearch) ? 'col-lg-10':'col-lg-9'}} p-0">
                              <div class="input-box">
                                 <div class="form-group mb-0">
                                    <label class="mb-0" for="exampleInput">{{ isset($fromMemberSearch) ? 'Member Search':'Property Search'}}</label>
                                    <input type="text" class="form-control border-0 p-0" id="exampleInput" placeholder="{{ isset($fromMemberSearch) ? "Enter member details...":"Simply describe the property you're looking for..."}} ">
                                 </div>
                              </div>
                              <div class="filter-advanc-menu">
                                 <div class="row">
                                    <div class="filter-box-new">
                                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 pull-left p-0">
                                          <div class="advanc-filter-box">
                                             <label class="box-label search-selectwrap" for="id_label_single">
                                             Min Beds
                                             </label>
                                             <span class="select2-selectwrap">
                                                <select class="js-example-basic-single menu-select2" name="state">
                                                   <option value="AL">Any</option>

                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 pull-left p-0">
                                          <div class="advanc-filter-box">
                                             <label class="box-label search-selectwrap" for="id_label_single">
                                             Min Baths
                                             </label>
                                             <span class="select2-selectwrap">
                                                <select class="js-example-basic-single menu-select2" name="state">
                                                   <option value="AL">Any</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 pull-left p-0">
                                          <div class="advanc-filter-box">
                                             <label class="box-label search-selectwrap" for="id_label_single">
                                             Min Price
                                             </label>
                                             <span class="select2-selectwrap">
                                                <select class="js-example-basic-single menu-select2" name="state">
                                                   <option value="AL">Any</option>
												   <option value="1">$1,000</option>
												   <option value="1">$1,500</option>
												   <option value="1">$2,000</option>
												   <option value="1">$2,500</option>
												   <option value="1">$3,000</option>
												   <option value="1">$4,000</option>
												   <option value="1">$5,000</option>
												   <option value="1">$10,000</option>
                                                   <option value="1">$25,000</option>
                                                   <option value="2">$50,000</option>
                                                   <option value="3">$75,000</option>
                                                   <option value="4">$100,000</option>
                                                   <option value="5">$125,000</option>
                                                   <option value="6">$150,000</option>
                                                   <option value="7">$175,000</option>
                                                   <option value="8">$200,000</option>
                                                   <option value="9">$250,000</option>
                                                   <option value="9">$300,000</option>
                                                   <option value="10">$350,000</option>
                                                   <option value="11">$400,000</option>
                                                   <option value="12">$450,000</option>
                                                   <option value="13">$500,000</option>
                                                   <option value="13">$550,000</option>
                                                   <option value="13">$600,000</option>
                                                   <option value="13">$650,000</option>
                                                   <option value="13">$700,000</option>
                                                   <option value="13">$800,000</option>
                                                   <option value="13">$900,000</option>
                                                   <option value="13">$1,000,000</option>
                                                   <option value="13">$1,500,000</option>
                                                   <option value="13">$2,000,000</option>
                                                   <option value="13">$2,500,000</option>
                                                   <option value="13">$5,000,000</option>
                                                   <option value="13">$10,000,000</option>
                                                </select>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-6 col-md-3 col-lg-3 pull-left p-0">
                                          <div class="advanc-filter-box">
                                             <label class="box-label search-selectwrap" for="id_label_single">
                                             Max Price
                                             </label>
                                             <span class="select2-selectwrap">
                                                <select class="js-example-basic-single menu-select2" name="state">
                                                  <option value="AL">Any</option>
												  <option value="1">$1,000</option>
												   <option value="1">$1,500</option>
												   <option value="1">$2,000</option>
												   <option value="1">$2,500</option>
												   <option value="1">$3,000</option>
												   <option value="1">$4,000</option>
												   <option value="1">$5,000</option>
												   <option value="1">$10,000</option>
                                                   <option value="1">$25,000</option>
                                                  <option value="2">$50,000</option>
                                                   <option value="3">$75,000</option>
                                                   <option value="4">$100,000</option>
                                                   <option value="5">$125,000</option>
                                                   <option value="6">$150,000</option>
                                                   <option value="7">$175,000</option>
                                                   <option value="8">$200,000</option>
                                                   <option value="9">$250,000</option>
                                                   <option value="9">$300,000</option>
                                                   <option value="10">$350,000</option>
                                                   <option value="11">$400,000</option>
                                                   <option value="12">$450,000</option>
                                                   <option value="13">$500,000</option>
                                                   <option value="13">$550,000</option>
                                                   <option value="13">$600,000</option>
                                                   <option value="13">$650,000</option>
                                                   <option value="13">$700,000</option>
                                                   <option value="13">$800,000</option>
                                                   <option value="13">$900,000</option>
                                                   <option value="13">$1,000,000</option>
                                                   <option value="13">$1,500,000</option>
                                                   <option value="13">$2,000,000</option>
                                                   <option value="13">$2,500,000</option>
                                                   <option value="13">$5,000,000</option>
                                                   <option value="13">$10,000,000</option>
                                                   <option value="13">$20,000,000</option>
                                                </select>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="filter-box-new">
                                       <div class="col-12 col-sm-6 col-md-6 col-lg-6 pull-left p-0 cus-bdr">
                                          <div class="input-box">
                                             <div class="form-group mb-0">
                                                <label class="mb-0" for="minSquare">Min Square Feet</label>
                                                <input type="text" class="form-control border-0 p-0" id="minSquare" placeholder="Any">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-sm-6 col-md-6 col-lg-6 pull-left p-0 cus-bdr">
                                          <div class="input-box">
                                             <div class="form-group mb-0">
                                                <label class="mb-0" for="maxSquare">Max Square Feet</label>
                                                <input type="text" class="form-control border-0 p-0" id="maxSquare" placeholder="Any">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           @if(!isset($fromMemberSearch))
                           <div class="col-4 col-sm-4 col-md-2 col-lg-1 p-0">
                              <div class="advance-filter">
                                 <a href="#" class="fltr-icn">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                       <defs>
                                          <style>.icon-search-plus{fill:none;stroke:#fff;stroke-linejoin:round;stroke-width:2px;}</style>
                                       </defs>
                                       <g data-name="137-Zoom" id="_137-Zoom">
                                          <circle class="icon-search-plus" cx="12" cy="12" r="11"></circle>
                                          <line class="icon-search-plus" x1="20" x2="31" y1="20" y2="31"></line>
                                          <line id="rh_icon__search" class="icon-search-plus" x1="12" x2="12" y1="6" y2="18" style="display: inline-block;"></line>
                                          <line class="icon-search-plus" x1="18" x2="6" y1="12" y2="12"></line>
                                       </g>
                                    </svg>
                                 </a>
                              </div>
                           </div>
                           @endif
                           <div class="col-8 col-sm-8 col-md-10 col-lg-2 p-0{{ isset($fromMemberSearch) ? ' col-12 col-sm-12 col-md-12':''}}">
                              <div class="filter-search {{ isset($fromMemberSearch) ? 'bg-perpal':''}}">
                                 <button type="submit" value="" class="scrch-icn">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                       <defs>
                                          <style>.icon-search{fill:none;stroke:#fff;stroke-linejoin:round;stroke-width:2px;}</style>
                                       </defs>
                                       <g data-name="32-Search" id="_32-Search">
                                          <circle class="icon-search" cx="12" cy="12" r="11"></circle>
                                          <line class="icon-search" x1="20" x2="31" y1="20" y2="31"></line>
                                       </g>
                                    </svg>
                                    <span> Search </span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
