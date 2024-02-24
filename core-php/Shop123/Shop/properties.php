<?php  include 'header.php'; ?>
<br><br><br><br>



<div class="container-fluid" id="about-us-banner">
  <div class="row">
      <div class="col-lg-12 col-sm-12">
          <img src="p3.jpeg" style="width:100%; height:400px"/>
      </div>
  </div>
</div>
<br><br>

<section id="aa-properties">
<div class="container">
      <div class="row">
        <div class="col-sm-12">
         <div class="aa-title">
              <h2>Properties</h2>
              <!-- <span></span>  -->
              <br>
              <p style="font-size:16px; text-align:justify-content;">Selling a property is a significant transaction, and careful planning and execution can help you achieve the best possible outcome. Each property sale is unique, so adapt these content ideas to your specific situation and market conditions.Properly preparing and marketing your property can increase your chances of a successful sale at a favorable price.Whether you're buying, selling, renting, or investing in property [Ronisha Infra] is here to simplify the process and provide the guidance you need. Our commitment to integrity, professionalism, and exceptional customer service sets us apart.</p>           
</div>
</section>
 <section id="aa-properties">
    <div class="container">
      <div class="row">
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Properties Search</h3>
              <form action="">
                <div class="aa-single-advance-search">
                  <input type="text" placeholder="Type Your Location">
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                   <option selected="" value="0">CATEGORY</option>
                    <option value="1">FlatS</option>
                    <option value="2">Offices</option>
                    <option value="3">Plots</option>
                   
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">BHK</option>
                    <option value="1">1 BHK</option>
                    <option value="2">2 BHK</option>
                    <option value="3">3 BHK</option>
                    <option value="4">4 BHK</option>
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">₹ RUPEES</option>
                    <option value="1">Upto 65 Lakhs</option>
                    <option value="2">Upto 80 Lakhs</option>
                    <option value="3">Upto 1 Crore</option>
                    <option value="4">Upto 5 Crore</option>
                  </select>
                </div>
                <div class="aa-single-filter-search">
                  <span>AREA (SQ)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper" class="example-val">100.00</span>
                  <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>                  
                </div>
                <div class="aa-single-filter-search">
                  <span>PRICE (₹)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower2" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper2" class="example-val">100.00</span>
                  <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>      
                </div>
                <div class="aa-single-advance-search">
                  <input type="submit" value="Search" class="aa-search-btn">
                </div>
              </form>
            </div> 
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Populer Properties</h3>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="homeproperty1.jpeg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#" style="color:black;">The Promenade</a></h4>
                  <p>The “promenade” refers to a leisurely stroll or walk.</p>                
                  <span>₹65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="homeproperty2.jpeg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#" style="color:black;">The Arboretum</a></h4>
                  <p>The term “arboretum” is derived from the Latin word meaning tree.</p>                
                  <span>₹65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="homeproperty3.jpeg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#" style="color:black;">The Cottage</a></h4>
                  <p>A small, cozy home.</p>                
                  <span>₹65000</span>
                </div>              
              </div>
            </div>
          </aside>
        </div>
        <div class="col-md-8">
          <div class="aa-properties-content">
            <!-- start properties content head -->
            <div class="aa-properties-content-head">              
              <div class="aa-properties-content-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">6</option>
                    <option value="2">12</option>
                    <option value="3">24</option>
                  </select>
                </form>
              </div>
              <div class="aa-properties-content-head-right">
                <a id="aa-grid-properties" href="#"><span class="fa fa-th" style="color:#59abe3;"></span></a>
                <a id="aa-list-properties" href="#"><span class="fa fa-list" style="color:#59abe3;"></span></a>
              </div>            
            </div>
            Start properties content body
            <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" style="height:200px;" src="villa1.jpeg">
                    </a>
                    <div class="aa-tag for-rent">
                      For Rent
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">The Atrium</a></h3>
                        <p style="color:black;">The term “atrium” evokes ideas of a bright and spacious area. </p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹35,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" src="villa2.jpeg">
                    </a>
                    <div class="aa-tag sold-out">
                      Sold Out
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">Haven</a></h3>
                        <p style="color:black;"> “Haven” is another excellent option for naming your flat.</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹75,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" style="height:210px;" src="ces1.jpeg">
                    </a>
                    <div class="aa-tag for-rent">
                      For Rent
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">Hearth</a></h3>
                        <p style="color:black;"> “Hearth” is an excellent option</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹95,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" style="height:210px;" src="ces2.jpeg">
                    </a>
                    <div class="aa-tag for-rent">
                      For Rent
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">The Vineyard</a></h3>
                        <p style="color:black;">The “vineyard” is used for grape growing region.</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹1,00,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" src="pl1.jpeg">
                    </a>
                    <div class="aa-tag for-rent">
                      For Rent
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">The Oasis</a></h3>
                        <p style="color:black;">The term “oasis” refers to a refreshing oasis in a desert.</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹75,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="#">
                      <img alt="img" style="height:240px;" src="pl2.jpeg">
                    </a>
                    <div class="aa-tag for-rent">
                      For Rent
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info" style="color:black;">
                        <span>5 Rooms</span>
                        <span>2 Beds</span>
                        <span>3 Baths</span>
                        <span>1100 SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="#" style="color:black;">The Dumpster</a></h3>
                        <p style="color:black;">The Dumpster is an apartment complex that is located in a dumpster.</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price" style="color:black;">
                        ₹95,00,000
                        </span>
                        <a class="aa-secondary-btn" href="#">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
              </ul>
            </div> 
            Start properties content bottom
            <div class="aa-properties-content-bottom">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li class="active"><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">            
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img" style="width:150%;">
               <img src="slide2.jpeg" alt="img">
               <img src="slide1.jpeg" alt="img">
               <img src="slide4.jpeg" alt="img">
             </div>
             <div class="aa-properties-info" >
               <h2 style="color:black;">The Golden Grotto</h2>
               <span class="aa-price">₹65000</span>
              <p>Popular amongst literary fans as well as those of us lucky enough to have a home situated amongst a beautiful golden grotto.  Golden grotto house is the name of the long-standing Massachusetts home of the famous literary family, the Alcotts.  Louisa May Alcott, of ‘Little Women’ fame, returned to her home, golden grotto House, to find inspiration to pen her famous American Classic celebrating the relationship of the four sisters, which was firmly based on her own childhood. Therefore the name, not only reflects beauty and heritage, but one of a loving, close-knit family.</p>
               <h4>Propery Features</h4>
               <ul>
                 <li style="color:black;">4 Bedroom</li>
                 <li style="color:black;">3 Baths</li>
                 <li style="color:black;">Kitchen</li>
                 <li style="color:black;">Air Condition</li>
                 <li style="color:black;">Belcony</li>
                 <li style="color:black;">Gym</li>
                 <li style="color:black;">Garden</li>
                 <li style="color:black;">CCTV</li>
                 <li style="color:black;">Children Play Ground</li>
                 <li style="color:black;">Comunity Center</li>
                 <li style="color:black;">Security System</li>
               </ul>
<div class="container">
                <div class="row">
                  <div class="col-md-6">
               <h4>Property Video</h4>
               <iframe width="100%" height="500" src="video.mp4"  frameborder="0" allowfullscreen></iframe>
                 </div>
                <div class="row">
                  <div class="col-md-6">
                 <h4>Property Map</h4>
               <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d112200.1938683839!2d77.23949665650356!3d28.501942865479997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e2!4m3!3m2!1d28.4250826!2d77.3111595!4m5!1s0x390ce55e105021dd%3A0x4e2b04c909b9007f!2sronisha%20informatics!3m2!1d28.5785666!2d77.31231439999999!5e0!3m2!1sen!2sin!4v1692189811526!5m2!1sen!2sin" width="100%;" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"></iframe>
             </div>
               </div>
               </div>
</div>
             <!-- Properties social share -->
             <div class="aa-properties-social">
               <ul>
                 <li style="color:black;">Share</li>
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                 <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
               </ul>
             </div>
             <!-- Nearby properties -->
             <div class="aa-nearby-properties">
               <div class="aa-title">
                 <h2 style="margin:18px;">Nearby Properties</h2>
               </div>
               <div class="aa-nearby-properties-area">
                 <div class="row">
                   <div class="col-md-6">
                     <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                          <img alt="img" src="near1.jpeg">
                        </a>
                        <div class="aa-tag for-sale">
                          For Sale
                        </div>
                        <div class="aa-properties-item-content">
                          <div class="aa-properties-info">
                            <span>5 Rooms</span>
                            <span>2 Beds</span>
                            <span>3 Baths</span>
                            <span>1100 SQ FT</span>
                          </div>
                          <div class="aa-properties-about">
                            <h3 style="color:black;">The Silken Symphony</h3>
                            <p>It is an ideal name for an apartment complex that serves as a palace for its tenants. Silken Symphony is frequently used to denote a huge and elegant residence..</p>                      
                          </div>
                          <div class="aa-properties-detial">
                            <span class="aa-price">
                            ₹20,35,000
                            </span>
                            <a class="aa-secondary-btn" href="#">View Details</a>
                          </div>
                        </div>
                      </article>
                   </div>
                   <div class="col-md-6">
                     <article class="aa-properties-item">
                      <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="near2.jpeg" style=" height:270px; width:100%;">
                      </a>
                      <div class="aa-tag for-sale">
                        For Sale
                      </div>
                      <div class="aa-properties-item-content">
                        <div class="aa-properties-info">
                          <span>5 Rooms</span>
                          <span>2 Beds</span>
                          <span>3 Baths</span>
                          <span>1100 SQ FT</span>
                        </div>
                        <div class="aa-properties-about">
                        <h3 style="color:black;">The Velvet Vista</h3>
                          <p>This name is ideal for an apartment complex that serves as the inhabitants’ stately house. Velvet Vista is frequently used to indicate a huge and impressive residence..</p>                      
                        </div>
                        <div class="aa-properties-detial">
                          <span class="aa-price">
                          ₹50,35,000
                          </span>
                          <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                      </div>
                    </article>
                   </div>
                 </div>
               </div>

             </div>

            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
     
      </div>
    </div>
  </section>



<br><br><br><br><br><br><br><br><br><br><br><br>


<br><br><br><br><br><br><br><br><br>



<br><br><br><br><br><br><br><br><br>


<br><br><br><br><br><br><br><br><br>


<br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>

 