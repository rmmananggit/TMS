<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>TMS</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


       body{
        background-color:#f5eee7;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        color: black !important ; 
       }

       .container{

        height: 100vh;

       }

       .card{

        border: none;
       }

       .card-header {
            padding: .5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: none;
        }

        .btn-light:focus {
            color: #212529;
            background-color: #e2e6ea;
            border-color: #dae0e5;
            box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
        }

        .form-control{

          height: 50px;
    border: 2px solid #eee;
    border-radius: 6px;
    font-size: 14px;
        }

        .form-control:focus {
    color: black;
    background-color: #fff;
    border-color: #039be5;
    outline: 0;
    box-shadow: none;

    }

    .input{

      position: relative;
    }

    .input i{

          position: absolute;
    top: 16px;
    left: 11px;
    color: #989898;
    }

    .input input{

      text-indent: 25px;
    }

    .card-text{

      font-size: 13px;
    margin-left: 6px;
    }

    .certificate-text{

      font-size: 12px;
    }

       
    .billing{
      font-size: 11px;
    }  

    .super-price{

          top: 0px;
    font-size: 22px;
    }

    .super-month{

          font-size: 11px;
    }


    .line{
      color: #bfbdbd;
    }

    .free-button{

          background: #1565c0;
    height: 52px;
    font-size: 15px;
    border-radius: 8px;
    }


    .payment-card-body{

    flex: 1 1 auto;
    padding: 24px 1rem !important;

    }</style>
                                </head>
                                <body className='snippet-body'>
                                <div class="container d-flex justify-content-center mt-5 mb-5">

            

            <div class="row g-3">

              <div class="col-md-6">  
                
                <span>Submit your payment here:</span>
                <div class="card mt-2">

                  <div class="accordion" id="accordionExample">
                    
                    <div class="card">
                      <div class="card-header p-0" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="d-flex align-items-center justify-content-between">

                             <h4>G-cash</h4>
                              <img src="./img/gcash.png" width="50">
                              
                            </div>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                        <span class="font-weight-normal card-text">Gcash Name:</span>
                          <input type="text" class="form-control" placeholder="Eg. Juan Dela Cruz">
                        
                          <div class="row">
                          <div class="col-md-6">
                          <span class="font-weight-normal card-text" >Phone Number:</span>
                          <input type="text" class="form-control " placeholder="Eg. 09123456789">
                          </div>
                          <div class="col-md-6">
                          <span class="font-weight-normal card-text">Upload your receipt:</span>
                          <input type="file" class="form-control " placeholder="Reference Number">
                          </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header p-0">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                              <h4>Others</h4>
                              <div class="icons">
                                <img src="./img/banktransfer.png" width="100">
                                <img src="./img/palawan1.png" width="100">
                              </div>
                              
                            </div>
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body payment-card-body">
                          
                          <span class="font-weight-normal card-text">Name:</span>
                          <input type="text" class="form-control" placeholder="Eg. Juan Dela Cruz">

                          <div class="row mt-3 mb-3">

                            <div class="col-md-6">

                            <span class="font-weight-normal card-text">Amount:</span>
                          <input type="text" class="form-control" placeholder="Eg. Juan Dela Cruz">

                                
                             
                            </div>


                            <div class="col-md-6">

                            <span class="font-weight-normal card-text">Reference Number:</span>
                          <input type="text" class="form-control" placeholder="Eg. Juan Dela Cruz">

                              
                            </div>
                            

                          </div>

                          <div class="col-md-12">

                            <span class="font-weight-normal card-text">Receipt:</span>
                            <input type="file" class="form-control">

                              
                            </div>

                          <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your uploaded receipt is secured with ssl certificate</span>
                         
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6">
    <span>Subscription</span>
    <div class="card mt-2">

        <div class="d-flex justify-content-between p-3">
            <label class="radio-label" style="font-size: large;">
                <input type="radio" name="subscriptionType" id="monthlyRadio" onclick="updateSubscriptionInfo('monthly')">
                Monthly
            </label>

            <div class="mt-1">
                <sup class="super-price">₱100</sup>
                <span class="super-month">/Month</span>
            </div>
        </div>

        <div class="d-flex justify-content-between p-3">
            <label class="radio-label" style="font-size: large;">
                <input type="radio" name="subscriptionType" id="yearlyRadio" onclick="updateSubscriptionInfo('yearly')">
                Yearly
            </label>

            <div class="mt-1">
                <sup class="super-price">₱1,000</sup>
                <span class="super-month">/Year</span>
            </div>
        </div>

        <hr class="mt-0 line">

        <div class="p-3">
    <h5 class="mb-3">Where to send payment?</h5>
    <div class="d-flex mb-2">
        <span> <img src="./img/gcash.png" width="60"></span>

        <div class="ml-2">
            <h6><b>Edrick Windell Carmelo</b></h6>
            <h6><b>09123456789</b></h6>
        </div>
    </div>

    <div class="d-flex mb-2">
        <span> <img src="./img/palawan1.png" width="60"></span>

        <div class="ml-2">
            <h6><b>Edrick Windell Carmelo</b></h6>
            <h6><b>09123456789</b></h6>
        </div>
    </div>

    <div class="d-flex mb-2">
        <span> <img src="./img/pnb.png" width="60"></span>

        <div class="ml-2">
            <h6><b>Edrick Windell Carmelo</b></h6>
            <h6><b>413310115291</b></h6>
        </div>
    </div>

</div>


        <hr class="mt-0 line">

        <div class="p-3 d-flex justify-content-between">
            <div class="d-flex flex-column">
                <span>Your total bill is:</span>
            </div>
            <span id="subscriptionInfo"></span>
        </div>

        <div class="p-3">
            <button class="btn btn-primary btn-block free-button">Submit</button>
         
        </div>
    </div>
</div>
              
            </div>
            

          </div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>

<script>
    function updateSubscriptionInfo(subscriptionType) {
        var subscriptionInfo = document.getElementById("subscriptionInfo");

        if (subscriptionType === 'monthly') {
            subscriptionInfo.textContent = "₱100.00";
        } else if (subscriptionType === 'yearly') {
            subscriptionInfo.textContent = "₱1,000.00";
        }
    }
</script>
                            
                                </body>
                            </html>