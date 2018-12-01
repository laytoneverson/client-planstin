@extends('includes.body-admin')

@section('content')

     <!-- business body content -->
    <section class="businees-pro-cre">
        <div class="container">
            <h2 class="busi-p-cre-head text-black">Create your business profile</h2>
            <div class="row">
                <form action="" class="user-data">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label class="data-input-label text-black" for="exampleInputEmail1">Business Name</label>
                            <span class="input-detail text-gray-3">Name of company, DBA or sole proprietorship.</span>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                       </div>
                        <div class="form-group">
                            <label class="data-input-label text-black" for="exampleInputEmail1">Business Tax ID</label>
                            <span class="input-detail text-gray-3">Please enter business EIN, Tax ID or sole proprietor social security number.</span>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-uploader">
                            <img class="up-img up-img-1" src="/images/uplaod-icon.png" alt="">
                            <span class="up-img up-text">Add Profile Picture</span>
                        </div>
                        
                        <div class="clearfix"></div>
                        <!-- upload file -->
                        <input id="upload" type="file"/>
                        <a href="" id="upload_link">
                            <div class="img-upload">
                                <img class="up-plus" src="/images/up-plus.png" alt="">
                            </div>
                        </a>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12">
                               <label class="data-input-label text-black b-addr" for="exampleInputEmail1">Business Address</label>
                          </div>
                      </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <span class="input-detail text-gray-3">Street Address</span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                   <span class="input-detail text-gray-3">Address Line 2   </span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                   <span class="input-detail text-gray-3">City </span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <span class="input-detail text-gray-3">Province/State* </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                           <span class="input-detail text-gray-3">Postcode/Zip* </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Primary Contact First Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Primary Contact Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Primary Contact Phone Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1"> Primary Contact Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <p class="isBilling text-gray-3">Is the primary contact also the billing contact?</p>
                                </div>
                            </div>
                             <div class="col-md-6">
                                 <div class="form-group rdo1">
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">Yes</span>
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">No</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-12">
                                <h3 class="payMetod text-black">Select payment method</h3>
                                <ul class="checkPayMethod">
                                    <li>
                                        <input class="check" id="ACH" type="radio" name="payment"><span class="text-gray-3">ACH</span>
                                    </li>
                                    <li>
                                        <input class="check" id="Debit" type="radio" name="payment"><span class="text-gray-3">Debit Card</span>
                                    </li>
                                    <li>
                                        <input class="check" id="Credit" type="radio" name="payment"><span class="text-gray-3">Credit Card</span>
                                    </li>
                                    <li>
                                        <input class="check" id="Invoice" type="radio" name="payment"><span class="text-gray-3">Invoice</span>
                                    </li>
                                    <li>
                                        <input class="check" id="Checks" type="radio" name="payment"><span class="text-gray-3">Check</span>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- drop down -->
                    
                    
                     <ul class="pay-method payMethod-drop">
                       
                       <!-- ACH -->
                        <li id="ACHe">
                           <div class="col-md-6">
                              <h3 class="payMetod text-black">Bank account information</h3>
                               <div class="form-group">
                                    <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Account name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                               <div class="form-group">
                                    <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Routing Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                               <div class="form-group">
                                    <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Account Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                           </div>
                           <div class="col-md-6">
                              <label for="" class="data-input-label2 text-black mgr-b mgr-t" >Find your routing and account number on your check book</label>
                               <img class="img-fluid img-check" src="/images/check.png" alt="">                 
                           </div>
                           <div class="clearfix"></div>
                           <div class="autoPay">
                               <div class="col-md-6">
                                 <div class="form-group">
                                    <p class="isBilling text-black">Would you like to enroll for auto pay?</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group rdo1">
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">Yes</span>
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">No</span>
                                </div>
                             </div>
                           </div>
                        </li>
                        
                        <!--Debit Card  -->
                        
                       <li id="Debite">
                          <div class="clearfix"></div>
                           <div class="col-md-6">
                              <h3 class="payMetod text-black">Debit Card Detail</h3>
                               <div class="form-group">
                                    <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Card Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="col-md-12">
                               <div class="row">
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Expiration Month</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Expiration Year</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">CVV Code</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <p title="You can find" class="questin-ans text-black"><i class="fa fa-info-circle" aria-hidden="true"></i><span>What is CVV Code?</span></p>
                                   </div>
                               </div>
                           </div>
                           
                           <div class="col-md-12">
                               <p class="payee-info text-black">Payee information</p>
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">First Name*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Last Name*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3 gender-select">
                                       <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Gender</label>
                                       <br>
                                        <input type="radio" name="gender" value=""> <label class="data-input-label2 gender text-black mgr-r-2" for="exampleInputEmail1">Male</label>
                                        <input type="radio" name="gender" value=""> <label class="data-input-label2 gender text-black mgr-b" for="exampleInputEmail1">Female</label>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Email*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Confirm Email*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Phone*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              
                               <p class="payee-info text-black">Billing Address</p>
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Country*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">City*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Province/State*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Address Line*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Postcode/Zip*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              
                           </div>
                           <div class="clearfix"></div>
                           <div class="autoPay">
                               <div class="col-md-6">
                                 <div class="form-group">
                                    <p class="isBilling text-black">Would you like to enroll for auto pay?</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group rdo1">
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">Yes</span>
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">No</span>
                                </div>
                             </div>
                           </div>
                        </li>
                        
                       <!--Credit Card  -->
                        
                       <li id="Credite">
                          <div class="clearfix"></div>
                           <div class="col-md-6">
                              <h3 class="payMetod text-black">Credit Card Detail</h3>
                               <div class="form-group">
                                    <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Card Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                               </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="col-md-12">
                               <div class="row">
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Expiration Month</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Expiration Year</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">CVV Code</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <p title="You can find" class="questin-ans text-black"><i class="fa fa-info-circle" aria-hidden="true"></i><span>What is CVV Code?</span></p>
                                   </div>
                               </div>
                           </div>
                           
                           <div class="col-md-12">
                               <p class="payee-info text-black">Payee information</p>
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">First Name*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Last Name*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3 gender-select">
                                       <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Gender</label>
                                       <br>
                                        <input type="radio" name="gender" value=""> <label class="data-input-label2 gender text-black mgr-r-2" for="exampleInputEmail1">Male</label>
                                        <input type="radio" name="gender" value=""> <label class="data-input-label2 gender text-black mgr-b" for="exampleInputEmail1">Female</label>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Email*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Confirm Email*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Phone*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              
                               <p class="payee-info text-black">Billing Address</p>
                               <div class="row">
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Country*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">City*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Province/State*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Address Line*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                            <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Postcode/Zip*</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                   </div>
                                   <div class="col-md-3"></div>
                              </div>
                              
                           </div>
                           <div class="clearfix"></div>
                           <div class="autoPay">
                               <div class="col-md-6">
                                 <div class="form-group">
                                    <p class="isBilling text-black">Would you like to enroll for auto pay?</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group rdo1">
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">Yes</span>
                                    <input class="check" type="radio" name="status"><span class="text-gray-3">No</span>
                                </div>
                             </div>
                           </div>
                        </li>
                       
                       <li id="Invoicee">
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <h3 class="payMetod text-black">Please insert the email where you would like to receive your invoice </h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <label class="data-input-label2 text-black mgr-b" for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                            <br>
                                            <h4 class="data-input-label2 text-black mgr-b">You will also be able to see and pay your invoices through your Planstin portal</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </li>
                       <li id="Checkse">
                           <div class="clearfix"></div>
                           <div class="col-md-12">
                               <h3 class="text-gray-3">Make checks payable to: Planstin, Inc <br>   Mail them to: 283 W Hilton Dr Suite 1 -Saint George, UT 84770</h3>
                           </div>
                       </li>
                    </ul>
                   <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary btn-submit bg-red text-white btn-regis btn-save">save</button>
                </form>
            </div>
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- business body content end-->


@endsection
