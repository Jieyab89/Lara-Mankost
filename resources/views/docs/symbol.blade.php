@extends('layouts.app')

@section('content')
<div class="container">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="page-content container note-has-grid">
    <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                <i class="icon-layers mr-1"></i><span class="d-none d-md-block">Symbol {{ config('app.name', 'Laravel') }}</span>
            </a>
        </li>
    </ul>
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">
            <div class="col-md-4 single-note-item all-category" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">1. Button trash on home<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."><a href="/images/trash-home.PNG"><img src="/images/trash-home.PNG" width="80" height="50"></a> <br>Removing all data <br> Click on image</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-social" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Nightout with friends">2. Make report <i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."><a href="/images/report-img.PNG"><img src="/images/report-img.PNG" width="80" height="50"></a> <br>Add the date report<br> Make sure you has sett it</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-important" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Launch new template">3. Dropdown button<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."><a href="/images/fillter-img.PNG"><img src="/images/fillter-img.PNG" width="80" height="50"></a> <br> View data report today</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
