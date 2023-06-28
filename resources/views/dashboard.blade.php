<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ======= Meta Tags and Links ======= -->
    @include('layouts.insideHead')
    <!-- ======= Meta Tags and Links ======= -->
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
    <!-- ======= Sidebar ======= -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Initial Login</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Initial Login</li>
                </ol> 
            </nav> 
        </div><!-- End Page Title -->
<!-- 7410531306 shivraj manageri -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add/Create Credentials</h5>

                            <!-- Default Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Personal Information (CEO or highest position officer)
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"></h5>

                                                    <form class="row g-3" id="personalInfoForm">

                                                    <input type="text" value="{{session('user_id')}}" name="user_id" id="user_id">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" placeholder="Address" name="ceo_name" id="ceo_name"></input>
                                                                <label for="">Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" placeholder="Address" name="ceo_company_name" id="ceo_company_name"></input>
                                                                <label for="">Company Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="ceo_personal_phone" id="ceo_personal_phone"></input>
                                                                <label for="floatingTextarea">Phone</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="ceo_personal_email" id="ceo_personal_email"></input>
                                                                <label for="floatingTextarea">Personal Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="ceo_company_email" id="ceo_company_email"></input>
                                                                <label for="floatingTextarea">Comapny Email</label>
                                                            </div>
                                                        </div>

                                                        <p><b>Note: </b>This is one time Information, please double check & fill it carefully</p>

                                                        <div class="text-center">
                                                            <button type="button" onclick="savePersonalInfo();" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                                        </div>

                                                    </form><!-- End No Labels Form -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Company Information
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form class="row g-3" id="company_information">

                                            <input type="text" value="{{session('user_id')}}" name="user_id" id="user_id">
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" placeholder="Address" name="company_official_name" id="company_official_name"></input>
                                                        <label for="">Company Official Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Address" name="company_established" id="company_established"></input>
                                                        <label for="floatingTextarea">Company Established</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Address" name="company_email" id="company_email"></input>
                                                        <label for="floatingTextarea">Company Official Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Address" name="company_telephone" id="company_telephone"></input>
                                                        <label for="floatingTextarea">Telephone</label>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Address" name="company_branch_location" id="company_branch_location"></input>
                                                        <label for="floatingTextarea">Company Main Branch Location</label>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Address" name="company_workers" id="company_workers"></input>
                                                        <label for="floatingTextarea">Total Workers (Including Board Members)</label>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <button type="button" onclick="submitCompanyInfo();" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </form><!-- End No Labels Form -->
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                            <b>Assign Primary Positions</b> (Main Team Leads and Managers)
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="card">
                                                <div class="card-body">

                                                    <form class="row g-3 mt-2">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" placeholder="Address" name="cc_name" id="cc_name"></input>
                                                                <label for="">Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="cc_phone" id="cc_phone"></input>
                                                                <label for="floatingTextarea">Phone</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="cc_email" id="cc_email"></input>
                                                                <label for="floatingTextarea">Email</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" placeholder="Address" name="cc_password" id="cc_password"></input>
                                                                <label for="floatingTextarea">Passowrd</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select" name="cc_designation_name" id="cc_designation_name" aria-label="State">
                                                                    <option value=""></option>
                                                                    <option value="1">COO</option>
                                                                    <option value="2">CTO</option>
                                                                </select>
                                                                <label for="floatingSelect">Position</label>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="button" onclick="sendDesignationDetails();" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </form><!-- End No Labels Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Default Accordion Example -->

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- ======= Includes all JS links and tags. This also include main.js ======= -->
    @include('layouts.footerTags')
    <!-- ======= Includes all JS links and tags. This also include main.js ======= -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        var data = {};
        data['_token'] = '{{csrf_token()}}';
        function savePersonalInfo() {
            confirm("Aru your of these details");
            data['ceo_name'] = $("#ceo_name").val();
            data['user_id'] = $("#user_id").val();
            data['ceo_company_name'] = $("#ceo_company_name").val();
            data['ceo_personal_phone'] = $("#ceo_personal_phone").val();
            data['ceo_personal_email'] = $("#ceo_personal_email").val();
            data['ceo_company_email'] = $("#ceo_company_email").val();
            // data['ceo_position'] = $("#ceo_position").val();
            $.ajax({
                data:data,
                type:"POST",
                url:"save_ceo_personal_infos",
                success:function() {

                }
            })
        }

        function submitCompanyInfo() {
            data['user_id'] = $("#user_id").val();
            data['company_official_name'] = $("#company_official_name").val();
            data['company_established'] = $("#company_established").val();
            data['company_email'] = $("#company_email").val();
            data['company_telephone'] = $("#company_telephone").val();
            data['company_branch_location'] = $("#company_branch_location").val();
            data['company_workers'] = $("#company_workers").val();
            $.ajax({
                data:data,
                type:"POST",
                url:"company_infos",
                success:function() {

                }
            })
        }

        function sendDesignationDetails() {
            data['user_id'] = $("#user_id").val();
            data['cc_name'] = $("#cc_name").val();
            data['cc_phone'] = $("#cc_phone").val();
            data['cc_email'] = $("#cc_email").val();
            data['cc_password'] = $("#cc_password").val();
            data['cc_designation_name'] = $("#cc_designation_name").val();
            $.ajax({
                data:data,
                type:"POST",
                url:"company_designation_infos",
                success:function() {

                }
            })
        }
    </script>
</body>

</html>