@if (Session::has('success'))
<div class="=col-md-6">
    <div id="alert" class="alert alert-success" style="width: 300px; right: 36px; top: 60px; cursor:auto; opacity:1;
    position: fixed; z-index: 1060; display: block !important; transition: visibility 0s 2s, opacity 2s linear;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <span class="fa fa-check"><strong>Success</strong></span>
    <hr class="message-inner-separator">
    <p>
        {{Session::get('success')}}
    </p>
</div>
</div>
@elseif (Session::has('failed'))
<div class="=col-md-6">
    <div id="alert" class="alert alert-danger" style="width: 300px; right: 36px; top: 60px; cursor:auto; opacity:1;
    position: fixed; z-index: 1060; display: block !important; transition: visibility 0s 2s, opacity 2s linear;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <span class="fa fa-times"><strong>Failed</strong></span>
    <hr class="message-inner-separator">
    <p>
        {{Session::get('success')}}
    </p>
</div>
</div>
@endif