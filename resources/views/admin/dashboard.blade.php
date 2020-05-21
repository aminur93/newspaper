@extends('layouts.admin.master')

@section('page')
DashBoard
@endsection

@push('css')
@endpush

@section('content')
    <div class="row-fluid">
        <div class="span12 center" style="text-align: center;">
            <ul class="stat-boxes">
                <li>
                    <div class="left peity_bar_good"><span>2,4,9,7,12,10,12</span>+20%</div>
                    <div class="right">
                        <strong>36094</strong>
                        Visits
                    </div>
                </li>
                <li>
                    <div class="left peity_bar_neutral"><span>20,15,18,14,10,9,9,9</span>0%</div>
                    <div class="right">
                        <strong>1433</strong>
                        Users
                    </div>
                </li>
                <li>
                    <div class="left peity_bar_bad"><span>3,5,9,7,12,20,10</span>-50%</div>
                    <div class="right">
                        <strong>8650</strong>
                        Orders
                    </div>
                </li>
                <li>
                    <div class="left peity_line_good"><span>12,6,9,23,14,10,17</span>+70%</div>
                    <div class="right">
                        <strong>8650</strong>
                        Orders
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection

@push('js')
@endpush