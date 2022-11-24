@extends('layouts.app')

@section('content')
<div class="container">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="page-content container note-has-grid">
    <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                <i class="icon-layers mr-1"></i><span class="d-none d-md-block">Contribution {{ config('app.name', 'Laravel') }}</span>
            </a>
        </li>
    </ul>
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">
            <div class="col-md-4 single-note-item all-category" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">1. Fork repository<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Fork on your repository account</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-social" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Nightout with friends">2. Make a change {{ config('app.name', 'Laravel') }} <i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Added features or fixing the bug</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-important" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Launch new template">3. View commit logs<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Run this command <br> git log</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-social" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Change a Design">4. Push on your repository<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Run this command <br> git commit -m "Note commit" <br> git push origin "branch name"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 single-note-item all-category note-social" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Change a Design">5. Make pull request<i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Make your pull request and waiting for review</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
