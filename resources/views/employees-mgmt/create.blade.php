<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#222d32;color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Employee</h5>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="modal-title" id="exampleModalLongTitle">New Employee Form</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <!-- First Name -->
                                <div class="col-md-4">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First name">
                                    @error('firstname')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Middle Name -->
                                <div class="col-md-4">
                                    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" placeholder="Middle name">
                                    @error('middlename')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-4">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Last name">
                                    @error('lastname')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <br><br>

                                <!-- Country Dropdown -->
                                <div class="col-md-4">
                                    <select class="form-control js-country" name="country_id" id="countrySelect">
                                        <option value="" selected disabled>Please select your country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- State Input -->
<div class="col-md-4">
    <input type="text" id="stateInput" name="state" class="form-control" placeholder="Enter your state" value="{{ old('state') }}">
    @error('state')
        <span class="help-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- City Input -->
<div class="col-md-4">
    <input type="text" id="cityInput" name="city" class="form-control" placeholder="Enter your city" value="{{ old('city') }}">
    @error('city')
        <span class="help-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

                                
                                <br><br>

                                <!-- Zip Code -->
                                <div class="col-md-4">
                                    <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required placeholder="Zip Code">
                                    @error('zip')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="{{ old('birthdate') }}" name="birthdate" class="form-control" id="birthDate" required placeholder="Date of Birth">
                                    </div>
                                </div>
                                
                                <!-- Join Date -->
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="{{ old('date_join') }}" name="date_join" class="form-control pull-right" id="hiredDate" required placeholder="Join Date">
                                    </div>
                                </div>
                                
                                <br><br>

                                <!-- Department Dropdown -->
                                <div class="col-md-4">
                                    <select class="form-control" name="department_id">
                                        <option value="" selected disabled>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Division Dropdown -->
                                <div class="col-md-4">
                                    <select class="form-control" name="division_id">
                                        <option value="" selected disabled>Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Picture Upload -->
                                <div class="col-md-4">
                                    <input type="file" id="picture" name="picture" required>
                                </div>
                                
                                <br><br>

                                <!-- Address -->
                                <div class="col-md-12">
                                    <textarea id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address"></textarea>
                                    @error('address')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Handle country change
    $('#countrySelect').on('change', function() {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: '/states/' + country_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#stateSelect').empty().append('<option value="" selected disabled>Please select your state</option>');
                    $.each(data, function(key, state) {
                        $('#stateSelect').append('<option value="' + state.id + '">' + state.name + '</option>');
                    });
                    $('#citySelect').empty().append('<option value="" selected disabled>Please select your city</option>');
                }
            });
        } else {
            $('#stateSelect').empty().append('<option value="" selected disabled>Please select your state</option>');
            $('#citySelect').empty().append('<option value="" selected disabled>Please select your city</option>');
        }
    });

    // Handle state change
    $('#stateSelect').on('change', function() {
        var state_id = $(this).val();
        if (state_id) {
            $.ajax({
                url: '/cities/' + state_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#citySelect').empty().append('<option value="" selected disabled>Please select your city</option>');
                    $.each(data, function(key, city) {
                        $('#citySelect').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            });
        } else {
            $('#citySelect').empty().append('<option value="" selected disabled>Please select your city</option>');
        }
    });
});
</script>