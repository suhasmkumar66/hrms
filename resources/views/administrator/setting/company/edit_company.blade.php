@extends('administrator.master')
@section('title', __('Companies'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('COMPANY') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/companies') }}">{{ __('Companies') }}</a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit company') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/setting/companies/update/'. $company['id']) }}" method="post" name="company_edit_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        <div class="col-md-12">
                            @if (!empty(Session::get('message')))
                                <div class="alert alert-success alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                                </div>
                            @elseif (!empty(Session::get('exception')))
                                <div class="alert alert-warning alert-dismissible" id="notification_box">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                            <label for="company_name">{{ __('Company Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $company['company_name'] }}" placeholder="{{ __('Enter company name..') }}">
                                @if ($errors->has('company_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="company_code">{{ __('Company Code') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('company_code') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="company_code" id="company_code" class="form-control" value="{{ $company['company_code'] }}" placeholder="{{ __('Enter company code..') }}">
                                @if ($errors->has('company_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_code') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="company_website">{{ __('Company Website') }}</label>
                            <div class="form-group{{ $errors->has('company_website') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="company_website" id="company_website" class="form-control" value="{{ $company['company_website'] }}" placeholder="{{ __('Enter company website..') }}">
                                @if ($errors->has('company_website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_website') }}</strong>
                                </span>
                                @endif
                            </div>
                                <label for="avatar">{{ __('Company Logo') }}</label>
                            <div class="form-group{{ $errors->has('company_logo') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="company_logo" id="company_logo" class="form-control">
                               
                                @if ($errors->has('company_logo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_logo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="company_contact_number">{{ __('Company Contact No') }}</label>
                            <div class="form-group{{ $errors->has('company_contact_number') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="company_contact_number" id="company_contact_number" class="form-control" value="{{ $company['company_contact_number'] }}" placeholder="{{ __('Enter company contact no..') }}">
                                @if ($errors->has('company_contact_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_contact_number') }}</strong>
                                </span>
                                @endif
                            </div>
                             <label for="company_email">{{ __('Company Email') }} </label>
                            <div class="form-group{{ $errors->has('"company_email"') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="company_email" id="company_email" class="form-control" value="{{ $company['company_email'] }}" placeholder="{{ __('Enter company email...') }}">
                                @if ($errors->has('company_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="publication_status">{{ __('Publication Status') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('publication_status') ? ' has-error' : '' }} has-feedback">
                                <select name="publication_status" id="publication_status" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="1">{{ __('Published') }}</option>
                                    <option value="0">{{ __('Unpublished') }}</option>
                                </select>
                                @if ($errors->has('publication_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publication_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            @if(!empty($company['company_logo']))
                            
                           <img src="data:image/png;base64,{{ chunk_split(base64_encode($company['company_logo'])) }}" class="img-responsive img-thumbnail">
                            @else
                            <img src="{{ url('profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            @endif
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="department_description">{{ __('Company Description') }} </label>
                            <div class="form-group{{ $errors->has('company_description') ? ' has-error' : '' }} has-feedback">
                                <textarea class="textarea text-description" name="company_description" id="company_description" placeholder="{{ __('Enter client description..') }}">{{ $company['company_description'] }}</textarea>
                                @if ($errors->has('department'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('department_description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update') }}</button>

                     <a href="{{ url('/setting/companies') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['company_edit_form'].elements['publication_status'].value = "{{ $company['publication_status'] }}";
</script>
@endsection
