@extends('layout')
@section('title', 'Registration')
@section('main-section')
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Registration</h3>
        </div>
    </div>
    <div class="about py-5">
        <div class="container py-md-5">
            <p class="sub-tittle text-center mt-4 mb-sm-5 mb-4">Wow, New user... Please fill up the given form clearly for registering at your first try... <br> 😊😊😊</p>
            <div class="row">
                <div class="col-lg-3 contact-info-left"></div>
                <div class="col-lg-6 contact-right-wthree-info login">
                    <h5 class="text-center mb-4"></h5>

                    <form action="#" method="POST" name="registrationForm">
                        @csrf
                        <div class="form-group mt-4">
                            <label><i class="fas fa-file-signature"></i> Full Name</label>
                            <input type="text" class="form-control" name="fullName" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-at"></i> Email</label>
                            <input type="text" class="form-control" name="email" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-mobile-alt"></i> Phone</label>
                            <input type="text" class="form-control" name="telephone" maxlength="10" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-map-marker-alt"></i> Address</label>
                            <input type="text" class="form-control" name="address" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-transgender-alt"></i> Gender: </label>
                            <select class="custom-select" name="gender" required>
                                <option selected value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-unlock-alt"></i> Password</label>
                            <input type="password" class="form-control" name="password" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-unlock-alt"></i> Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-filter"></i> Registration Type: </label>
                            <select class="custom-select" name="registrationType" required>
                                <option selected value="">Select Registration Type</option>
                                <option value="Seller">Seller</option>
                                <option value="buyer">Buyer</option>
                            </select>
                        </div>

                        <div class="form-group mt-4 mb-4 custom-file">
                            <label for="profileImage" ><i class="fas fa-unlock-alt"></i> Choose Profile Image</label><br>
                            <input class="mb-4" type="file" id="profileImage" name="profileImage">
                        </div>

                        <button type="submit" class="btn btn-primary submit mt-4" name="registration" onclick="return registrationValidation()">Submit </button>

                    </form>

                </div>
                <div class="col-lg-3 contact-info-left"></div>
            </div>
        </div>
    </div>
@endsection
