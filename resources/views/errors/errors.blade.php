@if(Session::has('success'))
<div class="col-md-12 alert alert-success left-icon-alert  alert-dismissible" id="alert-success" >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('success') }}
    </button>
</div>
@endif
@if(Session::has('error'))
<div class=" col-md-12 alert alert-danger left-icon-alert  alert-dismissible" id="alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{ Session::get('error') }}</button>
</div>
@endif
@if(Session::has('status'))
<div class=" col-md-12 alert alert-info left-icon-alert  alert-dismissible" id="alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{ Session::get('status') }}</button>
</div>
@endif
@if(Session::has('info'))
<div class=" col-md-12 alert alert-info left-icon-alert  alert-dismissible" id="alert-info" >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{ Session::get('info') }}</button>
</div>
@endif

<div class=" col-md-12 alert alert-info left-icon-alert  alert-dismissible" id="alert-info" style="display:none">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('status') }}</button>
</div>