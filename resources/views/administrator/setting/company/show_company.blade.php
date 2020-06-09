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
            <li class="active">{{ __('Details') }}</li>
        </ol>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Details of company') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ url('/setting/companies') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
                <hr>
                <table  class="table table-bordered table-striped">
                    <tbody id="myTable">
                        <tr>
                            <td>{{ __('Company Name') }}</td>
                            <td>{{ $company->company_name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Code') }}</td>
                            <td>{{ $company->company_code }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Logo') }}</td>
                            <td> @if(!empty($company->company_logo))
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($company->company_logo)) }}" class="img-responsive img-thumbnail">
                                @else
                            	<img src="{{ url('profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            	@endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Description') }}</td>
                            <td>{{ $company->company_description }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Website') }}</td>
                            <td>{{ $company->company_website }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Contact No') }}</td>
                            <td>{{ $company->company_contact_number }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Company Email') }}</td>
                            <td>{{ $company->company_email }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Created By') }}</td>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Date Added') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($company->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Last Updated') }}</td>
                            <td>{{ date("D d F Y h:ia", strtotime($company->updated_at)) }}</td>
                        </tr>
                        <tr>
                           
                                    @if ($company->publication_status == 1)
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/companies/unpublished/' . $company->id)}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                <i class="fa fa-arrow-down"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a href="{{ url('/setting/companies/published/' . $company->id)}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-sm hidden-xs"> {{ __('Unpublished') }}</span>
                                            </a>
                                        </div>
                                    @endif
                                   
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection