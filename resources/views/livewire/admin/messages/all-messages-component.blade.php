<div class="main-content">
    <!-- Page Title Start -->
    <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title bold">All Customers Message</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{route('admin.dashboard')}}"><i class="fas fa-home mr-2"></i>Home</a>
                        </li>
                        <li class="breadcrumb-link active">Message Table</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Table Start -->
    <div class="row">
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card table-card">
                <div class="card-header pb-0">
                    <h4>Customers Message Table</h4>
                    <p class="card-desc"> Avaliable Message (<code>{{ $msgs->count() }}</code>)</p>
                </div>
                <div class="card-body">
                    <div class="chart-holder">
                        <div class="table-responsive">
                            <table class="table table-styled mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Message Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($msgs as $msg)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$msg->id}}</td>
                                        <td> {{ $msg->name }} </td>
                                        <td>
                                            {{ $msg->email }}
                                        </td>
                                        <td>
                                            {{ $msg->mobile }}
                                        </td>
                                        <td>
                                            {!! $msg->message !!}
                                        </td>
                                        <td> {{ $msg->created_at }} </td>
                                        <td class="relative ">
                                            <a class="action-btn " href="javascript:void(0); ">
                                                <svg class="default-size " viewBox="0 0 341.333 341.333 ">
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path d="M170.667,85.333c23.573,0,42.667-19.093,42.667-42.667C213.333,19.093,194.24,0,170.667,0S128,19.093,128,42.667 C128,66.24,147.093,85.333,170.667,85.333z "></path>
                                                                <path d="M170.667,128C147.093,128,128,147.093,128,170.667s19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 S194.24,128,170.667,128z "></path>
                                                                <path d="M170.667,256C147.093,256,128,275.093,128,298.667c0,23.573,19.093,42.667,42.667,42.667s42.667-19.093,42.667-42.667 C213.333,275.093,194.24,256,170.667,256z "></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <div class="action-option ">
                                                <ul>
                                                    <li>
                                                        <a href="#" onclick="confirm('Are tou sure, want to delete this Message?') || event.stopImmediatePropagation()" wire:click.prevent="deleteMessage('{{$msg->id}}')"><i class="fa fa-trash-alt mr-2"></i>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $msgs->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-footer-btm">
        <p>Copyright 2023 © EIL All Rights Reserved.</p>
    </div>
</div>