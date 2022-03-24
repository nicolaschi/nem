@include('manufacturer.mheader')

              
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"> Account </h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Unique ID: <span class="text-base">{{ Auth::User()->unique_id }}</span></li>
                                                    <li>Last Login: <span class="text-base">15 Feb, 2019 01:02 PM</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="{{ url('/mprofile') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>View Profile</span></a>
                                            <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">

                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Account Information</h5>
                                                            <p>Welcome {{ Auth::User()->name }}</p>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Uniqie ID :</span>
                                                                    <span class="profile-ud-value">{{ Auth::User()->unique_id }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Approval status :</span>
                                                                    <span class="profile-ud-value">{{ Auth::User()->status }}</span>
                                                                </div>
                                                            </div>                   
                                                        </div><!-- .profile-ud-list -->

                                                        
                                                    </div><!-- .nk-block -->

    
                                                   
                                                    <div class="nk-divider divider md"></div>
                                     <div class="nk-block">

                                                   

                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                             @if(Auth::User()->status=='pending')

                                <button type="submit" class="btn btn-primary col-md-3">Pay Certification Fee</button>
                                </div>

                                @else(Auth::User()->status=='active')
                                

                                @endif
    
                                        
                                      
    
                                        
                                        </div><!-- .nk-block -->

                                                    <div class="nk-divider divider md"></div>

                                                    <div class="nk-block">

                                                   

                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">Note</h5>
                                                            
                                                        </div><!-- .nk-block-head -->
                                                        <div class="bq-note">
                                                            <div class="bq-note-item">
                                                                <div class="bq-note-text">
                                                                    <p>Our team is currently working on verifying your details, kindly wait while we approve your account. </p>
                                                                </div>
                                                                
                                                            </div><!-- .bq-note-item -->
                                                            
                                                        </div><!-- .bq-note -->
                                                    </div><!-- .nk-block -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-content -->
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

@include('manufacturer.mfooter')