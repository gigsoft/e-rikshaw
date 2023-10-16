@extends('admin.layouts.master',['layout'=>'vehicles'])
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">bs-stepper</h3>
        </div>
        <div class="card-body p-0">
          <div class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
              <!-- your steps here -->
              <div class="step" data-target="#vehicles-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="vehicles-part" id="vehicles-part-trigger">
                  <span class="bs-stepper-circle">1</span>
                  <span class="bs-stepper-label">Vehicles</span>
                </button>
              </div>

              <div class="step" data-target="#heirer-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="heirer-part" id="heirer-part-trigger">
                  <span class="bs-stepper-circle">2</span>
                  <span class="bs-stepper-label">Heirer information</span>
                </button>
              </div>
              <div class="step" data-target="#gurenter-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="heirer-part" id="gurenter-part-trigger">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Guranator information</span>
                </button>
              </div>
              <div class="step" data-target="#battery-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="battery-part" id="battery-part-trigger">
                  <span class="bs-stepper-circle">4</span>
                  <span class="bs-stepper-label">Battery information</span>
                </button>
              </div>
            </div>
            <form action="{{ route('admin.vehicle.store') }}" method="post" id="user-form" enctype="multipart/form-data">
                @csrf
            <div class="bs-stepper-content">
              <!-- your steps content here -->
              <div id="vehicles-part" class="content" role="tabpanel" aria-labelledby="vehicles-part-trigger">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            {{-- <input type="text" name="name" id="name" class="form-control" placeholder="Name" required> --}}
                            <select id="model" name="model" class="form-control" required>
                                <option value="">Select Model </option>
                                @if($vehicle_models)
                                @foreach ($vehicle_models as $model)
                                <option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
                                @endforeach
                             @endif
                            </select>
                            <span class="text-danger" id="name-error"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="cashFinance">Cash/Finance</label>
                            <select id="cashFinance" name="cashFinance" class="form-control" required>
                                <option value="">Select Cash/Finance </option>
                                <option value="cash">Cash</option>
                                <option value="finance">Finance</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name">Sales Price</label>
                            <input type="text" name="sales_price" id="sales_price" class="form-control" placeholder="Enter Sales Price" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name">Bill Price</label>
                            <input type="text" name="bill_price" id="bill_price" class="form-control" placeholder="Enetr Bill Price" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pending_payment">Advance Payment</label>
                            <input type="text" name="advance_payment" id="advance_payment" class="form-control" placeholder="PAYMENT" required >
                        </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="colour">Colour</label>
                            <select id="colour" name="colour" class="form-control" required>
                                <option value="">Select Colour </option>
                                @if($vechicle_colour)
                                @foreach ($vechicle_colour as $color)
                                <option value="{{ $color['id'] }}">{{ $color['colour'] }}</option>
                                @endforeach
                             @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="rc_status">RC PENDING OR GIVEN </label>
                            <select id="rc_status" name="rc_status" class="form-control" required>
                                <option value="">Select RC PENDING OR GIVEN</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="chassie_print">CHASSIE PRINT</label>
                            <input type="text" name="chassie_print" id="chassie_print" class="form-control" placeholder="CHASSIE PRINT" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="engine_no">ENGINE NO</label>
                            <input type="text" name="engine_no" id="engine_no" class="form-control" placeholder="ENGINE NO" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="down_payment">DOWN PAYMENT</label>
                            <input type="text" name="down_payment" id="down_payment" class="form-control" placeholder="DOWN PAYMENT" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="financed_by">FINANCED BY</label>
                            <input type="text" name="financed_by" id="financed_by" class="form-control" placeholder="FINANCED BY" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="emi_amount">EMI AMOUNT</label>
                            <input type="text" name="emi_amount" id="emi_amount" class="form-control" placeholder="EMI AMOUNT" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="udhar">UDHAR</label>
                            <input type="text" name="udhar" id="udhar" class="form-control" placeholder="UDHAR" required>
                             <span class="text-danger" id="name-error"></span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="insurance_amount_date">INSURANCE AMOUNT DATE</label>
                            <input type="date" id="insurance_amount_date" name="insurance_amount_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pending_payment">PENDING PAYMENT FROM FINANCE</label>
                            <input type="text" name="pending_payment" id="pending_payment" class="form-control" placeholder="PAYMENT" required>
                        </div>
                    </div>

                </div>

                <input type="button" class="btn btn-primary " onclick="stepper.next()" value="Next">
              </div>
              <div id="heirer-part" class="content" role="tabpanel" aria-labelledby="heirer-part-trigger">
                <div class="row">
                    <div class="card-body">

                        <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="hierer_name">HIERER NAME</label>
                                        <input type="text" name="hierer_name" id="hierer_name" class="form-control" placeholder="NAME" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="phon_no_1">PHON NO 1 </label>
                                        <input type="text" name="hphon_no_1" id="hphon_no_1" class="form-control" placeholder="PHON NO 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="phon_no_2">PHON NO 2</label>
                                        <input type="text" name="hphon_no_2" id="hphon_no_1" class="form-control" placeholder="PHON NO 2">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="phon_no_3">PHON NO 3</label>
                                            <input type="text" name="hphon_no_3" id="hphon_no_1" class="form-control" placeholder="PHON NO 3">
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="hierer_name">Profile Image</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control mb-2" placeholder="NAME" required>
                                    <img id="preview_profile_image" src="{{asset('admin-assets/img/default-150x150.png')}}" alt="Profile Image Preview" class="preview-image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="phon_no_1">Adhar Card</label>
                                    <input type="file" name="adhar_card" id="adhar_card" class="form-control mb-2" placeholder="PHON NO 1" required>
                                    <img id="preview_adhar_card" src="{{asset('admin-assets/img/default_large.png')}}" alt="Adhar Card Preview" class="preview-image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="phon_no_2">Pan Card</label>
                                    <input type="file" name="pan_card" id="pan_card" class="form-control mb-2" placeholder="PHON NO 2">
                                    <img id="preview_pan_card" src="{{asset('admin-assets/img/default_large.png')}}" alt="Pan Card Preview" class="preview-image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="hierer_name">Electricty Bill</label>
                                    <input type="file" name="electricty_bill" id="electricty_bill" class="form-control mb-2" placeholder="NAME" required>
                                    <img id="preview_electricty_bill" src="{{asset('admin-assets/img/default_large.png')}}" alt="Profile Image Preview" class="preview-image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="phon_no_1">Bank Copy</label>
                                    <input type="file" name="bank_copy" id="bank_copy" class="form-control mb-2" placeholder="PHON NO 1" required>
                                    <img id="preview_bank_copy" src="{{asset('admin-assets/img/default_large.png')}}" alt="Adhar Card Preview" class="preview-image">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group mt-5">
                                        <label for="">Upload Cheques (Max 5)</label>
                                        <input type="file" class="form-control" name="cheques[]" multiple id="upload-img" />
                                    </div>
                                    <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>

                                </div>
                            </div>
                        </div>
                  </div>
                </div>
                <input type="button" class="btn btn-primary " onclick="stepper.previous()" value="Previous">
                <input type="button" class="btn btn-primary " onclick="stepper.next()" value="Next">
              </div>
              <div id="gurenter-part" class="content" role="tabpanel" aria-labelledby="gurenter-part-trigger">
                <div class="row">
                    <div class="card-body">

                        <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="gurenter_name">Guranator NAME</label>
                                        <input type="text" name="gurenter_name" id="gurenter_name" class="form-control" placeholder="NAME" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="phon_no_1">PHON NO 1 </label>
                                        <input type="text" name="gphon_no_1" id="gphon_no_1" class="form-control" placeholder="PHON NO 1" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="phon_no_2">PHON NO 2</label>
                                        <input type="text" name="gphon_no_2" id="gphon_no_1" class="form-control" placeholder="PHON NO 2">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="phon_no_3">PHON NO 3</label>
                                            <input type="text" name="gphon_no_3" id="gphon_no_1" class="form-control" placeholder="PHON NO 3">
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="hierer_name">Profile Image</label>
                                    <input type="file" name="gprofile_image" id="gprofile_image" class="form-control" placeholder="NAME" required>
                                    <img id="gpreview_profile_image" src="{{asset('admin-assets/img/default-150x150.png')}}" alt="Profile Image Preview" class="preview-image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="phon_no_1">Adhar Card</label>
                                    <input type="file" name="gadhar_card" id="gadhar_card" class="form-control" placeholder="PHON NO 1" required>
                                    <img id="gpreview_adhar_card" src="{{asset('admin-assets/img/default-150x150.png')}}" alt="Adhar Card Preview" class="preview-image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="phon_no_2">Pan Card</label>
                                    <input type="file" name="gpan_card" id="gpan_card" class="form-control" placeholder="PHON NO 2">
                                    <img id="gpreview_pan_card" src="{{asset('admin-assets/img/default-150x150.png')}}" alt="Pan Card Preview" class="preview-image">
                                </div>
                            </div>
                        </div>

                  </div>

              </div>

              <input type="button" class="btn btn-primary " onclick="stepper.previous()" value="Previous">
              <input type="button" class="btn btn-primary " onclick="stepper.next()" value="Next">
            </div>
            <div id="battery-part" class="content" role="tabpanel" aria-labelledby="battery-part-trigger">
                <div class="row">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="battery">BATTERY 1</label>
                                    <input type="text" name="battery1" id="battery1" class="form-control" placeholder="BATTERY 1" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="battery">BATTERY 2 </label>
                                    <input type="tel" name="battery2" id="battery2" class="form-control" placeholder="BATTERY 2" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="battery">BATTERY 3</label>
                                    <input type="text" name="battery3" id="battery3" class="form-control" placeholder="BATTERY 3">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="battery">BATTERY 4</label>
                                    <input type="text" name="battery4" id="battery4" class="form-control" placeholder="BATTERY 4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="battery">BATTERY 5</label>
                                    <input type="text" name="battery5" id="battery5" class="form-control" placeholder="BATTERY 4">
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <input type="button" class="btn btn-primary " onclick="stepper.previous()" value="Previous">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

            </div>
          </div>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->
     </div>
</div>




  @endsection

@section('customJs')


@endsection
@section('flash')
  @include('admin.flash_message.message')
@endsection




